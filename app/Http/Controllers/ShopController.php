<?php

namespace App\Http\Controllers;

use App\Shop;
use App\ShopType;
use App\ShopImg;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ShopController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Shop::with('shopType', 'shopImgs')->get();
        return view('admin/shop/index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $type = ShopType::get();;
        $data = Shop::with('shopType', 'shopImgs')->get();
        return view('admin/shop/create', compact('data', 'type'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();

        if ($data['content']) {
            $data['content'] = $this->content_base64_check($data['content']);
        }

        // if ($request->hasFile('img')) {
        //     $local = Storage::disk('local');

        //     $file = $request->file('img');
        //     $path = $local->putFile('public', $file);
        //     $data['img'] = $local->url($path);
        // }
        $mainData = Shop::create($data);

        return Shop::with('shopType', 'shopImgs')->get();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Shop  $shop
     * @return \Illuminate\Http\Response
     */
    public function show(Shop $shop)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Shop  $shop
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $type = ShopType::get();;
        $data = Shop::with('shopImgs')->find($id);
        return view('admin/shop/edit', compact('data', 'type'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Shop  $shop
     * @return \Illuminate\Http\Response
     */
    public function update($id, Request $request)
    {
        $data = $request->all();
        $dbData = Shop::find($id);
        // content內容有圖片的處理
        $data['content'] = $this->summernote_update($dbData->content, $data['content']);

        $dbData->update($data);

        return Shop::with('shopType', 'shopImgs')->get();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Shop  $shop
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $dbData = Shop::with('shopType', 'shopImgs')->find($id);

        // 刪掉content中的圖片
        $dbData->content = $this->summernote_destroy_image($dbData->content);

        // if (isset($dbData->img)) {
        //     // 刪除Shop圖片檔案
        //     File::delete(public_path($dbData->img));
        // }
        // 資料庫刪除該筆資料
        $result = Shop::destroy($id);
        // 刪除副圖片檔案、資料庫資料
        $this->deleteSubImg($id);

        return Shop::with('shopType', 'shopImgs')->get();
    }

    public function indexDataTable()
    {
        $response = Shop::all();

        $data = [];

        foreach ($response as $i) {
            $data[] = [
                'type_id' => $i->shopType->name,
                'name' => $i->name,
                'phone' => $i->phone,
                'content' => $i->content,
                'location' => $i->location,
                'editBtn' => "<a href='/admin/shop/{$i->id}/edit'><button class='btn btn-primary btn-edit'>編輯</button></a>",
                'destroyBtn' => "<button class='btn btn-danger btn-destroy' onclick='destroyBtnFunction({$i->id})''>刪除</button>",
            ];
        }

        $data = ['data' => $data];

        return Shop::with('shopType', 'shopImgs')->get();
    }

    public function deleteSubImg($shop_id)
    {
        // where內的欄位要改成相對應的
        $shopImgs = ShopImg::where('shop_id', $shop_id)->get();
        if (isset($shopImgs)) {
            foreach ($shopImgs as $shopImg) {
                File::delete(public_path($shopImg->img));
                $shopImg->delete();
            }
            return true;
        } else {
            return false;
        }
    }

    public function content_base64_check($content)
    {
        // https://learnku.com/articles/33047
        // 先檢查有沒有base64的格式
        // 會把base64存成檔案，並且把content中的base64編碼替換成image path
        if (!($content && Str::contains($content, ['src="data:image', 'src=\'data:image']))) {
            return $content;
        }

        // ([^;]+) : 找的是冒號(;)前的所有(+的關係)字元
        // ([^\"]+) : 找的是不等於"的所有(+的關係)字元，找到"為止
        $pattern = '/(data:image\/)([^;]+)(;base64,)([^\"]+)/';
        $res = preg_replace_callback($pattern, function ($matches) {
            // 生成路径
            $public_path = public_path();
            $folder_path = '/storage/summernote/';
            if (!is_dir($dir = $public_path . $folder_path)) {
                mkdir($dir, 0777, true);
            }

            // 生成文件名
            $matches[2] = $matches[2] === 'jpeg' ? 'jpg' : $matches[2];
            $filename = md5(time() . \Illuminate\Support\Str::random()) . '.' . $matches[2];
            $file = $dir . $filename;

            // 保存文件
            file_put_contents($file, base64_decode($matches[4])); // base64 转图片

            // 返回相对路径
            return $folder_path . $filename;
        }, $content);

        return $res;
    }

    public function summernote_destroy_image($content)
    {
        if (!($content && Str::contains($content, ['summernote']))) {
            return $content;
        }

        $pattern = '/(\/storage\/summernote[^\'\"]+)/';
        $times = preg_match_all($pattern, $content, $matches);
        if ($times) {
            foreach ($matches[0] as $value) {
                if (file_exists(public_path() . $value)) {
                    unlink(public_path() . $value);
                }
            }
        }
    }

    public function summernote_update($oldContent, $content)
    {
        // 取得舊字串的path
        $pattern = '/(\/storage\/summernote[^\'\"]+)/';
        $oldCheck = preg_match_all($pattern, $oldContent, $oldMatches);
        $oldArray = [];
        // 有找到的話產生一個收集舊資料image path的array
        // $oldArray
        if ($oldCheck) {
            foreach ($oldMatches[0] as $value) {
                $oldArray[] = $value;
            }
        }
        // 新資料處理，取得新資料的image path
        $content = $this->content_base64_check($content);
        $pattern = '/(\/storage\/summernote[^\'\"]+)/';
        $newCheck = preg_match_all($pattern, $content, $newMatches);
        $newArray = [];
        // 有找到的話產生一個收集舊資料image path的array
        // $newArray
        if ($newCheck) {
            foreach ($newMatches[0] as $value) {
                $newArray[] = $value;
            }
        }
        // $a1沒有的會被丟到$oldNeedDel
        $oldNeedDel = array_diff($oldArray, $newArray);
        if ($oldNeedDel !== []) {
            foreach ($oldNeedDel as $value) {
                if (file_exists(public_path() . $value)) {
                    unlink(public_path() . $value);
                }
            }
        }
        return $content;
    }
}
