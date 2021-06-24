@extends('layouts.template')

@section('css')
<link rel="stylesheet" href="/css/tra-map.css">
@endsection

@section('main')
<main class="traffic">
    <a href="/index#sixthPage" class="logo-link" title="回到首頁">
        <img class="logo-img" src="./img/Logo-img.png" alt="審計新村LOGO插圖">
        <img class="logo-text" src="./img/Logo-text.png" alt="審計新村LOGO文字">
    </a>
    <div class="traffic-container">
        <div class="traffic-title">
            <h2>交通資訊</h2>
            <span class="tra-title-icon">How To Get There</span>
            <div class="tra-youbike">如何到達審計?</div>
            <div class="youbike-point">YouBike 據點分布</div>
        </div>
        <div class="traffic-bike">
            <!--Google map-->
            <div id="map-container-google-1" class="z-depth-1-half bike-map">
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m16!1m12!1m3!1d7281.57181270075!2d120.66116660379524!3d24.144155712871452!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!2m1!1z5a-p6KiIMzY4IHlvdWJpa2U!5e0!3m2!1szh-TW!2stw!4v1623687237883!5m2!1szh-TW!2stw"
                    width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>"
                frameborder="0" style="border:0" allowfullscreen></iframe>
            </div>
            <!--Google Maps-->
        </div>
    </div>
</main>
@endsection

@section('js')
<script>
//header的點擊拉出效果
const navbar = document.querySelector('nav');
const ulbar = document.querySelector('.ulbar');
const navimg = document.querySelector('.nav-img');
const header = document.querySelector('header');
const navToggle = document.querySelector('.toggle');
const main = document.querySelector('main');
navToggle.addEventListener('click', function () {
  this.classList.toggle('active');
  navbar.classList.toggle('active');
  ulbar.classList.toggle('active');
  navimg.classList.toggle('active');
  header.classList.toggle('header-shady');
});
main.addEventListener('click', function () {
  navRemove();
});
header.addEventListener('click', function (e) {
  if(e.target !== navToggle){
    navRemove();
  };
});

function navRemove(){
  navToggle.classList.remove('active');
  navbar.classList.remove('active');
  ulbar.classList.remove('active');
  navimg.classList.remove('active');
  header.classList.remove('header-shady');
};
</script>
@endsection