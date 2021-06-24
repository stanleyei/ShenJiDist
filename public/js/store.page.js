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

//點擊照片切換
const mainPhotos = document.querySelectorAll('.main-photo > figure');
const whiteMasks = document.querySelectorAll('.nav-photo > figure');
const navPhotos = document.querySelector('.nav-photo');
navPhotos.addEventListener('click', function (e) {
  if(e.target !== navPhotos){
    mainPhotos.forEach(photo => {
      const displacement = e.target.dataset.photo % 6 - 1;
      photo.style.transform = `translateX(${displacement * -100}%)`;
    });
    whiteMasks.forEach(photo => {
      photo.classList.add('white-mask');
        if(photo.dataset.photo === e.target.dataset.photo){
          photo.classList.remove('white-mask');
        };
    });
  }
});

//回到頂端按鈕
(function () {
    $("body").append("<div id='goTopButton' class='fas fa-chevron-up' style='display: none; z-index: 5; cursor: pointer;' title='回到頂端'/></div>");
    const locatioin = 2 / 3, // 按鈕出現在螢幕的高度
      right = 10, // 距離右邊 px 值 
      opacity = 0.5, // 透明度
      speed = 500, // 捲動速度
      $button = $("#goTopButton"),
      $body = $(document),
      $win = $(window);
    $button.on({
      mouseover: () => { $button.css("opacity", 1); },
      mouseout: () => { $button.css("opacity", opacity); },
      click: () => { $("html, body").animate({ scrollTop: 0 }, speed); }
    });
    window.goTopMove = () => {
      const scrollH = $body.scrollTop(),
        winH = $win.height(),
        css = { "top": winH * locatioin + "px", "position": "fixed", "right": right, "opacity": opacity };
      if (scrollH > 20) {
        $button.css(css);
        $button.fadeIn("slow");
      } else {
        $button.fadeOut("slow");
      }
    };
    $win.on({
      scroll: () => { goTopMove(); },
      resize: () => { goTopMove(); }
    });
  })();