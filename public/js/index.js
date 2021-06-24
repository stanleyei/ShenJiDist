//一進頁面便發送POST撈出審計新訊資料
const token = document.querySelector('[name="csrf-token"]').getAttribute('content');
const monthData = ['一月', '二月', '三月', '四月', '五月', '六月', '七月', '八月', '九月', '十月', '十一月', '十二月'];
const contentInfs = document.querySelector('.content-infs');
const date = new Date();
const postYear = date.getFullYear();
const postMonth = date.getMonth() + 1;
const infsData = new FormData;
infsData.append('_token', token);
infsData.append('month', postMonth);
infsData.append('year', postYear);
fetch('/get_date_data', {
  method: 'POST',
  body: infsData,
})
  .then(response => response.json())
  .then(result => {
    const monthArray = [];
    const dataArray = [];
    result.forEach(data => {
      if (data === 'none') {
        contentInfs.innerHTML +=
          `<div class='content-inf'>
          <div class='inf-detail ml-4'>
              <h4 style='line-height:9.25vh'>No Events</h4>
          </div>
        </div>
        `;
      } else {
        const startMonth = data.date_start.split('-');
        contentInfs.innerHTML +=
          `<a class='content-inf' href='/news?tap=${data.info_type.id}&month=${startMonth[1]}&year=${startMonth[0]}' title='前往${data.info_type.name}'>
          <div class='inf-date'>
              <div class='during'>
                  <div class='start-date'></div>
              </div>
              <span></span>
          </div>
          <div class='inf-detail'>
              <div class='inf-tag'>${data.info_type.name}</div>
              <h4>${data.name}</h4>
          </div>
          <span>more</span>
          <i class='fas fa-chevron-right'></i>
        </a>`;
        const monthNumber = data.created_at.split('-');
        if (monthNumber[1] === '10' || monthNumber[1] === '11' || monthNumber[1] === '12') {
          monthArray.push(monthNumber[1]);
        } else {
          const singleMonth = monthNumber[1].split('0');
          monthArray.push(singleMonth[1]);
        };
        const dataNumber = monthNumber[2].split('T');
        dataArray.push(dataNumber[0]);
      };
    });

    let x = 0;
    document.querySelectorAll('.start-date').forEach(date => {
      date.textContent = dataArray[x];
      x++;
    });

    let i = 0;
    document.querySelectorAll('.inf-date > span').forEach(month => {
      month.textContent = monthData[monthArray[i] - 1];
      i++
    });
  });

// 整頁-fullpage輪播套件
new fullpage('#fullpage', {
  autoScrolling: true,
  afterLoad: function (origin, destination, direction) {
    if (destination.index === 5 && direction === 'down') {
      fullpage_api.setAutoScrolling(false); //關閉自動滾動模式
      fullpage_api.setFitToSection(false); //關閉滾輪自動回到最近section的效果
    }
    else if (direction === 'up') {
      fullpage_api.setAutoScrolling(true); //開啟自動滾動模式
    }
  },
  menu: '#fullpageMenu',
  //配置導航,位置，提示,顯示當前位置
  navigation: true,
  //導航欄
  anchors: ['firstPage', 'secondPage', 'thirdPage', 'fourthPage', 'fifthPage', 'sixthPage', 'seventhPage'],
  menu: '#myMenu',
  normalScrollElements: '.shop-list, .map-area',
});

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
  if (e.target !== navToggle) {
    navRemove();
  };
});

function navRemove() {
  navToggle.classList.remove('active');
  navbar.classList.remove('active');
  ulbar.classList.remove('active');
  navimg.classList.remove('active');
  header.classList.remove('header-shady');
};

//關於審計-Swiper輪播套件
const aboutUsSwiper = new Swiper(".aboutUsSwiper", {
  slidesPerView: 1, //同時顯示幾張
  spaceBetween: 30,
  loop: true,
  grabCursor: true,
  effect: 'fade',
  fadeEffect: {
    crossFade: true,
  },
  speed: 2500,
  autoplay: {
    delay: 2500,
    disableOnInteraction: false,
    waitForTransition: false,
  },
  pagination: {
    el: ".swiper-pagination",
    clickable: true,
  },
  navigation: {
    nextEl: ".swiper-button-next",
    prevEl: ".swiper-button-prev",
    hideOnClick: true,
  },
});

//審計新訊-生成按鈕
const monthList = document.querySelector('#month-list');
const yearsList = document.querySelector('#years-list');
let dataValue = 1;
monthData.forEach(data => {
  monthList.innerHTML += `<button class="month-btn" data-month="${dataValue}" title="${data}">${data}</button>`
  dataValue++;
});
for (let i = 0; i < 5; i++) {
  yearsList.innerHTML += `<button class="years-btn" data-year="${2019 + i}" title="${2019 + i}">${2019 + i}</button>`;
};

//審計新訊-切換選擇日期的效果
const monthEn = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
const monthBtns = document.querySelectorAll('.month-btn');
const yearsBtns = document.querySelectorAll('.years-btn');
const dateTitle = document.querySelector('.date-title-control > .month');
const thisYear = String(date.getFullYear());
const thisMonth = String(date.getMonth() + 1);
focusChange(monthBtns);
focusChange(yearsBtns);

function focusChange(dateBtns) {
  dateTitle.previousElementSibling.textContent = monthData[date.getMonth()];
  dateTitle.textContent = monthEn[date.getMonth()];
  dateTitle.nextElementSibling.textContent = `,${thisYear}`;
  dateBtns.forEach(btns => {
    if (btns.textContent === thisYear) {
      btns.classList.add('focus-change');
    }
    else if (btns.dataset.month === thisMonth) {
      btns.classList.add('focus-change');
    }
    btns.addEventListener('click', function () {
      if (this.getAttribute('class') === 'month-btn') {
        dateTitle.textContent = monthEn[this.dataset.month - 1];
        dateTitle.previousElementSibling.textContent = this.textContent;
      }
      else if (this.getAttribute('class') === 'years-btn') {
        dateTitle.nextElementSibling.textContent = `,${this.textContent}`;
      }
      dateBtns.forEach(btn => {
        btn === this
          ?
          btn.classList.add('focus-change')
          :
          btn.classList.remove('focus-change');
      });

      const focisMonth = monthList.getElementsByClassName('month-btn focus-change')[0].dataset.month;
      const focisYear = yearsList.getElementsByClassName('years-btn focus-change')[0].dataset.year;
      const formData = new FormData;
      formData.append('month', focisMonth);
      formData.append('year', focisYear);
      formData.append('_token', token);
      fetch('/get_date_data', {
        method: 'POST',
        body: formData,
      })
        .then(response => {
          return response.json();
        })
        .then(result => {
          const monthArray = [];
          const dataArray = [];
          contentInfs.innerHTML = '';
          result.forEach(data => {
            if (data === 'none') {
              contentInfs.innerHTML +=
                `<div class='content-inf'>
                <div class='inf-detail ml-4'>
                    <h4 style='line-height:9.25vh'>No Events</h4>
                </div>
              </div>
              `;
            } else {
              const startMonth = data.date_start.split('-');
              contentInfs.innerHTML +=
                `<a class='content-inf' href='/news?tap=${data.info_type.id}&month=${startMonth[1]}&year=${startMonth[0]}' title='前往${data.info_type.name}'>
                <div class='inf-date'>
                    <div class='during'>
                        <div class='start-date'></div>
                    </div>
                    <span></span>
                </div>
                <div class='inf-detail'>
                    <div class='inf-tag'>${data.info_type.name}</div>
                    <h4>${data.name}</h4>
                </div>
                <span>more</span>
                <i class='fas fa-chevron-right'></i>
              </a>`;
              const monthNumber = data.created_at.split('-');
              if (monthNumber[1] === '10' || monthNumber[1] === '11' || monthNumber[1] === '12') {
                monthArray.push(monthNumber[1]);
              } else {
                const singleMonth = monthNumber[1].split('0');
                monthArray.push(singleMonth[1]);
              };
              const dataNumber = monthNumber[2].split('T');
              dataArray.push(dataNumber[0]);
            };
          });

          let x = 0;
          document.querySelectorAll('.start-date').forEach(date => {
            date.textContent = dataArray[x];
            x++;
          });

          let i = 0;
          document.querySelectorAll('.inf-date > span').forEach(month => {
            month.textContent = monthData[monthArray[i] - 1];
            i++
          });
        });
    });
  });
}

//點擊前後箭頭更換月份
const dateTitleControl = document.querySelector('.date-title-control');
let monthIndex = Number(thisMonth) - 1;
let yearsIndex = date.getFullYear();
let changeMonth = postMonth;
dateTitleControl.addEventListener('click', function (e) {
  monthLoop(e, 'prev', 0, 11, -1);
  monthLoop(e, 'next', 11, 0, 1);
});

function monthLoop(e, direction, startIndex, finalIndex, count) {
  if (e.target.dataset.month === `${direction}`) {
    const changeYear = dateTitle.nextElementSibling.textContent.slice(-4);
    if (changeMonth === 1) {
      changeMonth = 12;
    } else if (changeMonth === 12) {
      changeMonth = 1;
    };
    const formData = new FormData;
    formData.append('month', changeMonth + count);
    formData.append('year', changeYear);
    formData.append('_token', token);
    fetch('/get_date_data', {
      method: 'POST',
      body: formData,
    })
      .then(response => {
        return response.json();
      })
      .then(result => {
        const monthArray = [];
        const dataArray = [];
        contentInfs.innerHTML = '';
        result.forEach(data => {
          if (data === 'none') {
            contentInfs.innerHTML +=
              `<div class='content-inf'>
              <div class='inf-detail ml-4'>
                  <h4 style='line-height:9.25vh'>No Events</h4>
              </div>
            </div>
            `;
          } else {
            const startMonth = data.date_start.split('-');
            contentInfs.innerHTML +=
              `<a class='content-inf' href='/news?tap=${data.info_type.id}&month=${startMonth[1]}&year=${startMonth[0]}' title='前往${data.info_type.name}'>
              <div class='inf-date'>
                  <div class='during'>
                      <div class='start-date'></div>
                  </div>
                  <span></span>
              </div>
              <div class='inf-detail'>
                  <div class='inf-tag'>${data.info_type.name}</div>
                  <h4>${data.name}</h4>
              </div>
              <span>more</span>
              <i class='fas fa-chevron-right'></i>
            </a>`;
            const monthNumber = data.created_at.split('-');
            if (monthNumber[1] === '10' || monthNumber[1] === '11' || monthNumber[1] === '12') {
              monthArray.push(monthNumber[1]);
            } else {
              const singleMonth = monthNumber[1].split('0');
              monthArray.push(singleMonth[1]);
            };
            const dataNumber = monthNumber[2].split('T');
            dataArray.push(dataNumber[0]);
          };
        });

        let x = 0;
        document.querySelectorAll('.start-date').forEach(date => {
          date.textContent = dataArray[x];
          x++;
        });

        let i = 0;
        document.querySelectorAll('.inf-date > span').forEach(month => {
          month.textContent = monthData[monthArray[i] - 1];
          i++
        });
      });
    changeMonth = changeMonth + count;
    if (dateTitle.previousElementSibling.textContent !== monthData[startIndex]) {
      dateTitle.previousElementSibling.textContent = monthData[monthIndex + count];
      dateTitle.textContent = monthEn[monthIndex + count];
      monthIndex = monthIndex + count;
    }
    else {
      dateTitle.previousElementSibling.textContent = monthData[finalIndex];
      dateTitle.textContent = monthEn[finalIndex];
      dateTitle.nextElementSibling.textContent = `,${yearsIndex + count}`;
      yearsIndex = yearsIndex + count;
      monthIndex = finalIndex;
    };
  };
};

//審計新訊-點擊選擇日期按鈕切換效果
const phoneDateSelect = document.querySelector('.phone-date-btn');
const mutationObserver = new MutationObserver(function (mutations) {
  mutations.forEach(function () {
    if (phoneDateSelect.value !== '選擇日期') {
      const seleteArray = phoneDateSelect.value.split('-');
      dateTitle.nextElementSibling.textContent = `,${seleteArray[0]}`;
      if (seleteArray[1] === '10' || seleteArray[1] === '11' || seleteArray[1] === '12') {
        dateTitle.textContent = monthEn[seleteArray[1] - 1];
        dateTitle.previousElementSibling.textContent = monthData[seleteArray[1] - 1];

        const month = seleteArray[1];
        const year = seleteArray[0];
        const formData = new FormData;
        formData.append('month', month);
        formData.append('year', year);
        formData.append('_token', token);
        fetch('/get_date_data', {
          method: 'POST',
          body: formData,
        })
          .then(response => {
            return response.json();
          })
          .then(result => {
            const monthArray = [];
            const dataArray = [];
            contentInfs.innerHTML = '';
            result.forEach(data => {
              if (data === 'none') {
                contentInfs.innerHTML +=
                  `<div class='content-inf'>
                  <div class='inf-detail ml-4'>
                      <h4 style='line-height:9.25vh'>No Events</h4>
                  </div>
                </div>
                `;
              } else {
                const startMonth = data.date_start.split('-');
                contentInfs.innerHTML +=
                  `<a class='content-inf' href='/news?tap=${data.info_type.id}&month=${startMonth[1]}&year=${startMonth[0]}' title='前往${data.info_type.name}'>
                  <div class='inf-date'>
                      <div class='during'>
                          <div class='start-date'></div>
                      </div>
                      <span></span>
                  </div>
                  <div class='inf-detail'>
                      <div class='inf-tag'>${data.info_type.name}</div>
                      <h4>${data.name}</h4>
                  </div>
                  <span>more</span>
                  <i class='fas fa-chevron-right'></i>
                </a>`;
                const monthNumber = data.created_at.split('-');
                if (monthNumber[1] === '10' || monthNumber[1] === '11' || monthNumber[1] === '12') {
                  monthArray.push(monthNumber[1]);
                } else {
                  const singleMonth = monthNumber[1].split('0');
                  monthArray.push(singleMonth[1]);
                };
                const dataNumber = monthNumber[2].split('T');
                dataArray.push(dataNumber[0]);
              };
            });

            let x = 0;
            document.querySelectorAll('.start-date').forEach(date => {
              date.textContent = dataArray[x];
              x++;
            });

            let i = 0;
            document.querySelectorAll('.inf-date > span').forEach(month => {
              month.textContent = monthData[monthArray[i] - 1];
              i++
            });
          });
      }
      else {
        const titleMonth = seleteArray[1].split('0');
        dateTitle.textContent = monthEn[titleMonth[1] - 1];
        dateTitle.previousElementSibling.textContent = monthData[titleMonth[1] - 1];

        const month = titleMonth[1];
        const year = seleteArray[0];
        const formData = new FormData;
        formData.append('month', month);
        formData.append('year', year);
        formData.append('_token', token);
        fetch('/get_date_data', {
          method: 'POST',
          body: formData,
        })
          .then(response => {
            return response.json();
          })
          .then(result => {
            const monthArray = [];
            const dataArray = [];
            contentInfs.innerHTML = '';
            result.forEach(data => {
              if (data === 'none') {
                contentInfs.innerHTML +=
                  `<div class='content-inf'>
                  <div class='inf-detail ml-4'>
                      <h4 style='line-height:9.25vh'>No Events</h4>
                  </div>
                </div>
                `;
              } else {
                const startMonth = data.date_start.split('-');
                contentInfs.innerHTML +=
                  `<a class='content-inf' href='/news?tap=${data.info_type.id}&month=${startMonth[1]}&year=${startMonth[0]}' title='前往${data.info_type.name}'>
                  <div class='inf-date'>
                      <div class='during'>
                          <div class='start-date'></div>
                      </div>
                      <span></span>
                  </div>
                  <div class='inf-detail'>
                      <div class='inf-tag'>${data.info_type.name}</div>
                      <h4>${data.name}</h4>
                  </div>
                  <span>more</span>
                  <i class='fas fa-chevron-right'></i>
                </a>`;
                const monthNumber = data.created_at.split('-');
                if (monthNumber[1] === '10' || monthNumber[1] === '11' || monthNumber[1] === '12') {
                  monthArray.push(monthNumber[1]);
                } else {
                  const singleMonth = monthNumber[1].split('0');
                  monthArray.push(singleMonth[1]);
                };
                const dataNumber = monthNumber[2].split('T');
                dataArray.push(dataNumber[0]);
              };
            });

            let x = 0;
            document.querySelectorAll('.start-date').forEach(date => {
              date.textContent = dataArray[x];
              x++;
            });

            let i = 0;
            document.querySelectorAll('.inf-date > span').forEach(month => {
              month.textContent = monthData[monthArray[i] - 1];
              i++
            });
          });
      }
    };
  });
});
mutationObserver.observe(phoneDateSelect, {
  attributes: true,
  characterData: true,
  childList: true,
  subtree: true,
  attributeOldValue: true,
  characterDataOldValue: true
});

//審計地圖js
const MapStores = document.querySelectorAll('.map-bgc div');
const MapMessage = document.querySelector('.map-message');
MapStores.forEach(function (MapStore) {
  MapStore.addEventListener('mouseover', function () {

    const ShopId = this.getAttribute('value');
    const ShopStyle = this.getAttribute('data-name');
    const ShopPhone = this.getAttribute('data-phone');
    const ShopTime = this.getAttribute('data-time');
    // 先判斷是不是碰觸到背景
    if (this.getAttribute('class') == 'map-black-bgc') {

      MapMessage.style.display = 'none';
    } else {
      MapMessage.style.display = 'block';
      // 在判斷是否有登入營業資料
      if (!ShopId) {

        MapMessage.style.backgroundImage = ' url(../img/message-green.svg)';
        MapMessage.children[0].children[0].src = './img/Logo-img.png';
        MapMessage.children[0].children[1].innerHTML = '目前尚未登記';
        MapMessage.children[1].children[1].innerHTML = '敬請期待';
        MapMessage.children[2].children[1].innerHTML = '敬請期待';

      } else {

        // 最後，判斷是哪一個類型的商家
        if (ShopStyle == 'food') {
          MapMessage.style.backgroundImage = ' url(../img/message-yellow.svg)';
          MapMessage.children[0].children[0].src = './img/res-icon.svg';
          MapMessage.children[0].children[1].innerHTML = ShopId;
          MapMessage.children[1].children[1].innerHTML = ShopTime;
          MapMessage.children[2].children[1].innerHTML = ShopPhone;


        } else {
          MapMessage.style.backgroundImage = ' url(../img/message-red.svg)';
          MapMessage.children[0].children[0].src = './img/shopping-icon.svg';
          MapMessage.children[0].children[1].innerHTML = ShopId;
          MapMessage.children[1].children[1].innerHTML = ShopTime;
          MapMessage.children[2].children[1].innerHTML = ShopPhone;

        }

      }
    }

  })
})

//店家介紹-切換店家分類按鈕
const navTaps = document.querySelectorAll('.nav-tap');
const shopList = document.querySelectorAll('.shop-list');
const tapChange = document.querySelectorAll('.tap-change');
const shopPhotos = document.querySelectorAll('.figure-box figure');
const shopBtns = document.querySelectorAll('.shop-list > div > span');
const windowTitles = document.querySelectorAll('.window-title');
const checkBtnLists = document.querySelectorAll('.shop-window > ul');
navTaps.forEach(tab => {
  tab.addEventListener('click', function () {
    navNone (shopList, this);
    navNone (tapChange, this);
    windowObjectNone (windowTitles, this);
    windowObjectNone (checkBtnLists, this);
    bottomLine ();
    photoResume();
    navTaps.forEach(tab => {
      tab.classList.remove('tap-active');
    })
    this.classList.add('tap-active');
  });
});

function navNone (doms, event) {
  doms.forEach(object => {
    object.classList.add('appear-none');
    if (object.dataset.title === event.dataset.title) {
      object.classList.remove('appear-none');
    };
  });
};

function windowObjectNone (doms, event) {
  doms.forEach(object => {
    object.classList.add('appear-none');
    if (object.dataset.title === '7' && event.dataset.title === '2') {
      object.classList.remove('appear-none');
    } else if (object.dataset.title === '0' && event.dataset.title === '1') {
      object.classList.remove('appear-none');
    };
  });
};

function bottomLine () {
  shopBtns.forEach(btn => {
    btn.classList.remove('bottom-line');
    if (btn.dataset.title === '0' || btn.dataset.title === '7') {
      btn.classList.add('bottom-line');
    }
  });
};

function photoResume() {
  shopPhotos.forEach(photo => {
    photo.style.transform = `translateX(0%)`;
  });
};

//判斷傳進來的url值後切換到對應商家的分類
const getUrlString = location.href;
const newsUrl = new URL(getUrlString);
const urlType = newsUrl.searchParams.get('type');
const urlShop = newsUrl.searchParams.get('shop');
if (urlType === '2') {
  document.getElementsByClassName('nav-tap')[0].classList.remove('tap-active');
  document.getElementsByClassName('nav-tap')[1].classList.add('tap-active');
  urlTypeNavChange('shop-list');
  urlTypeNavChange('tap-change');
  urlTypeWindowObjectNone (windowTitles);
  urlTypeWindowObjectNone (checkBtnLists);
  bottomLine ();
  photoResume();
};
if(urlShop !== null){
  urlShopWindowObjectNone(windowTitles);
  urlShopWindowObjectNone(checkBtnLists);
  shopBtns.forEach(btn => {
    btn.classList.remove('bottom-line');
    if(String(urlShop - 1) === btn.dataset.title){
      btn.classList.add('bottom-line');
    };
  });
  shopPhotos.forEach(photo =>{
    urlType === '1'
      ?
      photo.style.transform = `translateX(-${(urlShop - 1) * 100}%)`
      :
      photo.style.transform = `translateX(-${(urlShop - 8) * 100}%)`;
  });
};

function urlTypeNavChange (doms) {
  document.getElementsByClassName(`${doms}`)[0].classList.add('appear-none');
  document.getElementsByClassName(`${doms}`)[1].classList.remove('appear-none');
};

function urlTypeWindowObjectNone (doms) {
  doms.forEach(object => {
    object.classList.add('appear-none');
    if (object.dataset.title === '7') {
      object.classList.remove('appear-none');
    }
  });
};

function urlShopWindowObjectNone (doms) {
  doms.forEach(title => {
    title.classList.add('appear-none');
    if (String(urlShop - 1) === title.dataset.title) {
      title.classList.remove('appear-none');
    };
  });
};

//店家介紹-點擊店家名稱切換圖片效果
shopBtns.forEach(btns => {
  btns.addEventListener('click', function () {
    btnToWindowObjectNone (windowTitles, this);
    btnToWindowObjectNone (checkBtnLists, this);
    shopBtns.forEach(btn => {
      btn.classList.remove('bottom-line');
    });
    this.classList.add('bottom-line');
    shopPhotos.forEach(photo => {
      this.parentNode.parentNode.className === 'food-shop shop-list'
        ?
        photo.style.transform = `translateX(-${this.dataset.title * 100}%)`
        :
        photo.style.transform = `translateX(-${(Number(this.dataset.title) - 7) * 100}%)`
    });
  });
});

function btnToWindowObjectNone (doms, event) {
  doms.forEach(title => {
    title.classList.add('appear-none');
    if (event.dataset.title === title.dataset.title) {
      title.classList.remove('appear-none');
    };
  });
};

//店家介紹-燈箱套件
lightbox.option({
  'resizeDuration': 500,
  'wrapAround': true,
  'disableScrolling': true,
  'positionFromTop': 100,
});

//周邊景點-swiper效果
const swiper = new Swiper('.swiper-container', {
  slidesPerView: 5,
  centeredSlides: true,
  grabCursor: true,
  spaceBetween: 150,
  speed: 500,
  loop: true,
  slideToClickedSlide: true,
  breakpoints: {
    1366: {
      slidesPerView: 5,
      spaceBetween: 150,
    },
    1024: {
      slidesPerView: 5,
      spaceBetween: 110,
    },
    768: {
      slidesPerView: 3,
      spaceBetween: 70,
    },
    540: {
      slidesPerView: 2.5,
      spaceBetween: 60,
    },
    375: {
      slidesPerView: 1.75,
      spaceBetween: 30,
    },
    320: {
      slidesPerView: 1.75,
      spaceBetween: 30,
    },
  },
  on: {
    init: function () {
    },
    transitionStart: function () {
      $('.view-card').css("background-color", " #D28E76");
      $('.swiper-slide-active .view-card').css("background-color", "#96422D");
    },
    transitionEnd: function (swiper) {
      // $('.swiper-slide-active .view-card').addClass('viewcard-active');
      // $('.swiper-slide-active .view-card').css("background-color","#96422D");
    }
  }
});

//日期選擇jquery.datepicker套件
$(function () {
  $('#datepicker').datepicker({
    changeYear: true, // 年下拉選單
    changeMonth: true, // 月下拉選單
    showButtonPanel: true, // 顯示介面
    showMonthAfterYear: true, // 月份顯示在年後面
    dateFormat: 'yy-mm-dd',
    showButtonPanel: true,
    monthNamesShort: ["1月", "2月", "3月", "4月", "5月", "6月", "7月", "8月", "9月", "10月", "11月", "12月"], // 月名中文
    prevText: '上月', // 上月按鈕
    nextText: '下月', // 下月按鈕
    currentText: "本月", // 本月按鈕
    closeText: "送出", // 送初選項按鈕
    onClose: function (dateText, inst) {
      var month = $("#ui-datepicker-div .ui-datepicker-month option:selected").val(); //得到選則的月份值
      //增加0判斷
      var parseIntok = parseInt(month) + 1;
      if (parseIntok < 10) {
        parseIn = '0' + parseIntok;
      } else {
        parseIn = parseIntok;
      }
      var year = $("#ui-datepicker-div .ui-datepicker-year option:selected").val(); //得到選則的年份值
      $('#datepicker').val(year + '-' + parseIn); //给input赋值，其中要對月值加1才是實際的月份
    }
  });
});

//聯絡審計dropdownlist
var SelectBcg = document.querySelector('.select-bcg');
var Select = document.querySelector('.form-type');
var FormStorename = document.querySelector('.form-storename').firstElementChild;
var FormProducttype = document.querySelector('.form-producttype').firstElementChild;
var FormDescription = document.querySelector('.form-description').firstElementChild;
var ChanSelect = document.querySelector('.optiontype');
function type_select(koa) {
  if (koa == '加入審計') {
    FormStorename.innerHTML = '進駐店家';
    FormProducttype.innerHTML = '商品種類';
    // 把位於form表單下面的下拉是選單清空
    FormOp.innerHTML = ``;
    ChanSelect.innerHTML =
      `<li value="進駐店家">進駐店家</li>
    <li value="退出審計">退出審計</li>
    <li value="其他狀況">其他狀況</li>`
    FormDescription.innerHTML = '詳細資訊';
  } else {
    FormStorename.innerHTML = '顧客名稱/暱稱';
    FormProducttype.innerHTML = '意見類別';
    FormOp.innerHTML = ``;
    ChanSelect.innerHTML =
      `<li value="心得回饋">心得回饋</li>
    <li value="問題抱怨">問題抱怨</li>
    <li value="其他狀況">其他狀況</li>`
    FormDescription.innerHTML = '建議內容/想對我們說';
  }
};
SelectBcg.addEventListener('click', function () {
  var listChild = document.querySelectorAll('.form-type li');
  Select.classList.toggle('active');
  for (var i = 0; i < listChild.length; i++) {
    listChild[i].addEventListener('click', function () {
      for (var j = 0; j < listChild.length; j++) {
        listChild[j].style.background = ' #D28E76';
      }
      // this.style.background = 'gray'; //给选中的li颜色变为red
      const koa = this.textContent;
      SelectBcg.innerHTML = koa;
      Select.classList.remove('active');
      type_select(koa);
    }, false)
  }
});
var FormOp = document.querySelector('.form-optiontype');
var Option = document.querySelector('.optiontype');
FormOp.addEventListener('click', function () {
  var Optionlist = document.querySelectorAll('.optiontype li');
  Option.classList.toggle('active');
  for (var i = 0; i < Optionlist.length; i++) {
    Optionlist[i].addEventListener('click', function () {
      for (var j = 0; j < Optionlist.length; j++) {
        Optionlist[j].style.background = ' #ffffff';
      }
      // this.style.background = 'gray'; //给选中的li颜色变为red
      const koala = this.textContent;
      console.log(this.value);
      FormOp.innerHTML = koala;
      Option.classList.remove('active');
    }, false)
  }
});

//回到頂端按鈕
(function () {
  $("body").append("<a href='/index#firstPage' id='goTopButton' class='fas fa-chevron-up' style='display: none; z-index: 5; cursor: pointer;' title='回到頂端'/></a>");
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

