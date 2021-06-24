<?php

namespace App\Http\Controllers;

use App\InfoTypes;
use Carbon\Carbon;
use Illuminate\Http\Request;

class InfoTypesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = InfoTypes::with('infos')->get();
        return view('admin/info_types/index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin/info_types/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // 新增react傳過來的資料
        InfoTypes::create($request->all());
        // 將現在的資料傳回去
        $data = InfoTypes::with('infos')->get();
        return $data;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\InfoTypes  $InfoTypes
     * @return \Illuminate\Http\Response
     */
    public function show(InfoTypes $InfoTypes)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\InfoTypes  $InfoTypes
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = InfoTypes::find($id);
        return view('admin/info_types/edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\InfoTypes  $InfoTypes
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        InfoTypes::find($id)->update($request->all());
        // 將現在的資料傳回去
        $data = InfoTypes::with('infos')->get();
        return $data;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\InfoTypes  $InfoTypes
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        InfoTypes::destroy($id);
        $result = InfoTypes::with('infos')->get();
        return $result;
    }
    
    public function indexDataTable()
    {
        return InfoTypes::with('infos')->get();
    }
}
