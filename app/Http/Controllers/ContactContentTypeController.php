<?php

namespace App\Http\Controllers;

use App\Contact;
use App\ContactType;
use App\ContactContentType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class ContactContentTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = ContactContentType::with('contacts', 'contactType')->get();
        return view('admin/contact_content_type/index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $type = ContactType::get();;
        $data = ContactContentType::with('contactType', 'contacts')->get();
        return view('admin/contact_content_type/create', compact('data', 'type'));
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
        $mainData = ContactContentType::create($data);

        return ContactContentType::with('contacts', 'contactType')->get();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ContactContentType  $contactContentType
     * @return \Illuminate\Http\Response
     */
    public function show(ContactContentType $contactContentType)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ContactContentType  $contactContentType
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $type = ContactType::get();;
        $data = ContactContentType::with('contacts')->find($id);
        return view('admin/contact_content_type/edit', compact('data', 'type'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ContactContentType  $contactContentType
     * @return \Illuminate\Http\Response
     */
    public function update($id, Request $request)
    {
        $data = $request->all();
        $dbData = ContactContentType::find($id);
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

        return ContactContentType::with('contacts', 'contactType')->get();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ContactContentType  $contactContentType
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $dbData = ContactContentType::with('contactType', 'contacts')->find($id);

        // if (isset($dbData->img)) {
        //     // 刪除Shop圖片檔案
        //     File::delete(public_path($dbData->img));
        // }
        // 資料庫刪除該筆資料
        $result = ContactContentType::destroy($id);
        // 刪除子項目資料
        $this->deleteSub($id);

        return ContactContentType::with('contacts', 'contactType')->get();
    }

    public function indexDataTable()
    {
        $response = ContactContentType::all();

        $data = [];

        foreach ($response as $i) {
            $data[] = [
                'type_id' => $i->contactType->name,
                'name' => $i->name,
                'contact_count' => count($i->contacts),
                'editBtn' => "<a href='/admin/contact_content_type/{$i->id}/edit'><button class='btn btn-primary btn-edit'>編輯</button></a>",
                'destroyBtn' => "<button class='btn btn-danger btn-destroy' onclick='destroyBtnFunction({$i->id})''>刪除</button>",
            ];
        }

        $data = ['data' => $data];

        return ContactContentType::with('contacts', 'contactType')->get();
    }

    public function deleteSub($content_id)
    {
        // where內的欄位要改成相對應的
        $contacts = Contact::where('content_id', $content_id)->get();
        if (isset($contacts)) {
            foreach ($contacts as $contact) {
                $contact->delete();
            }
            return true;
        } else {
            return false;
        }
    }
}
