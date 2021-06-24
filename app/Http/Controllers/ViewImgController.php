<?php

namespace App\Http\Controllers;

use App\View;
use App\ViewImg;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class ViewImgController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = ViewImg::with('view')->get();
        return view('admin/view_img/index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $view = View::get();;
        $data = ViewImg::with('view')->get();
        return view('admin/view_img/create', compact('data', 'view'));
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
        $mainData = ViewImg::create($data);

        return ViewImg::with('view')->get();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ViewImg  $viewImg
     * @return \Illuminate\Http\Response
     */
    public function show(ViewImg $viewImg)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ViewImg  $viewImg
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $view = View::get();;
        $data = ViewImg::find($id);
        return view('admin/view_img/edit', compact('data', 'view'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ViewImg  $viewImg
     * @return \Illuminate\Http\Response
     */
    public function update($id, Request $request)
    {
        if ($request->img) {
            $request->img = $this->crop($request->img);
        }
        
        $data = $request->all();
        $dbData = ViewImg::find($id);
        if ($request->hasFile('img')) {
            $myfile = Storage::disk('local');
            $file = $request->file('img');
            $path = $myfile->putFile('public', $file);
            $data['img'] = $myfile->url($path);
            // 刪掉之前的圖片檔案
            File::delete(public_path($dbData->img));
        }else{
            // 沒改放舊圖
            $data['img'] = $dbData->img;
        }
        $dbData->update($data);

        return ViewImg::with('view')->get();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ViewImg  $viewImg
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $dbData = ViewImg::find($id);

        if (isset($dbData->img)) {
            // 刪除Info圖片檔案
            File::delete(public_path($dbData->img));
        }
        // 資料庫刪除該筆資料
        $result = ViewImg::destroy($id);

        return ViewImg::with('view')->get();
    }

    public function indexDataTable()
    {
        $response = ViewImg::all();

        $data = [];

        foreach ($response as $i) {
            $data[] = [
                'view_id' => $i->view->name,
                'img' => "<div class='show-img' style='background-image: url({$i->img})'></div>",
                'editBtn' => "<a href='/admin/view_img/{$i->id}/edit'><button class='btn btn-primary btn-edit'>編輯</button></a>",
                'destroyBtn' => "<button class='btn btn-danger btn-destroy' onclick='destroyBtnFunction({$i->id})''>刪除</button>",
            ];
        }

        $data = ['data' => $data];

        return ViewImg::with('view')->get();
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
