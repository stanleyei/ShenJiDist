<?php

namespace App\Http\Controllers;

use App\Contact;
use App\ContactContentType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Contact::with('contactContentType')->get();
        return view('admin/contact/index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $type = ContactContentType::get();;
        $data = Contact::with('contactContentType')->get();
        return view('admin/contact/create', compact('data', 'type'));
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
        $mainData = Contact::create($data);

        return Contact::with('contactContentType')->get();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function show(Contact $contact)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $type = ContactContentType::get();;
        $data = Contact::with('contactContentType')->find($id);
        return view('admin/contact/edit', compact('data', 'type'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function update($id, Request $request)
    {
        $data = $request->all();
        $dbData = Contact::find($id);
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

        return Contact::with('contactContentType')->get();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $dbData = Contact::with('contactContentType')->find($id);
        // 資料庫刪除該筆資料
        $result = Contact::destroy($id);

        return Contact::with('contactContentType')->get();
    }

    public function indexDataTable()
    {
        $response = Contact::all();

        $data = [];

        foreach ($response as $i) {
            $data[] = [
                'id' => $i->id,
                'type_id' => $i->contactContentType->name,
                'sender' => $i->sender,
                'mail' => $i->mail,
                'content' => $i->content,
                'editBtn' => "<a href='/admin/contact/{$i->id}/edit'><button class='btn btn-primary btn-edit'>編輯</button></a>",
                'destroyBtn' => "<button class='btn btn-danger btn-destroy' onclick='destroyBtnFunction({$i->id})''>刪除</button>",
            ];
        }

        $data = ['data' => $data];

        return Contact::with('contactContentType')->get();
    }
}
