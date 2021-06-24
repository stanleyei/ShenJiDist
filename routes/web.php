<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'FrontendController@loading');
Route::get('/index', 'FrontendController@index');
Route::get('/news', 'FrontendController@news');
Route::get('/store{id}', 'FrontendController@store');
Route::get('/tra_map', 'FrontendController@tra_map');
Route::post('/all_news_data', 'FrontendController@allNewsData');
Route::post('/feast_photo', 'FrontendController@feastPhoto');


Route::get('/test', 'AdminController@test')->name('test');

Auth::routes();

Route::get('/admin', 'AdminController@index')->name('admin');
Route::post('/react_user_name', 'AdminController@reactUserName');
Route::post('/get_date_data', 'FrontendController@getDateData');

Route::prefix('admin')->middleware('auth')->group(function () {

    // 取得上層資料
    Route::post('/upper_data', 'AdminController@upperData');

    Route::resources([
        'info_types' => 'InfoTypesController',
        'info' => 'InfoController',
        'info_img' => 'InfoImgController',

        'shop_type' => 'ShopTypeController',
        'shop' => 'ShopController',
        'shop_img' => 'ShopImgController',

        'slider' => 'SliderController',

        'view' => 'ViewController',
        'view_img' => 'ViewImgController',

        'contact_type' => 'ContactTypeController',
        'contact' => 'ContactController',
        'contact_content_type' => 'ContactContentTypeController',
    ]);
    Route::post('/info_types_data', 'InfoTypesController@indexDataTable')->name('info_types.data');
    Route::post('/info_data', 'InfoController@indexDataTable')->name('info.data');
    Route::post('/info_img_data', 'InfoImgController@indexDataTable')->name('info_img.data');

    Route::post('/shop_type_data', 'ShopTypeController@indexDataTable')->name('shop_type.data');
    Route::post('/shop_data', 'ShopController@indexDataTable')->name('shop.data');
    Route::post('/shop_img_data', 'ShopImgController@indexDataTable')->name('shop_img.data');

    Route::post('/slider_data', 'SliderController@indexDataTable')->name('slider.data');

    Route::post('/view_data', 'ViewController@indexDataTable')->name('view.data');
    Route::post('/view_img_data', 'ViewImgController@indexDataTable')->name('view_img.data');

    Route::post('/contact_type_data', 'ContactTypeController@indexDataTable')->name('contact_type.data');
    Route::post('/contact_content_type_data', 'ContactContentTypeController@indexDataTable')->name('contact_content_type.data');
    Route::post('/contact_data', 'ContactController@indexDataTable')->name('contact.data');
});

