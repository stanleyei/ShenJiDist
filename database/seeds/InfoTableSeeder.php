<?php

use App\Info;
use Illuminate\Database\Seeder;
use Carbon\Carbon;

class InfoTableSeeder extends Seeder
{
    /**
     * type_id
     * 1 => 活動花絮
     * 2 => 審計公告
     * 3 => 最新消息
     */
    public function run()
    {
        Info::insert([
            [
                'type_id' => '1',
                'name' => '村長公告-園區停電',
                'content' => '據說在110年01月20日（三）
                將會有很黑暗的一面
                聽我說聽我說
                莫慌莫急莫害怕
                ..
                ...
                原來是園區停電啦
                但不要緊
                「因為店家是不會因此休息的」
                前來散步逛街拍照的你我他還是可以往店家去嚇店員呦
                #真的只是黑了點但照常營業                
                ',
                'img' => '/img/news/01-Shen-Ji-announcement/Shen-Ji-announcement-photoes/January-01.jpg',
                'date_start' => Carbon::parse('2021-01-20 13:00:00')->toDateTimeString(),
                'date_end' => Carbon::parse('2021-01-20 15:00:00')->toDateTimeString(),
                'location' => '台中市西區民生路368巷',
                'organizer' => '審計新村',
                'calendar' => '活動花絮的資訊之一日曆',
                'created_at' => Carbon::parse('2021-01-15 10:00:00')->toDateTimeString(),
                'updated_at' => Carbon::parse('2021-01-15 10:00:00')->toDateTimeString(),
            ],
            [
                'type_id' => '1',
                'name' => '村長公告-園區停水，部分店家公休',
                'content' => '給水廠說明天不給水
                村長必須封印公共廁所了
                
                「請別攻打我的村莊」
                
                審計部分店家店休呦
                但是
                真的只有部分，所以還是要來哦~    
                ',
                'img' => '/img/news/01-Shen-Ji-announcement/Shen-Ji-announcement-photoes/January-02.jpg',
                'date_start' => Carbon::parse('2021-01-26 09:00:00')->toDateTimeString(),
                'date_end' => Carbon::parse('2021-01-26 16:00:00')->toDateTimeString(),
                'location' => '台中市西區民生路368巷',
                'organizer' => '審計新村',
                'calendar' => '活動花絮的資訊之一日曆',
                'created_at' => Carbon::parse('2021-01-25 10:00:00')->toDateTimeString(),
                'updated_at' => Carbon::parse('2021-01-25 10:00:00')->toDateTimeString(),
            ],
            [
                'type_id' => '1',
                'name' => '除夕園區公休',
                'content' => '除夕02/11園區公休
                部分店家營業
                kerkerland-營業至下午4點
                俐落理髮-營業至下午3點
                日日鬆餅-營業至下午6點
                Clayway銀黏土-營業至下午6點
                ',
                'img' => '/img/news/01-Shen-Ji-announcement/Shen-Ji-announcement-photoes/February-01.jpg',
                'date_start' => Carbon::parse('2021-02-11 10:00:00')->toDateTimeString(),
                'date_end' => Carbon::parse('2021-02-11 19:00:00')->toDateTimeString(),
                'location' => '台中市西區民生路368巷',
                'organizer' => '審計新村',
                'calendar' => '活動花絮的資訊之一日曆',
                'created_at' => Carbon::parse('2021-02-08 10:00:00')->toDateTimeString(),
                'updated_at' => Carbon::parse('2021-02-08 10:00:00')->toDateTimeString(),
            ],
            [
                'type_id' => '1',
                'name' => '緊急通知-園區公廁暫時無水源供應',
                'content' => '🥺村長，我被芒果打到還吃掉了想洗手‼️
                宣布一件很傷心的事
                公共廁所在昨天中午開始鬧脾氣停水
                水電叔叔跟村長找問題一整天
                今天依舊鬧脾氣
                先跟前來園區逛街以及市集人員緊急通知
                ⚠️「這幾天公廁不開放」⚠️
                將會持續與相關單位處理請多包涵🙏🏻
                ',
                'img' => '/img/news/01-Shen-Ji-announcement/Shen-Ji-announcement-photoes/May-01.jpg',
                'date_start' => Carbon::parse('2021-05-08 10:00:00')->toDateTimeString(),
                'date_end' => Carbon::parse('2021-05-17 19:00:00')->toDateTimeString(),
                'location' => '台中市西區民生路368巷',
                'organizer' => '審計新村',
                'calendar' => '活動花絮的資訊之一日曆',
                'created_at' => Carbon::parse('2021-05-05 10:00:00')->toDateTimeString(),
                'updated_at' => Carbon::parse('2021-05-05 10:00:00')->toDateTimeString(),
            ],
            [
                'type_id' => '1',
                'name' => '村長公告-藝行@香港2021版_藝文書刊歡迎索取',
                'content' => '以「香港綠色生活、山林郊野」為主軸的📚藝行@香港2021版裡頭有實踐環保的行動家、有機農場、生態保育園區等，跟著書本探索香港及自然環境背後的不為人知小故事‼️
                審計管理室有幾本藝文書刊都能索取！有興趣歡迎索取唷😆
                ',
                'img' => '/img/news/01-Shen-Ji-announcement/Shen-Ji-announcement-photoes/May-02.jpg',
                'date_start' => Carbon::parse('2021-05-11 10:00:00')->toDateTimeString(),
                'date_end' => Carbon::parse('2021-06-11 19:00:00')->toDateTimeString(),
                'location' => '台中市西區民生路368巷',
                'organizer' => '審計新村',
                'calendar' => '活動花絮的資訊之一日曆',
                'created_at' => Carbon::parse('2021-05-11 10:00:00')->toDateTimeString(),
                'updated_at' => Carbon::parse('2021-05-11 10:00:00')->toDateTimeString(),
            ],
            [
                'type_id' => '1',
                'name' => '村長公告-防疫重要通知',
                'content' => '⚠️緊急‼️緊急報報⚠️
                ✏️請務必配合入園實名制登記
                ✏️全程配戴口罩😷飲食完畢也是呦
                台灣的安全由每個人都能落實及誠實！
                村長㊗️平安
                ',
                'img' => '/img/news/01-Shen-Ji-announcement/Shen-Ji-announcement-photoes/May-03.jpg',
                'date_start' => Carbon::parse('2021-05-13 10:00:00')->toDateTimeString(),
                'date_end' => Carbon::parse('2021-06-28 19:00:00')->toDateTimeString(),
                'location' => '台中市西區民生路368巷',
                'organizer' => '審計新村',
                'calendar' => '活動花絮的資訊之一日曆',
                'created_at' => Carbon::parse('2021-05-13 10:00:00')->toDateTimeString(),
                'updated_at' => Carbon::parse('2021-05-13 10:00:00')->toDateTimeString(),
            ],
            [
                'type_id' => '1',
                'name' => '村長廣播-相關資訊引導',
                'content' => '叮叮叮重要資訊照過來
                「審計園區」一直都是開放的
                不需門票！沒有限制進入時間！
                「審計園區內店家」
                各個店家營業時間及休息日不同
                但大部分11AM就啟動啦
                ',
                'img' => '/img/news/01-Shen-Ji-announcement/Shen-Ji-announcement-photoes/July-01.jpg',
                'date_start' => Carbon::parse('2021-07-10 10:00:00')->toDateTimeString(),
                'date_end' => Carbon::parse('2021-07-10 19:00:00')->toDateTimeString(),
                'location' => '台中市西區民生路368巷',
                'organizer' => '審計新村',
                'calendar' => '活動花絮的資訊之一日曆',
                'created_at' => Carbon::parse('2021-07-10 10:00:00')->toDateTimeString(),
                'updated_at' => Carbon::parse('2021-07-10 10:00:00')->toDateTimeString(),
            ],
            [
                'type_id' => '1',
                'name' => '村長公告-園區進行消毒',
                'content' => '為了保障遊客的安全
                審計新村將於9/16-18進行園區消毒
                一同守護你我的健康
                ',
                'img' => '/img/news/01-Shen-Ji-announcement/Shen-Ji-announcement-photoes/September-01.jpg',
                'date_start' => Carbon::parse('2021-09-16 16:00:00')->toDateTimeString(),
                'date_end' => Carbon::parse('2021-09-18 17:00:00')->toDateTimeString(),
                'location' => '台中市西區民生路368巷',
                'organizer' => '審計新村',
                'calendar' => '活動花絮的資訊之一日曆',
                'created_at' => Carbon::parse('2021-09-15 10:00:00')->toDateTimeString(),
                'updated_at' => Carbon::parse('2021-09-15 10:00:00')->toDateTimeString(),
            ],
            [
                'type_id' => '1',
                'name' => '11/30 審計園區休息一天',
                'content' => '審計村長報告
                110.11.30（一）
                『審計園區休息一天』
                『暮暮市集休市一天』
                ',
                'img' => '/img/news/01-Shen-Ji-announcement/Shen-Ji-announcement-photoes/November-01.jpg',
                'date_start' => Carbon::parse('2021-11-30 10:00:00')->toDateTimeString(),
                'date_end' => Carbon::parse('2021-11-30 19:00:00')->toDateTimeString(),
                'location' => '台中市西區民生路368巷',
                'organizer' => '審計新村',
                'calendar' => '活動花絮的資訊之一日曆',
                'created_at' => Carbon::parse('2021-11-05 10:00:00')->toDateTimeString(),
                'updated_at' => Carbon::parse('2021-11-05 10:00:00')->toDateTimeString(),
            ],
            [
                'type_id' => '2',
                'name' => '小蝸牛市集出攤囉',
                'content' => '出攤名單：
                ［植栽 / 木作類］
                深白曙光工房
                Lady Is Gaga 手木系
                古夜天工坊
                Tadpole Teak 得寶老柚木
                ',
                'img' => '/img/news/02-event/jan-01.jpg',
                'date_start' => Carbon::parse('2021-01-20 10:00:00')->toDateTimeString(),
                'date_end' => Carbon::parse('2021-01-31 19:00:00')->toDateTimeString(),
                'location' => '台中市西區民生路368巷',
                'organizer' => '審計新村',
                'calendar' => '活動花絮的資訊之一日曆',
                'created_at' => Carbon::parse('2021-01-18 10:00:00')->toDateTimeString(),
                'updated_at' => Carbon::parse('2021-01-18 10:00:00')->toDateTimeString(),
            ],
            [
                'type_id' => '2',
                'name' => '暮暮市集出攤公告！',
                'content' => '出攤名單：
                [ 平面設計 / 手繪類 ]
                #Drifting In Life
                #小田月所
                翻滾酪梨 Rolin is rolling
                鳥人鳥事多
                ',
                'img' => '/img/news/02-event/feb-01.jpg',
                'date_start' => Carbon::parse('2021-02-10 10:00:00')->toDateTimeString(),
                'date_end' => Carbon::parse('2021-02-18 19:00:00')->toDateTimeString(),
                'location' => '台中市西區民生路368巷',
                'organizer' => '審計新村',
                'calendar' => '活動花絮的資訊之一日曆',
                'created_at' => Carbon::parse('2021-02-05 10:00:00')->toDateTimeString(),
                'updated_at' => Carbon::parse('2021-02-05 10:00:00')->toDateTimeString(),
            ],
            [
                'type_id' => '2',
                'name' => '寧夏市集出攤通知',
                'content' => '市集日常
                藍天白雲的好天氣，來審計過生活！
                讓市集成為生活的一部分🧚‍♀️
                ',
                'img' => '/img/news/02-event/feb-02.jpg',
                'date_start' => Carbon::parse('2021-02-18 10:00:00')->toDateTimeString(),
                'date_end' => Carbon::parse('2021-02-28 19:00:00')->toDateTimeString(),
                'location' => '台中市西區民生路368巷',
                'organizer' => '審計新村',
                'calendar' => '活動花絮的資訊之一日曆',
                'created_at' => Carbon::parse('2021-02-16 10:00:00')->toDateTimeString(),
                'updated_at' => Carbon::parse('2021-02-16 10:00:00')->toDateTimeString(),
            ],
            [
                'type_id' => '2',
                'name' => '散策市集出攤公告',
                'content' => '出攤名單：
                喜喜茶室
                古早味木桶麻油雞腿油飯
                所宅食驗室
                幸福白糖粿
                鯨品殿 秋崗冰淇淋
                藤山有喜 YoShi 手作點心坊
                勝吉水產－膠原蛋白凍
                亭一下買包子饅頭
                好好吃 ∞ 手作
                蛋白工坊
                樂肯皮飾
                仨倆手作浴鹽球
                雨誌
                Gai aa lobi 麻辣滷味                
                ',
                'img' => '/img/news/02-event/mar-01.jpg',
                'date_start' => Carbon::parse('2021-04-10 10:00:00')->toDateTimeString(),
                'date_end' => Carbon::parse('2021-04-18 19:00:00')->toDateTimeString(),
                'location' => '台中市西區民生路368巷',
                'organizer' => '審計新村',
                'calendar' => '活動花絮的資訊之一日曆',
                'created_at' => Carbon::parse('2021-04-05 10:00:00')->toDateTimeString(),
                'updated_at' => Carbon::parse('2021-04-05 10:00:00')->toDateTimeString(),
            ],
            [
                'type_id' => '2',
                'name' => '暮暮市集出攤囉',
                'content' => '＝優質攤商＝
                ・交心食堂
                ・慢漫炙果
                ・老件選物店
                ・木之曲線
                ・SUNDAY FISH
                ・可愛手作髮飾
                ・Maybee 手作
                ・可可看世界                
                ',
                'img' => '/img/news/02-event/may-01.jpg',
                'date_start' => Carbon::parse('2021-05-07 10:00:00')->toDateTimeString(),
                'date_end' => Carbon::parse('2021-05-15 19:00:00')->toDateTimeString(),
                'location' => '台中市西區民生路368巷',
                'organizer' => '審計新村',
                'calendar' => '活動花絮的資訊之一日曆',
                'created_at' => Carbon::parse('2021-05-03 10:00:00')->toDateTimeString(),
                'updated_at' => Carbon::parse('2021-05-03 10:00:00')->toDateTimeString(),
            ],
            [
                'type_id' => '2',
                'name' => '微涼市集攤商店家公告',
                'content' => '＝優質攤商＝
                ・交心食堂
                ・慢漫炙果
                ・老件選物店
                ・菓子多元廚藝烘培社
                ・Sunny魚手創工作坊
                ・可可看世界                
                ',
                'img' => '/img/news/02-event/may-02.jpg',
                'date_start' => Carbon::parse('2021-05-13 10:00:00')->toDateTimeString(),
                'date_end' => Carbon::parse('2021-05-22 19:00:00')->toDateTimeString(),
                'location' => '台中市西區民生路368巷',
                'organizer' => '審計新村',
                'calendar' => '活動花絮的資訊之一日曆',
                'created_at' => Carbon::parse('2021-05-11 10:00:00')->toDateTimeString(),
                'updated_at' => Carbon::parse('2021-05-11 10:00:00')->toDateTimeString(),
            ],
            [
                'type_id' => '2',
                'name' => '小蝸牛市集攤商名單',
                'content' => '＝小老闆攤商＝
                ・洪昱捷
                ・吵超級種子
                ・史萊姆兼跳蚤市場
                ・Mandy捧油一起玩
                ・BULE
                ・愛心小舖                                
                ',
                'img' => '/img/news/02-event/may-03.jpg',
                'date_start' => Carbon::parse('2021-05-17 10:00:00')->toDateTimeString(),
                'date_end' => Carbon::parse('2021-05-28 19:00:00')->toDateTimeString(),
                'location' => '台中市西區民生路368巷',
                'organizer' => '審計新村',
                'calendar' => '活動花絮的資訊之一日曆',
                'created_at' => Carbon::parse('2021-05-16 10:00:00')->toDateTimeString(),
                'updated_at' => Carbon::parse('2021-05-16 10:00:00')->toDateTimeString(),
            ],
            [
                'type_id' => '2',
                'name' => '暮暮市集出攤囉',
                'content' => '攤販名單：
                在福岡的越境芸術人（陣)
                Aura Gallery Taipei 亦安畫廊台北
                Houth 
                田園城市生活風格書店
                Mangasick
                瑪蒂雅 Multi-Arts
                童里繪本洋行 Maison Temps-Rêves
                朝寝坊屋
                亞典書店
                朋 丁 pon ding      
                ',
                'img' => '/img/news/02-event/jul-01.jpg',
                'date_start' => Carbon::parse('2021-07-08 10:00:00')->toDateTimeString(),
                'date_end' => Carbon::parse('2021-07-15 19:00:00')->toDateTimeString(),
                'location' => '台中市西區民生路368巷',
                'organizer' => '審計新村',
                'calendar' => '活動花絮的資訊之一日曆',
                'created_at' => Carbon::parse('2021-07-05 10:00:00')->toDateTimeString(),
                'updated_at' => Carbon::parse('2021-07-05 10:00:00')->toDateTimeString(),
            ],
            [
                'type_id' => '2',
                'name' => '草地市集攤販名單公告',
                'content' => '市集攤販名單：
                柯基沒有尾巴
                一起撐傘
                Alices crazy snack 愛麗絲的瘋狂甜點
                Flash hybrids
                羅絲琴 Rose-Jin           
                ',
                'img' => '/img/news/02-event/sep-01.jpg',
                'date_start' => Carbon::parse('2021-09-08 10:00:00')->toDateTimeString(),
                'date_end' => Carbon::parse('2021-09-13 19:00:00')->toDateTimeString(),
                'location' => '台中市西區民生路368巷',
                'organizer' => '審計新村',
                'calendar' => '活動花絮的資訊之一日曆',
                'created_at' => Carbon::parse('2021-09-03 10:00:00')->toDateTimeString(),
                'updated_at' => Carbon::parse('2021-09-03 10:00:00')->toDateTimeString(),
            ],
            [
                'type_id' => '2',
                'name' => '微風市集',
                'content' => '出攤名單：
                胖奇熱狗堡 Punch Hotdog
                黛上甜食
                Monster Plus -古巴三明治
                12拾壹Drinks
                戀楓義式窯烤披薩
                雅樂廚苑
                蘼樂餐酒                                
                ',
                'img' => '/img/news/02-event/oct-01.jpg',
                'date_start' => Carbon::parse('2021-10-08 10:00:00')->toDateTimeString(),
                'date_end' => Carbon::parse('2021-10-15 19:00:00')->toDateTimeString(),
                'location' => '台中市西區民生路368巷',
                'organizer' => '審計新村',
                'calendar' => '活動花絮的資訊之一日曆',
                'created_at' => Carbon::parse('2021-10-03 10:00:00')->toDateTimeString(),
                'updated_at' => Carbon::parse('2021-10-03 10:00:00')->toDateTimeString(),
            ],
            [
                'type_id' => '3',
                'name' => '暮暮市集活動花絮',
                'content' => '活動花絮的資訊之一內容',
                'img' => 'https://memes.tw/user-template/a03333632536be8fe3c13c453f5bcb31.png',
                'date_start' => Carbon::parse('2021-5-15')->toDateTimeString(),
                'date_end' => Carbon::parse('2021-10-15')->toDateTimeString(),
                'location' => '活動花絮的資訊之一地點',
                'organizer' => '活動花絮的資訊之一擁有者',
                'calendar' => '活動花絮的資訊之一日曆',
                'created_at' => now()->toDateString(),
                'updated_at' => now()->toDateString(),
            ],
            [
                'type_id' => '1',
                'name' => '村長廣播-相關資訊引導',
                'content' => '叮叮叮重要資訊照過來
                「審計園區」一直都是開放的
                不需門票！沒有限制進入時間！
                「審計園區內店家」
                各個店家營業時間及休息日不同
                但大部分11AM就啟動啦
                ',
                'img' => '/img/news/01-Shen-Ji-announcement/Shen-Ji-announcement-photoes/July-01.jpg',
                'date_start' => Carbon::parse('2021-06-10 10:00:00')->toDateTimeString(),
                'date_end' => Carbon::parse('2021-06-10 19:00:00')->toDateTimeString(),
                'location' => '台中市西區民生路368巷',
                'organizer' => '審計新村',
                'calendar' => '活動花絮的資訊之一日曆',
                'created_at' => Carbon::parse('2021-06-10 10:00:00')->toDateTimeString(),
                'updated_at' => Carbon::parse('2021-06-10 10:00:00')->toDateTimeString(),
            ],
            [
                'type_id' => '1',
                'name' => '村長公告-藝行@香港2021版_藝文書刊歡迎索取',
                'content' => '以「香港綠色生活、山林郊野」為主軸的📚藝行@香港2021版裡頭有實踐環保的行動家、有機農場、生態保育園區等，跟著書本探索香港及自然環境背後的不為人知小故事‼️
                審計管理室有幾本藝文書刊都能索取！有興趣歡迎索取唷😆
                ',
                'img' => '/img/news/01-Shen-Ji-announcement/Shen-Ji-announcement-photoes/May-02.jpg',
                'date_start' => Carbon::parse('2021-03-11 10:00:00')->toDateTimeString(),
                'date_end' => Carbon::parse('2021-04-11 19:00:00')->toDateTimeString(),
                'location' => '台中市西區民生路368巷',
                'organizer' => '審計新村',
                'calendar' => '活動花絮的資訊之一日曆',
                'created_at' => Carbon::parse('2021-03-11 10:00:00')->toDateTimeString(),
                'updated_at' => Carbon::parse('2021-03-11 10:00:00')->toDateTimeString(),
            ],
            [
                'type_id' => '1',
                'name' => '村長公告-藝行@香港2021版_藝文書刊歡迎索取',
                'content' => '以「香港綠色生活、山林郊野」為主軸的📚藝行@香港2021版裡頭有實踐環保的行動家、有機農場、生態保育園區等，跟著書本探索香港及自然環境背後的不為人知小故事‼️
                審計管理室有幾本藝文書刊都能索取！有興趣歡迎索取唷😆
                ',
                'img' => '/img/news/01-Shen-Ji-announcement/Shen-Ji-announcement-photoes/May-02.jpg',
                'date_start' => Carbon::parse('2021-04-11 10:00:00')->toDateTimeString(),
                'date_end' => Carbon::parse('2021-05-11 19:00:00')->toDateTimeString(),
                'location' => '台中市西區民生路368巷',
                'organizer' => '審計新村',
                'calendar' => '活動花絮的資訊之一日曆',
                'created_at' => Carbon::parse('2021-04-11 10:00:00')->toDateTimeString(),
                'updated_at' => Carbon::parse('2021-04-11 10:00:00')->toDateTimeString(),
            ],
            [
                'type_id' => '1',
                'name' => '村長公告-藝行@香港2021版_藝文書刊歡迎索取',
                'content' => '以「香港綠色生活、山林郊野」為主軸的📚藝行@香港2021版裡頭有實踐環保的行動家、有機農場、生態保育園區等，跟著書本探索香港及自然環境背後的不為人知小故事‼️
                審計管理室有幾本藝文書刊都能索取！有興趣歡迎索取唷😆
                ',
                'img' => '/img/news/01-Shen-Ji-announcement/Shen-Ji-announcement-photoes/May-02.jpg',
                'date_start' => Carbon::parse('2021-06-11 10:00:00')->toDateTimeString(),
                'date_end' => Carbon::parse('2021-07-11 19:00:00')->toDateTimeString(),
                'location' => '台中市西區民生路368巷',
                'organizer' => '審計新村',
                'calendar' => '活動花絮的資訊之一日曆',
                'created_at' => Carbon::parse('2021-06-11 10:00:00')->toDateTimeString(),
                'updated_at' => Carbon::parse('2021-06-11 10:00:00')->toDateTimeString(),
            ],
            [
                'type_id' => '3',
                'name' => '微涼市集活動花絮',
                'content' => '活動花絮的資訊之一內容',
                'img' => 'https://memes.tw/user-template/a03333632536be8fe3c13c453f5bcb31.png',
                'date_start' => Carbon::parse('2021-6-15')->toDateTimeString(),
                'date_end' => Carbon::parse('2021-10-15')->toDateTimeString(),
                'location' => '活動花絮的資訊之一地點',
                'organizer' => '活動花絮的資訊之一擁有者',
                'calendar' => '活動花絮的資訊之一日曆',
                'created_at' => now()->toDateString(),
                'updated_at' => now()->toDateString(),
            ],
            [
                'type_id' => '3',
                'name' => '小蝸牛市集活動花絮',
                'content' => '活動花絮的資訊之一內容',
                'img' => 'https://memes.tw/user-template/a03333632536be8fe3c13c453f5bcb31.png',
                'date_start' => Carbon::parse('2021-4-15')->toDateTimeString(),
                'date_end' => Carbon::parse('2021-10-15')->toDateTimeString(),
                'location' => '活動花絮的資訊之一地點',
                'organizer' => '活動花絮的資訊之一擁有者',
                'calendar' => '活動花絮的資訊之一日曆',
                'created_at' => now()->toDateString(),
                'updated_at' => now()->toDateString(),
            ],
            [
                'type_id' => '2',
                'name' => '草地市集攤販名單公告',
                'content' => '市集攤販名單：
                柯基沒有尾巴
                一起撐傘
                Alices crazy snack 愛麗絲的瘋狂甜點
                Flash hybrids
                羅絲琴 Rose-Jin           
                ',
                'img' => '/img/news/02-event/sep-01.jpg',
                'date_start' => Carbon::parse('2021-06-08 10:00:00')->toDateTimeString(),
                'date_end' => Carbon::parse('2021-06-13 19:00:00')->toDateTimeString(),
                'location' => '台中市西區民生路368巷',
                'organizer' => '審計新村',
                'calendar' => '活動花絮的資訊之一日曆',
                'created_at' => Carbon::parse('2021-06-03 10:00:00')->toDateTimeString(),
                'updated_at' => Carbon::parse('2021-06-03 10:00:00')->toDateTimeString(),
            ],
            [
                'type_id' => '1',
                'name' => '村長公告-防疫重要通知',
                'content' => '⚠️緊急‼️緊急報報⚠️
                ✏️請務必配合入園實名制登記
                ✏️全程配戴口罩😷飲食完畢也是呦
                台灣的安全由每個人都能落實及誠實！
                村長㊗️平安
                ',
                'img' => '/img/news/01-Shen-Ji-announcement/Shen-Ji-announcement-photoes/May-03.jpg',
                'date_start' => Carbon::parse('2021-06-13 10:00:00')->toDateTimeString(),
                'date_end' => Carbon::parse('2021-07-28 19:00:00')->toDateTimeString(),
                'location' => '台中市西區民生路368巷',
                'organizer' => '審計新村',
                'calendar' => '活動花絮的資訊之一日曆',
                'created_at' => Carbon::parse('2021-06-13 10:00:00')->toDateTimeString(),
                'updated_at' => Carbon::parse('2021-06-13 10:00:00')->toDateTimeString(),
            ],
        ]);
    }
}
