@extends('layouts.template')

@section('css')
<link rel="stylesheet" href="{{asset('/css/store.page.css')}}">
@endsection

@section('main')
<main>
    <a href="/index?type={{$shops->type_id}}&shop={{$shops->id}}#fourthPage" class="logo-link" title="回到首頁">
        <img class="logo-img" src="{{asset('/img/Logo-img.png')}}" alt="審計新村LOGO插圖">
        <img class="logo-text" src="{{asset('/img/Logo-text.png')}}" alt="審計新村LOGO文字">
    </a>
    <div class="store-title">
        <h2>店家資訊</h2>
        <span>Shen Ji New Village</span>
    </div>
    <div class="store-page-container">
        <article>
            <div>
                <h3 class="mb-4">{{$shops->name}}</h3>
                <p>{{$shops->content}}</p>
            </div>
            <div class="photo-wall">
                <div class="main-photo">
                    @php
                        $shopimgs = $shops->shopImgs->take(5);
                    @endphp
                    @foreach ($shopimgs as $img)
                    <figure style="background-image: url({{asset($img->img)}});" data-photo="{{$img->id}}"></figure>   
                    @endforeach
                </div>
                <div class="nav-photo">
                    @foreach ($shopimgs as $img)
                    <figure class="{{$img->id % 6 == 3 || $img->id == 3 ? '' : 'white-mask'}}" style="background-image: url({{asset($img->img)}});"
                        data-photo="{{$img->id}}" title="點我切換"></figure>    
                    @endforeach
                </div>
            </div>
            <div class="down-content-photo" style="background-image: url({{asset($shops->shopImgs[5]->img??'')}});"></div>
            <p>{{$shops->content_second}}</p>
            <a href="/index?type={{$shops->type_id}}&shop={{$shops->id}}#fourthPage" title="回到首頁" class="back-btn">回上一頁</a>
        </article>
    </div>
</main>
@endsection

@section('js')
<script src="{{asset('/js/store.page.js')}}"></script>
@endsection