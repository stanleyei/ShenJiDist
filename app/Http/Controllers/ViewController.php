<?php

namespace App\Http\Controllers;

use App\View;
use App\ViewImg;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class ViewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = View::with('viewImgs')->get();
        return view('admin/view/index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = View::with('viewImgs')->get();
        return view('admin/view/create', compact('data'));
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

        // if ($request->hasFile('img')) {
        //     $local = Storage::disk('local');

        //     $file = $request->file('img');
        //     $path = $local->putFile('public', $file);
        //     $data['img'] = $local->url($path);
        // }
        $mainData = View::create($data);

        return View::with('viewImgs')->get();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\View  $view
     * @return \Illuminate\Http\Response
     */
    public function show(View $view)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\View  $view
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = View::with('viewImgs')->find($id);
        return view('admin/view/edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\View  $view
     * @return \Illuminate\Http\Response
     */
    public function update($id, Request $request)
    {
        $data = $request->all();
        $dbData = View::find($id);
        // if ($request->hasFile('img')) {
        //     $myfile = Storage::disk('local');
        //     $file = $request->file('img');
        //     $path = $myfile->putFile('public', $file);
        //     $data['img'] = $myfile->url($path);
        //     // 刪掉之前的圖片檔案
        //     File::delete(public_path($dbData->img));
        // }else{
        //     // 沒改放舊圖
        //     $data['img'] = $dbData->img;
        // }
        $dbData->update($data);

        return View::with('viewImgs')->get();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\View  $view
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $dbData = View::with('viewImgs')->find($id);

        // if (isset($dbData->img)) {
        //     // 刪除Shop圖片檔案
        //     File::delete(public_path($dbData->img));
        // }
        // 資料庫刪除該筆資料
        $result = View::destroy($id);
        // 刪除副圖片檔案、資料庫資料
        $this->deleteSubImg($id);

        return View::with('viewImgs')->get();
    }

    public function indexDataTable()
    {
        $response = View::all();

        $data = [];

        foreach ($response as $i) {
            $data[] = [
                'name' => $i->name,
                'content' => $i->content,
                'count_img' => count($i->viewImgs),
                'phone' => $i->phone,
                'address' => $i->address,
                'time' => $i->time_open.' ~ '.$i->time_close,
                'editBtn' => "<a href='/admin/view/{$i->id}/edit'><button class='btn btn-primary btn-edit'>編輯</button></a>",
                'destroyBtn' => "<button class='btn btn-danger btn-destroy' onclick='destroyBtnFunction({$i->id})''>刪除</button>",
            ];
        }

        $data = ['data' => $data];

        return View::with('viewImgs')->get();
    }

    public function deleteSubImg($view_id)
    {
        // where內的欄位要改成相對應的
        $viewImgs = ViewImg::where('view_id', $view_id)->get();
        if (isset($viewImgs)) {
            foreach ($viewImgs as $viewImg) {
                File::delete(public_path($viewImg->img));
                $viewImg->delete();
            }
            return true;
        } else {
            return false;
        }
    }
}
