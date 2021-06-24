<?php

namespace App\Http\Controllers;

use App\Shop;
use App\View;
use App\Slider;
use App\Info;
use App\InfoImg;
use App\ShopType;
use App\InfoTypes;
use Carbon\Carbon;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function loading()
    {
        return view('frontend.loading');
    }


    public function index()
    {
        $sliders = Slider::get();
        $monthData = ['一月', '二月', '三月', '四月', '五月', '六月', '七月', '八月', '九月', '十月', '十一月', '十二月'];
        $shopType = ShopType::with('shops')->get();
        $shops = Shop::with('shopImgs')->get();
        $foodShops = Shop::with('shopImgs')->where('type_id', '1')->get();
        $trinketShops = Shop::with('shopImgs')->where('type_id', '2')->get();
        $newShopTypes = $shopType->except([3]);
        $views = View::with('viewImgs')->get();
        return view('frontend.index', compact('sliders', 'newShopTypes', 'shops', 'foodShops', 'trinketShops', 'views', 'monthData'));
    }

    public function news()
    {
        $year = $_GET['year'];
        $month = $_GET['month'];
        $tap = $_GET['tap'];
        $range = [];
        $range[] = Carbon::parse("$year-$month-10")->firstOfMonth();
        $range[] = Carbon::parse("$year-$month-10")->lastOfMonth();
        $nextRange = [];
        $nextRange[] = Carbon::parse("$year-$month-10")->addMonth()->firstOfMonth();
        $nextRange[] = Carbon::parse("$year-$month-10")->addMonth()->lastOfMonth();
        $infos = Info::with('infoType', 'infoImgs')->whereBetween('date_start', $range)->orderBy('updated_at', 'DESC')->where('type_id', $tap)->get();
        $eventInfos = Info::with('infoType', 'infoImgs')->orderBy('date_start', 'ASC')->where('type_id', 2)->get();
        $nextInfos = Info::with('infoType', 'infoImgs')->whereBetween('date_start', $nextRange)->orderBy('updated_at', 'DESC')->where('type_id', $tap)->get();

        return view('frontend.news-page', compact('infos', 'nextInfos', 'eventInfos'));
    }

    public function store($id)
    {
        $shops = Shop::with('shopImgs', 'shopType')->find($id);
        return view('frontend.store-page', compact('shops'));
    }

    public function tra_map()
    {
        return view('frontend.tra-map');
    }

    public function getDateData(Request $request)
    {
        if ($request->year && $request->month) {
            $year = $request->year;
            $month = $request->month;
            // 返回該年月，三種活動中更新時間最新的第一筆資料，共三筆
            // 取得當月第一天跟最後一天
            $range = [];
            $range[] = Carbon::parse("$year-$month-10")->firstOfMonth();
            $range[] = Carbon::parse("$year-$month-10")->lastOfMonth();
            // 取得當月資料
            $dataAction = Info::with('infoType', 'infoImgs')->whereBetween('date_start', $range)->orderBy('updated_at', 'DESC')->where('type_id', 1)->first();
            $dataAnnouncement = Info::with('infoType', 'infoImgs')->whereBetween('date_start', $range)->orderBy('updated_at', 'DESC')->where('type_id', 2)->first();
            $dataNews = Info::with('infoType', 'infoImgs')->whereBetween('date_start', $range)->orderBy('updated_at', 'DESC')->where('type_id', 3)->first();
            $data = [];
            // 1 活動花絮 
            $data[] = $dataAction ?? 'none';
            // 2 審計公告
            $data[] = $dataAnnouncement ?? 'none';
            // 3 最新消息
            $data[] = $dataNews ?? 'none';

            return $data;
        }
        return 'give me month & year!';
    }

    public function allNewsData(Request $request)
    {
        if ($request->year && $request->month && $request->infType) {
            $year = $request->year;
            $month = $request->month;
            $infType = $request->infType;
            // 返回該年月，三種活動中更新時間最新的第一筆資料，共三筆
            // 取得當月第一天跟最後一天
            $range = [];
            $range[] = Carbon::parse("$year-$month-10")->firstOfMonth();
            $range[] = Carbon::parse("$year-$month-10")->lastOfMonth();
            // 取得當月資料
            if($infType == 1){
                $dataNews = Info::with('infoType', 'infoImgs')->whereBetween('date_start', $range)->orderBy('updated_at', 'DESC')->where('type_id', 1)->get();
            }else{
                $dataNews = Info::with('infoType', 'infoImgs')->whereBetween('date_start', $range)->orderBy('updated_at', 'DESC')->where('type_id', 2)->get();
            };

            if(count($dataNews) == 0){
                return [];
            }else{
                return $dataNews;
            }
        }
        return 'give me month & year!';
    }

    public function feastPhoto(Request $request)
    {
        if ($request->id) {
            $id = $request->id;
            if($id == 'all'){
                $feastPhotos = InfoImg::get();
            }else{
                $feastPhotos = Info::with('infoType', 'infoImgs')->find($id);
            }

            return $feastPhotos;
        }
        return 'give me id!';
    }
}
