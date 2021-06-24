<?php

namespace App\Http\Controllers;

use App\ShopType;
use Illuminate\Http\Request;

class ShopTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = ShopType::get();
        return view('admin/shop_type/index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin/shop_type/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        ShopType::create($request->all());
        return ShopType::with('shops')->get();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ShopType  $shopType
     * @return \Illuminate\Http\Response
     */
    public function show(ShopType $shopType)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ShopType  $shopType
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = ShopType::find($id);
        return view('admin/shop_type/edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ShopType  $shopType
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        ShopType::find($id)->update($request->all());
        return ShopType::with('shops')->get();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ShopType  $shopType
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $result = ShopType::destroy($id);
        return ShopType::with('shops')->get();
    }

    public function indexDataTable()
    {
        $response = ShopType::all();

        $data = [];

        foreach ($response as $i) {
            $data[] = [
                'name' => $i->name,
                'shop_count' => count($i->shops),
                'editBtn' => "<a href='/admin/shop_type/{$i->id}/edit'><button class='btn btn-primary btn-edit'>編輯</button></a>",
                'destroyBtn' => "<button class='btn btn-danger btn-destroy' onclick='destroyBtnFunction({$i->id})''>刪除</button>",
            ];
        }

        $data = ['data' => $data];

        return ShopType::with('shops')->get();
    }
}
