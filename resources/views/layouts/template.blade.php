<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>審計新村</title>

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+TC:wght@700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+HK:wght@500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/lightbox.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/swiper-bundle.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/all.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/fullpage.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/jquery-ui.theme.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/index.css')}}">
    @yield('css')
</head>

<body>
    <header>
        <nav>
            <ul class="ulbar" id="myMenu">
                <li data-menuanchor="firstPage">
                    <a href="/index#firstPage" title="關於審計">
                        <span class="icon far fa-address-book"></span>
                        <span class="title">關於審計</span>
                    </a>
                </li>
                <li data-menuanchor="secondPage">
                    <a href="/index#secondPage" title="審計新訊">
                        <span class="icon fab fa-angellist"></span>
                        <span class="title">審計新訊</span>
                    </a>
                </li>
                <li data-menuanchor="thirdPage">
                    <a href="/index#thirdPage" title="園區地圖">
                        <span class="icon fas fa-map-marked-alt"></span>
                        <span class="title">園區地圖</span>
                    </a>
                </li>
                <li data-menuanchor="fourthPage">
                    <a href="/index#fourthPage" title="商家介紹">
                        <span class="icon fas fa-store"></span>
                        <span class="title">商家介紹</span>
                    </a>
                </li>
                <li data-menuanchor="fifthPage">
                    <a href="/index#fifthPage" title="周邊景點">
                        <span class="icon fas fa-map-marker-alt"></span>
                        <span class="title">周邊景點</span>
                    </a>
                </li>
                <li data-menuanchor="sixthPage">
                    <a href="/index#sixthPage" title="交通資訊">
                        <span class="icon fas fa-bus-alt"></span>
                        <span class="title">交通資訊</span>
                    </a>
                </li>
                <li data-menuanchor="seventhPage">
                    <a href="/index#seventhPage" title="聯絡審計">
                        <span class="icon far fa-envelope"></span>
                        <span class="title">聯絡審計</span>
                    </a>
                </li>
            </ul>
            <div class="toggle" title="拉開導覽列"></div>
            <div class="nav-img"></div>
        </nav>
    </header>
    @yield('main')
    <footer>
        <div class="footer-container">
            <h2>審計新村 Shen Ji New Village</h2>
            <article>
                <div>
                    <h3>聯絡資訊</h3>
                    <div class="inf-detil">
                        <div>電話 04-23023138</div>
                        <div>04-23210630</div>
                        <p>地址 臺中市西區民生路368巷</p>
                    </div>
                </div>
                <div>
                    <h3>營業時間</h3>
                    <div class="open-detil">
                        <div class="date-area">
                            <div class="date-box">周一</div>
                            <span>至</span>
                            <div class="date-box">周日</div>
                        </div>
                        <time>10:00-19:00</time>
                    </div>
                </div>
                <div class="fb-page fb-big" data-href="https://www.facebook.com/shenji368/?ref=page_internal"
                    data-tabs="timeline" data-width="441" data-height="192" data-small-header="true"
                    data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true">
                    <blockquote cite="https://www.facebook.com/shenji368/?ref=page_internal"
                        class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/shenji368/?ref=page_internal"
                            title="審計368新創聚落Facebook">審計368新創聚落</a></blockquote>
                </div>
                <div class="fb-page fb-middle" data-href="https://www.facebook.com/shenji368/" data-tabs="timeline"
                    data-width="350" data-height="70" data-small-header="false" data-adapt-container-width="true"
                    data-hide-cover="false" data-show-facepile="true">
                    <blockquote cite="https://www.facebook.com/shenji368/" class="fb-xfbml-parse-ignore"><a
                            href="https://www.facebook.com/shenji368/">審計368新創聚落</a></blockquote>
                </div>
                <div class="fb-page fb-small" data-href="https://www.facebook.com/shenji368/" data-tabs="timeline"
                    data-width="180" data-height="70" data-small-header="true" data-adapt-container-width="true"
                    data-hide-cover="false" data-show-facepile="true">
                    <blockquote cite="https://www.facebook.com/shenji368/" class="fb-xfbml-parse-ignore"><a
                            href="https://www.facebook.com/shenji368/">審計368新創聚落</a></blockquote>
                </div>
                <div class="foot-logo-box">
                    <img class="footer-logo-img" src="{{asset('/img/footer-logo-img.png')}}" alt="審計新村LOGO插圖">
                    <img class="footer-logo-text" src="{{asset('/img/footer-logo-text.png')}}" alt="審計新村LOGO文字">
                </div>
            </article>
            <p>Copyright © 審計新村走九遍 All reserved</p>
        </div>
    </footer>
    <script async defer crossorigin="anonymous" src="https://connect.facebook.net/zh_TW/sdk.js#xfbml=1&version=v10.0"
        nonce="gw7gekne"></script>
    <script src="{{asset('js/jquery.min.js')}}"></script>
    <script src="{{asset('js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('js/swiper-bundle.min.js')}}"></script>
    <script src="{{asset('js/lightbox-plus-jquery.min.js')}}"></script>
    <script src="{{asset('js/fullpage.min.js')}}"></script>
    <script src="{{asset('js/jquery-ui.min.js')}}"></script>
    @yield('js')
</body>

</html>