@extends('layouts.template')

@section('css')

@endsection

@section('main')
<main id="fullpage">
    <section id="about-us" class="section">
        <div class="effect-area">
            <a href="/index" class="logo-link" title="回到首頁">
                <img class="logo-img" src="{{asset('/img/Logo-img.png')}}" alt="審計新村LOGO插圖">
                <img class="logo-text" src="{{asset('/img/Logo-text.png')}}" alt="審計新村LOGO文字">
            </a>
            <div class="about-us-container">
                <div class="about-us-title">
                    <h2>關於審計</h2>
                    <span>Shen Ji New Village</span>
                </div>
                <article>
                    <div class="about-us-swiper aboutUsSwiper">
                        <div class="swiper-wrapper">
                            @foreach ($sliders as $slider)
                            <div class="about-us-slide swiper-slide">
                                <div class="img" style="background-image: url({{asset($slider->img)}});"
                                    alt="{{$slider->name}}"></div>
                            </div>
                            @endforeach
                        </div>
                        <div class="swiper-button swiper-button-next" title="點擊切換上一張"></div>
                        <div class="swiper-button swiper-button-prev" title="點擊切換下一張"></div>
                        <div class="swiper-pagination"></div>
                    </div>
                    <p class="about-us-content">
                        審計新村原為臺灣省政府審計處（今審計部教育農林審計處）與臺灣省政府新聞處（今行政院新聞傳播處地方新聞科）的宿舍，1969年興建完成，是中部繼光復新村、長安新村之後的第三批台灣省政府宿舍群。
                    </p>
                </article>
            </div>
        </div>
    </section>
    <section id="news" class="section">
        <a href="/index" class="logo-link" title="回到首頁">
            <img class="logo-img" src="{{asset('/img/Logo-img.png')}}" alt="審計新村LOGO插圖">
            <img class="logo-text" src="{{asset('/img/Logo-text.png')}}" alt="審計新村LOGO文字">
        </a>
        <div class="news-container">
            <div class="news-title">
                <h2>審計新訊</h2>
                <span>Shen Ji New Village</span>
            </div>
            <article>
                <div class="news-date">
                    <div class="date-title">月份選擇</div>
                    <div class="date-btns" id="month-list"></div>
                    <div class="date-btns" id="years-list"></div>
                </div>
                <div class="news-content">
                    <div class="content-title">
                        <div class="date-title-control">
                            <i class="fas fa-chevron-left" data-month="prev" title="上個月"></i>
                            <h3></h3>
                            <div class="month"></div>
                            <div class="years"></div>
                            <i class="fas fa-chevron-right" data-month="next" title="下個月"></i>
                        </div>
                        <input type="button" id="datepicker" class="phone-date-btn" name="setuptime" title="選擇日期" value="選擇日期">
                    </div>
                    <div class="content-infs"></div>
                </div>
            </article>
        </div>
    </section>
    <section id="map" class="section">
        <a href="/index" class="logo-link" title="回到首頁">
            <img class="logo-img" src="./img/Logo-img.png" alt="審計新村LOGO插圖">
            <img class="logo-text" src="./img/Logo-text.png" alt="審計新村LOGO文字">
        </a>
        <div class="map-container">
            <div class="map-title">
                <h2>園區地圖</h2>
                <span>Shen Ji New Village</span>
            </div>
            <div class="map-area">
                <div class="map-bgc">

                    <div class="map-a01" data-name="" value=""></div>
                    <div class="map-a02" data-name="food" data-phone="04-2301-2826" data-time="11:00~20:00"
                        value="繞輪司"></div>
                    <div class="map-a03" data-name="" value=""></div>
                    <div class="map-a04" data-name="" value=""></div>
                    <div class="map-b01" data-name="" value=""></div>
                    <div class="map-b02" data-name="food" data-phone="04-23026882" data-time="10:00~21:00"
                        value="成真咖啡"></div>
                    <div class="map-b03" data-name="food" data-phone="04-23026882" data-time="10:00~21:00"
                        value="成真咖啡"></div>
                    <div class="map-b04" data-name="" value=""></div>
                    <div class="map-b05" data-name="food" data-phone="04-23026882" data-time="10:00~21:00"
                        value="成真咖啡"></div>
                    <div class="map-b06" data-name="food" data-phone="04-23026882" data-time="10:00~21:00"
                        value="成真咖啡"></div>
                    <div class="map-c01" data-name="" value=""></div>
                    <div class="map-c02" data-name="gift" data-phone="0930-676-529" data-time="12:00~17:30" value="Kou-Jewellery"></div>
                    <div class="map-c03" data-name="gift" data-phone="0989-438-877" data-time="12:00~19:00"
                        value="森多水耕"></div>
                    <div class="map-c04" data-name="food" data-phone="0989-438-877" data-time="10:00~20:00"
                        value="甜月亮"></div>
                    <div class="map-c05" data-name="gift" data-phone="0963-165-181" data-time="10:00~20:00"
                        value="KerKerland"></div>
                    <div class="map-c06" data-name="" value=""></div>
                    <div class="map-c07" data-name="" value=""></div>
                    <div class="map-c08" data-name="gift" data-phone="等等呢~~" data-time="11:00~18:00" value="愚室實驗所">
                    </div>
                    <div class="map-c09" data-name="" value=""></div>
                    <div class="map-c10" data-name="gift" data-phone="04-22226160" data-time="11:00~20:00"
                        value="Ficelle妃紗"></div>
                    <div class="map-c11" data-name="food" data-phone="0923-312-545" data-time="12:00~19:30"
                        value="Two-Day"></div>
                    <div class="map-d01" data-name="" value=""></div>
                    <div class="map-d02" data-name="gift" data-phone="等等呢~~" data-time="11:00~19:30" value="BAGCOM">
                    </div>
                    <div class="map-d03" data-name="gift" data-phone="等等呢~~" data-time="11:00~21:00" value="能藝文具">
                    </div>
                    <div class="map-d04" data-name="gift" data-phone="04-23019262" data-time="11:00~19:00"
                        value="品墨良行"></div>
                    <div class="map-d05" data-name="gift" data-phone="04-23019580" data-time="11:00~19:30"
                        value="小日子商號"></div>
                    <div class="map-d06" data-name="" value=""></div>
                    <div class="map-d07" data-name="food" data-phone="04-22023121" data-time="10:00~19:00"
                        value="KOI-THE"></div>
                    <div class="map-d08" data-name="food" data-phone="04-23019569" data-time="11:00~19:00"
                        value="艸水木堂"></div>
                    <div class="map-d09" data-name="food" data-phone="04-23012715" data-time="11:00~19:00"
                        value="森林島嶼"></div>
                    <div class="map-d10" data-name="food" data-phone="04-23012715" data-time="11:00~19:00"
                        value="森林島嶼"></div>
                    <div class="map-d11" data-name="food" data-phone="04-23011911" data-time="11:00~19:00"
                        value="旅禾泡芙之家"></div>
                    <div class="map-d12" data-name="food" data-phone="04-23017301" data-time="11:00~18:30"
                        value="三時杏仁"></div>
                    <div class="map-black-bgc"></div>
                    <div class="map-message">
                        <div class="map-shopname">
                            <img class="shopname-logo" src="/img/shopping-icon.svg" alt="">
                            <span>森多水耕植研所</span>
                        </div>
                        <div class="map-businesshour">
                            <img class="businesshour-logo" src="/img/clock02-icon.svg" alt="">
                            <span>12:00~19:00</span>
                        </div>
                        <div class="map-shopphone">
                            <img class="shopphone-logo" src="/img/phone-icon.svg" alt="">
                            <span>無</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section id="store" class="section">
        <a href="/index" class="logo-link" title="回到首頁">
            <img class="logo-img" src="{{asset('/img/Logo-img.png')}}" alt="審計新村LOGO插圖">
            <img class="logo-text" src="{{asset('/img/Logo-text.png')}}" alt="審計新村LOGO文字">
        </a>
        <div class="store-container">
            <div class="store-title">
                <h2>店家介紹</h2>
                <span>Shen Ji New Village</span>
            </div>
            <article>
                <div class="shop-window">
                    <img src="{{asset('/img/shop-window.png')}}" alt="窗戶的裝飾圖">
                    @foreach ($shops as $shop)
                    <ul data-title="{{$shop->id - 1}}" class="{{$shop->id == 1 ? '' : 'appear-none'}}">
                        <li>
                            <a href="{{$shop->shopImgs[2]->img??''}}" title="點我看大圖" data-title="{{$shop->name}}" class="check-btn photo-view"
                                data-lightbox="food-shop-{{$shop->id}}">看大圖</a>
                        </li>
                        <li>
                            <a href="/store{{$shop->id}}" title="點我看介紹" class="check-btn shop-view">看介紹</a>
                        </li>
                    </ul>
                    <div class="window-title {{$shop->id == 1 ? '' : 'appear-none'}}" data-title="{{$shop->id - 1}}">
                        {{$shop->name}}</div>
                    @endforeach
                    <div class="hide-area">
                        <div class="figure-box">
                            <div class="tap-change" data-title="1">
                                @foreach ($foodShops as $shop)
                                <figure style="background-image: url({{$shop->shopImgs[2]->img??''}});"></figure>
                                @endforeach
                            </div>
                            <div class="tap-change" data-title="2">
                                @foreach ($trinketShops as $shop)
                                <figure style="background-image: url({{$shop->shopImgs[2]->img??''}});"></figure>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                <nav>
                    <h3>商家介紹</h3>
                    <div class="nav-tap-list">
                        <div class="nav-tap tap-active" data-title="1" title="{{$newShopTypes[0]->name??''}}">
                            {{$newShopTypes[0]->name??''}}</div>
                        <div class="nav-tap" data-title="2" title="{{$newShopTypes[1]->name??''}}">
                            {{$newShopTypes[1]->name??''}}</div>
                    </div>
                    <div class="food-shop shop-list" data-title="1">
                        @foreach ($newShopTypes[0]->shops??[] as $shop)
                        <div>
                            <span class="{{$shop->id == 1 ? 'bottom-line' : ''}}" data-title="{{$shop->id - 1}}"
                                title="{{$shop->name}}">{{$shop->name}}</span>
                        </div>
                        @endforeach
                    </div>
                    <div class="trinket-shop shop-list appear-none" data-title="2">
                        @foreach ($newShopTypes[1]->shops??[] as $shop)
                        <div>
                            <span class="{{$shop->id == 12 ? 'bottom-line' : ''}}" data-title="{{$shop->id - 1}}"
                                title="{{$shop->name}}">{{$shop->name}}</span>
                        </div>
                        @endforeach
                    </div>
                </nav>
            </article>
        </div>
    </section>
    <section id="view" class="section">
        <a href="/index" class="logo-link" title="回到首頁">
            <img class="logo-img" src="./img/Logo-img.png" alt="">
            <img class="logo-text" src="./img/Logo-text.png" alt="">
        </a>
        <div class="view-container">
            <div class="view-title">
                <h2>周邊景點</h2>
                <span>Shen Ji New Village</span>
            </div>
            <div class="view-main">
                <div class="swiper-container">
                    <div class="swiper-wrapper">
                        @foreach ($views as $view)
                        <div class="swiper-slide" data-id="{{$view->id}}">
                            <div class="view-card">
                                <p>{{$view->name}}</p>
                                <p class="fas fa-map"> {{$view->phone}}</p>
                                <a href="{{$view->viewImgs[0]->img??''}}" data-lightbox="roadtrip-{{$view->id}}" title="點我看大圖" data-title="{{$view->name}}">
                                    <span class="view-card-img"
                                        style="background-image: url('{{$view->viewImgs[0]->img??''}}');"></span>
                                </a>
                                @php
                                    $view->viewImgs->shift();
                                @endphp
                                @foreach ($view->viewImgs as $img)
                                <a href="{{$img->img}}" data-lightbox="roadtrip-{{$img->view_id}}"></a>
                                @endforeach
                                <p>{{$view->content}}</p>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section id="traffic" class="section">
        <a href="/index" class="logo-link" title="回到首頁">
            <img class="logo-img" src="{{asset('/img/Logo-img.png')}}" alt="審計新村LOGO插圖">
            <img class="logo-text" src="{{asset('/img/Logo-text.png')}}" alt="審計新村LOGO文字">
        </a>
        <div class="traffic-container">
            <div class="traffic-title">
                <h2>交通資訊</h2>
                <span class="tra-title-icon">How To Get There</span>
                <p>如何到達審計?</p>
            </div>
            <div class="traffic-main">
                <div class="traffic-bus">
                    <div class="traffic-logo">
                        <div class="traffic-icon">
                            <img src="{{asset('/img/bus.svg')}}" alt="這是公車圖案的標示">
                        </div>
                        <p>台中市公車</p>
                    </div>
                    <div class="traffic-content">
                        <p>步行兩分鐘</p>
                        <p>「英才郵局」 5路、51路</p>
                        <p>「向上國中」 11路、23路、71路、89路</p>
                    </div>
                </div>
                <div class="traffic-car">
                    <div class="traffic-logo">
                        <div class="traffic-icon">
                            <img src="{{asset('/img/traffic-car.svg')}}" alt="這是汽車圖案的標示">
                        </div>
                        <p>自行開車</p>
                    </div>
                    <div class="traffic-content">台灣大道二段 → 美村路一段 → 民生路
                    </div>
                </div>
                <div class="traffic-bike">
                    <div class="traffic-logo">
                        <div class="traffic-icon">
                            <img src="{{asset('/img/traffic-bike.svg')}}" alt="這是自行車圖案的標示">
                        </div>
                        <p>騎乘 YouBike</p>
                    </div>
                    <div class="traffic-content">
                        <div>附近YouBike 據點分布資訊</div>
                        <a href="/tra_map" title="點擊查看附近YouBike">點擊查看 ></a>
                    </div>
                </div>
            </div>
    </section>
    <section id="contact" class="section">
        <a href="/index" class="logo-link" title="回到首頁">
            <img class="logo-img" src="{{asset('/img/Logo-img.png')}}" alt="審計新村LOGO插圖">
            <img class="logo-text" src="{{asset('/img/Logo-text.png')}}" alt="審計新村LOGO文字">
        </a>
        <div class="contact-container">
            <div class="contact-title">
                <h2>聯絡審計</h2>
                <span>Contact Shen Ji </span>
            </div>
            <div class="contact-main">
                <div class="contact-form-title">
                    <div class="form-text">
                        <h2>聯絡審計</h2>
                        <p>Contact Shen Ji</p>
                    </div>
                </div>
                <div class="contact-form-main">
                    <form class="contact-form" id="contact-form" action="" method="POST">
                        <div class="select-bcg">加入審計</div>
                        <div class="bcground">
                            <ul class="form-type">
                                <li value="join">加入審計</li>
                                <li value="opinion">顧客意見</li>
                            </ul>
                        </div>
                        <div class="form-storename">
                            <p>進駐店家</p>
                            <input type="text" name="store">
                        </div>
                        <div class="form-email">
                            <p>E-mail</p>
                            <input type="text" name="email">
                        </div>
                        <div class="form-producttype">
                            <p>商品種類</p>
                            <div class="form-optiontype"></div>
                            <div class="opground">
                                <ul name="optiontype" class="optiontype">
                                    <li value="美食點心類">美食點心類</li>
                                    <li value="小物禮品類">小物禮品類</li>
                                    <li value="其他類">其他類</li>
                                </ul>
                            </div>
                        </div>
                        <div class="form-description">
                            <p>詳細資訊</p>
                            <textarea name="description" id="" cols="30" rows="10"></textarea>
                        </div>
                        <input class="form-sendout" type="submit" value="送出資料" title="送出資料">
                    </form>
                </div>
            </div>
        </div>
    </section>
</main>
@endsection

@section('js')
<script src="{{ asset('js/index.js')}}"></script>
@endsection