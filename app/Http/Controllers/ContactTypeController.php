<?php

namespace App\Http\Controllers;

use App\ContactType;
use Illuminate\Http\Request;

class ContactTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = ContactType::with('contactContentTypes')->get();
        return view('admin/contact_type/index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin/contact_type/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        ContactType::create($request->all());
        return ContactType::with('contactContentTypes')->get();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ContactType  $contactType
     * @return \Illuminate\Http\Response
     */
    public function show(ContactType $contactType)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ContactType  $contactType
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = ContactType::find($id);
        return view('admin/contact_type/edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ContactType  $contactType
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        ContactType::find($id)->update($request->all());
        return ContactType::with('contactContentTypes')->get();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ContactType  $contactType
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $result = ContactType::destroy($id);
        return ContactType::with('contactContentTypes')->get();
    }

    public function indexDataTable()
    {
        $response = ContactType::all();

        $data = [];

        foreach ($response as $i) {
            $data[] = [
                'name' => $i->name,
                'contactContentType_count' => count($i->contactContentTypes),
                'editBtn' => "<a href='/admin/contact_type/{$i->id}/edit'><button class='btn btn-primary btn-edit'>編輯</button></a>",
                'destroyBtn' => "<button class='btn btn-danger btn-destroy' onclick='destroyBtnFunction({$i->id})''>刪除</button>",
            ];
        }

        $data = ['data' => $data];

        return ContactType::with('contactContentTypes')->get();
    }
}
