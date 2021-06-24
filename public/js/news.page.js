const token = document.querySelector('[name="csrf-token"]').getAttribute('content');

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

//判斷傳進來的url值後切換到對應的分類
const getUrlString = location.href;
const newsUrl = new URL(getUrlString);
const urlTap = newsUrl.searchParams.get('tap');
const urlyear = newsUrl.searchParams.get('year');
const urlMonth = newsUrl.searchParams.get('month');
const monthData = ['一月', '二月', '三月', '四月', '五月', '六月', '七月', '八月', '九月', '十月', '十一月', '十二月'];
const monthEn = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
const asideTabs = document.querySelectorAll('.aside-tab');
const customSelect = document.querySelector('.btn-secondary');
const infsNone = document.querySelector('#content-infs-none');
const photoWall = document.querySelector('.feast-photo-wall');
const phoneDateSelect = document.querySelector('.phone-date-btn');
const contentInf = document.querySelectorAll('.content-inf');
const dateTitleControl = document.querySelector('.date-title-control');
const newsDate = document.querySelector('.news-date');
const thisMonthTitle = document.querySelector('#this-month-title h4');
const nextMonthTitle = document.querySelector('#next-month-title h4');
const yearsTitle = document.querySelectorAll('.years');
asideTabs.forEach(tab => {
  if (urlTap === tab.dataset.tap) {
    if (tab.dataset.tap === '1') {
      tab.classList.add('news-tab-focus');
    }
    else if (tab.dataset.tap === '2') {
      tab.classList.add('event-tab-focus');
      contentInf.forEach(inf => {
        inf.classList.add('event-content-inf');
      });
    }
    else {
      tab.classList.add('festival-tab-focus');
    };
  };
});
if (urlTap === '3') {
  customSelect.style = 'display:block';
  photoWall.style = 'display:grid';
  infsNone.style = 'display:none';
  dateTitleControl.style = 'display:none';
  newsDate.classList.add('news-data-none');
  phoneDateSelect.classList.add('phone-date-none');
  dateTitleControl.classList.add('date-title-control-none');
};
yearsTitle.forEach(title => {
  title.textContent = `,${urlyear}`;
});
if (urlMonth === '10' || urlMonth === '11' || urlMonth === '12') {
  thisMonthTitle.textContent = monthData[urlMonth - 1];
  thisMonthTitle.nextElementSibling.textContent = monthEn[urlMonth - 1];
  if (urlMonth === '12') {
    nextMonthTitle.textContent = '一月';
    nextMonthTitle.nextElementSibling.textContent = 'January';
  } else {
    nextMonthTitle.textContent = monthData[urlMonth];
    nextMonthTitle.nextElementSibling.textContent = monthEn[urlMonth - 1];
  };
} else {
  const monthNumber = urlMonth.split('0');
  thisMonthTitle.textContent = monthData[Number(monthNumber[1]) - 1];
  nextMonthTitle.textContent = monthData[Number(monthNumber[1])];
  thisMonthTitle.nextElementSibling.textContent = monthEn[Number(monthNumber[1]) - 1];
  nextMonthTitle.nextElementSibling.textContent = monthEn[Number(monthNumber[1])];
};
let temporarilyArray = [];
let temporarilyDateArray = [];
infos.forEach(info => {
  const arrayData = info.created_at.split('-');
  const arrayDuring = arrayData[2].split('T');
  temporarilyArray.push(arrayData[1]);
  temporarilyDateArray.push(arrayDuring[0]);
  let i = 0;
  document.querySelectorAll('#content-infs-now .inf-date > span').forEach(span => {
    span.textContent = monthData[Number(temporarilyArray[i]) - 1];
    i++;
  });
  let x = 0;
  document.querySelectorAll('#content-infs-now .during').forEach(during => {
    during.textContent = temporarilyDateArray[x];
    x++;
  });
});
let temporarilyNextArray = [];
let temporarilyNextDateArray = [];
nextInfos.forEach(info => {
  const arrayData = info.created_at.split('-');
  const arrayDuring = arrayData[2].split('T');
  temporarilyArray.push(arrayData[1]);
  temporarilyDateArray.push(arrayDuring[0]);
  let i = 0;
  document.querySelectorAll('#content-infs-next .inf-date > span').forEach(span => {
    span.textContent = monthData[Number(temporarilyArray[i]) - 1];
    i++;
  });
  let x = 0;
  document.querySelectorAll('#content-infs-next .during').forEach(during => {
    during.textContent = temporarilyDateArray[x];
    x++;
  });
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
  yearsList.innerHTML += `<button class="years-btn" title="${2019 + i}">${2019 + i}</button>`;
};

//審計新訊-切換選擇日期的效果
const monthBtns = document.querySelectorAll('.month-btn');
const yearsBtns = document.querySelectorAll('.years-btn');
const date = new Date();
const thisYear = String(date.getFullYear());
const thisMonth = String(date.getMonth() + 1);
focusChange(monthBtns);
focusChange(yearsBtns);

function focusChange(dateBtns) {
  dateBtns.forEach(btns => {
    if (btns.textContent === thisYear) {
      btns.classList.add('focus-change');
    }
    else if (btns.dataset.month === thisMonth) {
      btns.classList.add('focus-change');
    }
    btns.addEventListener('click', function () {
      if (this.getAttribute('class') === 'month-btn') {
        thisMonthTitle.nextElementSibling.textContent = monthEn[this.dataset.month - 1];
        this.dataset.month === '12'
          ?
          nextMonthTitle.nextElementSibling.textContent = monthEn[0]
          :
          nextMonthTitle.nextElementSibling.textContent = monthEn[this.dataset.month];
        monthChoose(this);

        const focusYear = document.querySelector('#this-month-title .years').textContent.slice(-4);
        let focusType = 0;
        asideTabs.forEach(tab => {
          if (tab.className === 'aside-tab event-tab-focus') {
            focusType = 2;
          } else if (tab.className === 'aside-tab news-tab-focus') {
            focusType = 1;
          };
        });
        const infsData = new FormData;
        infsData.append('_token', token);
        infsData.append('month', this.dataset.month);
        infsData.append('year', focusYear);
        infsData.append('infType', focusType);
        fetch('/all_news_data', {
          method: 'POST',
          body: infsData,
        })
          .then(response => response.json())
          .then(result => {
            infsInput(result, focusType);
          });
      }
      else if (this.getAttribute('class') === 'years-btn') {
        yearsTitle.forEach(title => {
          title.textContent = `,${this.textContent}`;
        });
        
        const focisMonth = monthList.getElementsByClassName('month-btn focus-change')[0].dataset.month;
        const focusYear = document.querySelector('#this-month-title .years').textContent.slice(-4);
        let focusType = 0;
        asideTabs.forEach(tab => {
          if (tab.className === 'aside-tab event-tab-focus') {
            focusType = 2;
          } else if (tab.className === 'aside-tab news-tab-focus') {
            focusType = 1;
          };
        });
        const infsData = new FormData;
        infsData.append('_token', token);
        infsData.append('month', focisMonth);
        infsData.append('year', focusYear);
        infsData.append('infType', focusType);
        fetch('/all_news_data', {
          method: 'POST',
          body: infsData,
        })
          .then(response => response.json())
          .then(result => {
            infsInput(result, focusType);
          });
      }
      dateBtns.forEach(btn => {
        btn === this
          ?
          btn.classList.add('focus-change')
          :
          btn.classList.remove('focus-change');
      });
    });
  });
}
function monthChoose(element) {
  thisMonthTitle.textContent = element.textContent;
  element.nextSibling === null
    ?
    nextMonthTitle.textContent = '一月'
    :
    nextMonthTitle.textContent = element.nextSibling.textContent;
}

//審計新訊-點擊選擇日期按鈕切換效果
const mutationObserver = new MutationObserver(function (mutations) {
  mutations.forEach(function (mutation) {
    if (phoneDateSelect.value !== '選擇日期') {
      const seleteArray = phoneDateSelect.value.split('-');
      yearsTitle[0].textContent = `,${seleteArray[0]}`;
      if (seleteArray[1] === '10' || seleteArray[1] === '11' || seleteArray[1] === '12') {
        thisMonthTitle.nextElementSibling.textContent = monthEn[seleteArray[1] - 1];
        thisMonthTitle.textContent = monthData[seleteArray[1] - 1];
      }
      else {
        const titleMonth = seleteArray[1].split('0');
        thisMonthTitle.nextElementSibling.textContent = monthEn[titleMonth[1] - 1];
        thisMonthTitle.textContent = monthData[titleMonth[1] - 1];
      }
      let focusType = 0;
      asideTabs.forEach(tab => {
        if (tab.className === 'aside-tab event-tab-focus') {
          focusType = 2;
        } else if (tab.className === 'aside-tab news-tab-focus') {
          focusType = 1;
        };
      });
      const infsData = new FormData;
      infsData.append('_token', token);
      infsData.append('month', seleteArray[1].slice(1));
      infsData.append('year', seleteArray[0]);
      infsData.append('infType', focusType);
      fetch('/all_news_data', {
        method: 'POST',
        body: infsData,
      })
        .then(response => response.json())
        .then(result => {
          infsInput(result, focusType);
        });
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

//點擊前後箭頭更換月份
let monthIndex = Number(thisMonth) - 1;
let yearsIndex = date.getFullYear();
let changeMonth = date.getMonth() + 1;
dateTitleControl.addEventListener('click', function (e) {
  monthLoop(e, 'prev', 0, 11, -1);
  monthLoop(e, 'next', 11, 0, 1);
});

function monthLoop(e, direction, startIndex, finalIndex, count) {
  if (e.target.dataset.month === `${direction}`) {
    let focusType = 0;
    asideTabs.forEach(tab => {
      if (tab.className === 'aside-tab event-tab-focus') {
        focusType = 2;
      } else if (tab.className === 'aside-tab news-tab-focus') {
        focusType = 1;
      };
    });
    if (changeMonth === 1) {
      changeMonth = 12;
    } else if (changeMonth === 12) {
      changeMonth = 1;
    };
    const year = yearsTitle[0].textContent.slice(-4);
    const infsData = new FormData;
    infsData.append('_token', token);
    infsData.append('month', changeMonth + count);
    infsData.append('year', year);
    infsData.append('infType', focusType);
    fetch('/all_news_data', {
      method: 'POST',
      body: infsData,
    })
      .then(response => {
        return response.json();
      })
      .then(result => {
        infsInput(result, focusType);
      });
    changeMonth = changeMonth + count;

    if (thisMonthTitle.textContent !== monthData[startIndex]) {
      thisMonthTitle.textContent = monthData[monthIndex + count];
      thisMonthTitle.nextElementSibling.textContent = monthEn[monthIndex + count];
      monthIndex = monthIndex + count;
    }
    else {
      thisMonthTitle.textContent = monthData[finalIndex];
      thisMonthTitle.nextElementSibling.textContent = monthEn[finalIndex];
      yearsTitle[0].textContent = `,${yearsIndex + count}`;
      yearsIndex = yearsIndex + count;
      monthIndex = finalIndex;
    };
  };
};

//news-aside-tap被點擊後的效果
const feastPhoto = document.querySelector('#feast-photo');
const feastNews = document.querySelector('#feast-news');
const contentInfsNow = document.querySelector('#content-infs-now');
const contentInfsNext = document.querySelector('#content-infs-next');
asideTabs.forEach(tabs => {
  tabs.addEventListener('click', function (tab) {
    if (tab.target === feastPhoto) {
      customSelect.style = 'display:block';
      photoWall.style = 'display:grid';
      infsNone.style = 'display:none';
      phoneDateSelect.classList.add('phone-date-none');
      dateTitleControl.style = 'display:none';
      newsDate.classList.add('news-data-none');
    } else if (tab.target === feastNews) {
      customSelect.style = "display:none";
      photoWall.style = 'display:none';
      infsNone.style = 'display:block';
      phoneDateSelect.classList.remove('phone-date-none');
      dateTitleControl.style = 'display:flex';
      newsDate.classList.remove('news-data-none');

      const focusYear = document.querySelector('#this-month-title .years').textContent.slice(-4);
      let focusMonth = 0;
      monthBtns.forEach(btn => {
        if (btn.className === 'month-btn focus-change') {
          focusMonth = btn.dataset.month;
        };
      });
      const infsData = new FormData;
      infsData.append('_token', token);
      infsData.append('month', focusMonth);
      infsData.append('year', focusYear);
      infsData.append('infType', this.dataset.tap);
      fetch('/all_news_data', {
        method: 'POST',
        body: infsData,
      })
        .then(response => response.json())
        .then(result => {
          if (result.length == 0) {
            contentInfsNow.innerHTML = '';
            contentInfsNow.innerHTML +=
              `<div class='content-inf'>
                <div class='inf-detail ml-4'>
                  <h4 style='line-height:9.25vh' class='ml-3 event-content-inf'>No Events</h4>
                </div>
              </div>`;
          } else {
            const monthArray = [];
            const dataArray = [];
            contentInfsNow.innerHTML = '';
            result.forEach(data => {
              startDate = data.date_start.replace(/[&\|\\\*^%$#@\-]/g, "");
              endDate = data.date_end.replace(/[&\|\\\*^%$#@\-]/g, "");
              contentInfsNow.innerHTML +=
                `<div class="content-inf event-content-inf" id="content-inf-${data.id}" data-anchor="${data.id}" data-toggle="collapse" data-target="#collapse${data.id}"
              aria-expanded="true" aria-controls="collapse${data.id}" title="點我展開">
                  <div class="inf-date">
                      <div class="during">
                          <div class="start-date"></div>
                      </div>
                      <span></span>
                  </div>
                  <h5>${data.name}</h5>
                  <i class="fas fa-chevron-down"></i>
              </div>
              <div class="inf-detail collapse" id="collapse${data.id}"
              aria-labelledby="heading${data.id}" data-parent="#content-infs-now">
              <span class="far fa-edit"> 活動詳情</span>
              <div class="card-body">
                  <figure style="background-image: url(${data.img});"></figure>
                  <p>${data.content}</p>
              </div>
              <div class="card-other-inf">
                  <div class="event-time">
                      <div>
                          <i class="far fa-clock"></i>
                          <div>時間</div>
                      </div>
                      <time>
                          <div>
                              <span>2021/05/03(一)</span>
                              <span>-05/14(五)</span>
                          </div>
                          <div>10:00-19:00</div>
                      </time>
                  </div>
                  <div class="event-place">
                      <div>
                          <i class="fas fa-map-marker-alt"></i>
                          <div>地點</div>
                      </div>
                      <span>${data.location}</span>
                  </div>
                  <div class="event-organizer">
                      <i class="fas fa-suitcase"></i>
                      <span>主辦單位</span>
                      <span class="ml-sm-1">${data.organizer}</span>
                  </div>
                  <div class="event-calendar">
                      <a target="_blank"
                          href="http://www.google.com/calendar/event?action=TEMPLATE&text=${data.name}&dates=${startDate}/${endDate}&details=${data.content}&location=${data.location}&trp=false"
                          title="加入google日曆">
                          <i class="far fa-calendar-minus"></i>
                          <div>加入google日曆</div>
                      </a>
                  </div>
              </div>
              </div>`;
              const monthNumber = data.created_at.split('-');
              if (monthNumber[1] === '10' || monthNumber[1] === '11' || monthNumber[1] === '12') {
                monthArray.push(monthNumber[1]);
              } else {
                const singleMonth = monthNumber[1].split('0');
                monthArray.push(singleMonth[1]);
              };
              const dataNumber = monthNumber[2].split('T');
              dataArray.push(dataNumber[0]);
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
          };
        });
    } else {
      customSelect.style = "display:none";
      photoWall.style = 'display:none';
      infsNone.style = 'display:block';
      phoneDateSelect.classList.remove('phone-date-none');
      dateTitleControl.style = 'display:flex';
      newsDate.classList.remove('news-data-none');

      const focusYear = document.querySelector('#this-month-title .years').textContent.slice(-4);
      let focusMonth = 0;
      monthBtns.forEach(btn => {
        if (btn.className === 'month-btn focus-change') {
          focusMonth = btn.dataset.month;
        };
      });
      const infsData = new FormData;
      infsData.append('_token', token);
      infsData.append('month', focusMonth);
      infsData.append('year', focusYear);
      infsData.append('infType', this.dataset.tap);
      fetch('/all_news_data', {
        method: 'POST',
        body: infsData,
      })
        .then(response => response.json())
        .then(result => {
          if (result.length == 0) {
            contentInfsNow.innerHTML = '';
            contentInfsNow.innerHTML +=
              `<div class='content-inf'>
            <div class='inf-detail ml-4'>
              <h4 style='line-height:9.25vh' class='ml-3'>No Events</h4>
            </div>
          </div>`;
          } else {
            const monthArray = [];
            const dataArray = [];
            contentInfsNow.innerHTML = '';
            result.forEach(data => {
              startDate = data.date_start.replace(/[&\|\\\*^%$#@\-]/g, "");
              endDate = data.date_end.replace(/[&\|\\\*^%$#@\-]/g, "");
              contentInfsNow.innerHTML +=
                `<div class="content-inf" id="content-inf-${data.id}" data-anchor="${data.id}" data-toggle="collapse" data-target="#collapse${data.id}"
              aria-expanded="true" aria-controls="collapse${data.id}" title="點我展開">
                  <div class="inf-date">
                      <div class="during">
                          <div class="start-date"></div>
                      </div>
                      <span></span>
                  </div>
                  <h5>${data.name}</h5>
                  <i class="fas fa-chevron-down"></i>
              </div>
              <div class="inf-detail collapse" id="collapse${data.id}"
              aria-labelledby="heading${data.id}" data-parent="#content-infs-now">
              <span class="far fa-edit"> 活動詳情</span>
              <div class="card-body">
                  <figure style="background-image: url(${data.img});"></figure>
                  <p>${data.content}</p>
              </div>
              <div class="card-other-inf">
                  <div class="event-time">
                      <div>
                          <i class="far fa-clock"></i>
                          <div>時間</div>
                      </div>
                      <time>
                          <div>
                              <span>2021/05/03(一)</span>
                              <span>-05/14(五)</span>
                          </div>
                          <div>10:00-19:00</div>
                      </time>
                  </div>
                  <div class="event-place">
                      <div>
                          <i class="fas fa-map-marker-alt"></i>
                          <div>地點</div>
                      </div>
                      <span>${data.location}</span>
                  </div>
                  <div class="event-organizer">
                      <i class="fas fa-suitcase"></i>
                      <span>主辦單位</span>
                      <span class="ml-sm-1">${data.organizer}</span>
                  </div>
                  <div class="event-calendar">
                      <a target="_blank"
                          href="http://www.google.com/calendar/event?action=TEMPLATE&text=${data.name}&dates=${startDate}/${endDate}&details=${data.content}&location=${data.location}&trp=false"
                          title="加入google日曆">
                          <i class="far fa-calendar-minus"></i>
                          <div>加入google日曆</div>
                      </a>
                  </div>
              </div>
              </div>`;
              const monthNumber = data.created_at.split('-');
              if (monthNumber[1] === '10' || monthNumber[1] === '11' || monthNumber[1] === '12') {
                monthArray.push(monthNumber[1]);
              } else {
                const singleMonth = monthNumber[1].split('0');
                monthArray.push(singleMonth[1]);
              };
              const dataNumber = monthNumber[2].split('T');
              dataArray.push(dataNumber[0]);
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
          };
        });
    }
    asideTabs.forEach(tab => {
      tab.classList.remove('news-tab-focus', 'event-tab-focus', 'festival-tab-focus');
      if (this === tab) {
        if (tab.dataset.tap === '1') {
          dateTitleControl.classList.remove('date-title-control-none');
          tab.classList.add('news-tab-focus');
          contentInf.forEach(inf => {
            inf.classList.remove('event-content-inf');
          });
        }
        else if (tab.dataset.tap === '2') {
          dateTitleControl.classList.remove('date-title-control-none');
          tab.classList.add('event-tab-focus');
        }
        else {
          dateTitleControl.classList.add('date-title-control-none');
          tab.classList.add('festival-tab-focus');
        };
      };
    });
  });
});

//下拉式選單切換不同日期活動
document.querySelector('.dropdown-menu').addEventListener('click', function (e) {
  document.querySelector('.btn-secondary').textContent = e.target.textContent;
  const infsData = new FormData;
  infsData.append('_token', token);
  infsData.append('id', e.target.dataset.market);
  fetch('/feast_photo', {
    method: 'POST',
    body: infsData,
  })
    .then(response => response.json())
    .then(result => {
      if (result.length > 1) {
        result.forEach(photo => {
          photoWall.innerHTML +=
            `<a href="${photo.img}" data-lightbox="${photo.info_id}" data-title="${photo.name}">
          <figure style="background-image: url(${photo.img});">
              <div class="figure-hover-appear">${photo.name}</div>
          </figure>
          </a>`
        });
      } else {
        photoWall.innerHTML = '';
        result.info_imgs.forEach(photo => {
          photoWall.innerHTML +=
            `<a href="${photo.img}" data-lightbox="${photo.info_id}" data-title="${photo.name}">
          <figure style="background-image: url(${photo.img});">
              <div class="figure-hover-appear">${photo.name}</div>
          </figure>
          </a>`
        });
      };
    });
})

//活動資訊點擊後click變色效果
const NowInfs = document.querySelectorAll('#content-infs-now .content-inf');
const NextInfs = document.querySelectorAll('#content-infs-next .content-inf');
const iconsNow = document.querySelectorAll('#content-infs-now .content-inf i');
const iconsNext = document.querySelectorAll('#content-infs-next .content-inf i');
infsFocusStyle(NowInfs, iconsNow);
infsFocusStyle(NextInfs, iconsNext);

function infsFocusStyle(infsName, iconsName) {
  infsName.forEach(infs => {
    infs.addEventListener('click', function () {
      infsName.forEach(inf => {
        inf === this
          ?
          inf.classList.toggle('inf-focus')
          :
          inf.classList.remove('inf-focus');
      });
      iconsName.forEach(icon => {
        icon === this.querySelector('i')
          ?
          this.querySelector('i').classList.toggle('fa-chevron-up')
          :
          icon.classList.remove('fa-chevron-up');
      });
    });
  });
}

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

//燈箱套件
lightbox.option({
  'resizeDuration': 500,
  'wrapAround': true,
  'disableScrolling': true,
  'positionFromTop': 100,
});

//讓資訊展開時回到正中間
// NowInfs.forEach(inf => {
//   inf.addEventListener('click', function () {
//     const infId = this.dataset.anchor;
//     location.href = `/news#content-inf-${infId}`;
//   });
// });

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

//fetch後放入資料的函數
function infsInput(result, focusType) {
  if (result.length == 0) {
    contentInfsNow.innerHTML = '';
    contentInfsNow.innerHTML +=
      `<div class='content-inf'>
    <div class='inf-detail ml-4'>
      <h4 style='line-height:9.25vh' class='ml-3 ${focusType === 2 ? 'event-content-inf' : ''}'>No Events</h4>
    </div>
  </div>`;
  } else {
    const monthArray = [];
    const dataArray = [];
    contentInfsNow.innerHTML = '';
    result.forEach(data => {
      startDate = data.date_start.replace(/[&\|\\\*^%$#@\-]/g, "");
      endDate = data.date_end.replace(/[&\|\\\*^%$#@\-]/g, "");
      contentInfsNow.innerHTML +=
        `<div class="content-inf ${focusType === 2 ? 'event-content-inf' : ''}" id="content-inf-${data.id}" data-anchor="${data.id}" data-toggle="collapse" data-target="#collapse${data.id}"
    aria-expanded="true" aria-controls="collapse${data.id}" title="點我展開">
        <div class="inf-date">
            <div class="during">
                <div class="start-date"></div>
            </div>
            <span></span>
        </div>
        <h5>${data.name}</h5>
        <i class="fas fa-chevron-down"></i>
    </div>
    <div class="inf-detail collapse" id="collapse${data.id}"
    aria-labelledby="heading${data.id}" data-parent="#content-infs-now">
    <span class="far fa-edit"> 活動詳情</span>
    <div class="card-body">
        <figure style="background-image: url(${data.img});"></figure>
        <p>${data.content}</p>
    </div>
    <div class="card-other-inf">
        <div class="event-time">
            <div>
                <i class="far fa-clock"></i>
                <div>時間</div>
            </div>
            <time>
                <div>
                    <span>2021/05/03(一)</span>
                    <span>-05/14(五)</span>
                </div>
                <div>10:00-19:00</div>
            </time>
        </div>
        <div class="event-place">
            <div>
                <i class="fas fa-map-marker-alt"></i>
                <div>地點</div>
            </div>
            <span>${data.location}</span>
        </div>
        <div class="event-organizer">
            <i class="fas fa-suitcase"></i>
            <span>主辦單位</span>
            <span class="ml-sm-1">${data.organizer}</span>
        </div>
        <div class="event-calendar">
            <a target="_blank"
                href="http://www.google.com/calendar/event?action=TEMPLATE&text=${data.name}&dates=${startDate}/${endDate}&details=${data.content}&location=${data.location}&trp=false"
                title="加入google日曆">
                <i class="far fa-calendar-minus"></i>
                <div>加入google日曆</div>
            </a>
        </div>
    </div>
    </div>`;
      const monthNumber = data.created_at.split('-');
      if (monthNumber[1] === '10' || monthNumber[1] === '11' || monthNumber[1] === '12') {
        monthArray.push(monthNumber[1]);
      } else {
        const singleMonth = monthNumber[1].split('0');
        monthArray.push(singleMonth[1]);
      };
      const dataNumber = monthNumber[2].split('T');
      dataArray.push(dataNumber[0]);
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
  };
};