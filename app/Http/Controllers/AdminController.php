<?php

namespace App\Http\Controllers;

use App\ContactContentType;
use App\ContactType;
use App\Info;
use App\InfoTypes;
use App\Shop;
use App\ShopType;
use App\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use GuzzleHttp\Client;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        return view('admin');
    }

    public function test()
    {
        return view('test');
    }

    public function reactUserName()
    {
        return Auth::user()->name;
    }

    public function upperData(Request $request)
    {
        if ($request->upperName) {
            switch ($request->upperName) {
                case 'info_types':
                    return InfoTypes::get();

                case 'info':
                    return Info::get();

                case 'shop_type':
                    return ShopType::get();

                case 'shop':
                    return Shop::get();

                case 'view':
                    return View::get();

                case 'contact_type':
                    return ContactType::get();

                case 'contact_content_type':
                    return ContactContentType::get();

                default:
                    # code...
                    break;
            }
        }

        return false;
    }

    public function httpPost($url, $data)
    {
        $curl = curl_init($url);
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query($data));
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($curl);
        curl_close($curl);
        return $response;
    }
}
