<?php

namespace App\Http\Controllers;

use App\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Slider::get();
        return view('admin/slider/index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = Slider::get();
        return view('admin/slider/create', compact('data'));
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
        $mainData = Slider::create($data);

        return Slider::get();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function show(Slider $slider)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Slider::find($id);
        return view('admin/slider/edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function update($id, Request $request)
    {
        if ($request->img) {
            $request->img = $this->crop($request->img);
        }
        
        $data = $request->all();
        $dbData = Slider::find($id);
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

        return Slider::get();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $dbData = Slider::find($id);

        if (isset($dbData->img)) {
            // 刪除Shop圖片檔案
            File::delete(public_path($dbData->img));
        }
        // 資料庫刪除該筆資料
        $result = Slider::destroy($id);

        return Slider::get();
    }

    public function indexDataTable()
    {
        $response = Slider::all();

        $data = [];

        foreach ($response as $i) {
            $data[] = [
                'name' => $i->name,
                'img' => "<div class='show-img' style='background-image: url({$i->img})'></div>",
                'content' => $i->content,
                'editBtn' => "<a href='/admin/slider/{$i->id}/edit'><button class='btn btn-primary btn-edit'>編輯</button></a>",
                'destroyBtn' => "<button class='btn btn-danger btn-destroy' onclick='destroyBtnFunction({$i->id})''>刪除</button>",
            ];
        }

        $data = ['data' => $data];

        return Slider::get();
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
