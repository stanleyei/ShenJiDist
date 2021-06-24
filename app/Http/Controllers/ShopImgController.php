<?php

namespace App\Http\Controllers;

use App\Shop;
use App\ShopImg;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class ShopImgController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = ShopImg::with('shop')->get();
        return view('admin/shop_img/index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $shop = Shop::get();;
        $data = ShopImg::with('shop')->get();
        return view('admin/shop_img/create', compact('data', 'shop'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($request->img) {
            $request->img = $this->crop($request->img);
        }

        $data = $request->all();

        if ($request->hasFile('img')) {
            $local = Storage::disk('local');

            $file = $request->file('img');
            $path = $local->putFile('public', $file);
            $data['img'] = $local->url($path);
        }
        $mainData = ShopImg::create($data);

        return ShopImg::with('shop')->get();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ShopImg  $shopImg
     * @return \Illuminate\Http\Response
     */
    public function show(ShopImg $shopImg)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ShopImg  $shopImg
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $shop = Shop::get();;
        $data = ShopImg::find($id);
        return view('admin/shop_img/edit', compact('data', 'shop'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ShopImg  $shopImg
     * @return \Illuminate\Http\Response
     */
    public function update($id, Request $request)
    {
        if ($request->img) {
            $request->img = $this->crop($request->img);
        }
        
        $data = $request->all();
        $dbData = ShopImg::find($id);
        if ($request->hasFile('img')) {
            $myfile = Storage::disk('local');
            $file = $request->file('img');
            $path = $myfile->putFile('public', $file);
            $data['img'] = $myfile->url($path);
            // 刪掉之前的圖片檔案
            File::delete(public_path($dbData->img));
        } else {
            // 沒改放舊圖
            $data['img'] = $dbData->img;
        }
        $dbData->update($data);

        return ShopImg::with('shop')->get();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ShopImg  $shopImg
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $dbData = ShopImg::find($id);

        if (isset($dbData->img)) {
            // 刪除Info圖片檔案
            File::delete(public_path($dbData->img));
        }
        // 資料庫刪除該筆資料
        $result = ShopImg::destroy($id);

        return ShopImg::with('shop')->get();
    }

    public function indexDataTable()
    {
        $response = ShopImg::all();

        $data = [];

        foreach ($response as $i) {
            $data[] = [
                'info_id' => $i->shop->name,
                'content' => $i->content,
                'img' => "<div class='show-img' style='background-image: url({$i->img})'></div>",
                'editBtn' => "<a href='/admin/shop_img/{$i->id}/edit'><button class='btn btn-primary btn-edit'>編輯</button></a>",
                'destroyBtn' => "<button class='btn btn-danger btn-destroy' onclick='destroyBtnFunction({$i->id})''>刪除</button>",
            ];
        }

        $data = ['data' => $data];

        return ShopImg::with('shop')->get();
    }

    public function crop($img)
    {
        // 先檢查有沒有base64的格式
        if (!($img && Str::contains($img, ['src="data:image', 'src=\'data:image']))) {
            return $img;
        }

        // ([^;]+) : 找的是冒號(;)前的所有(+的關係)字元
        // ([^\"]+) : 找的是不等於"的所有(+的關係)字元，找到"為止
        $pattern = '/(data:image\/)([^;]+)(;base64,)([^\"]+)/';

        $check = preg_match($pattern, $img, $matches);
        if ($check) {
            return base64_decode($matches[4]);
        }
    }
}
