<?php

use App\Shop;
use Illuminate\Database\Seeder;
use Carbon\Carbon;

class ShopTableSeeder extends Seeder
{
    /**
     * 1 => 美食類
     * 2 => 小物類
     */
    public function run()
    {
        Shop::insert([
            [
                'type_id' => '1',
                'name' => 'Two Day 日日鬆餅',
                'url' => 'https://facebook.com/twoday0401',
                'phone' => '0923-312-545',
                'content' => '日日的餐點皆為當日製作，全程使用新鮮天然嚴選食材，醬料一律自家製，無添加色素、防腐劑，售完為止。',
                'content_second' => '日日鬆餅的可可使用的是法國weiss70%巧克力，整體口感偏苦，是我喜歡的那種，如果覺得舒芙蕾鬆餅比較甜，真心推薦點這法國可可鮮奶做搭配。',
                'location' => '403台中市西區民生路368巷2弄11號',
                'created_at' => now()->toDateString(),
                'updated_at' => now()->toDateString(),
            ],
            [
                'type_id' => '1',
                'name' => '旅禾 泡芙之家',
                'url' => 'https://www.luhopuff.com/',
                'phone' => '04-2301-1911',
                'content' => '一間來自夢想中的甜點之家。
                擁有十六年以上專業烘焙經驗的旅禾泡芙之家，白國文、李國溢師傅們秉著從小對烘焙的執著與熱忱，堅持對食材、衛生上做多重嚴格的把關，並且不斷地精新研發，只為呈現最好的給顧客！',
                'content_second' => '一顆泡芙，一份最純粹的初衷。
                一份好的商品，除了選用最好的食材，最重要的便是製作者的用心。旅禾泡芙的好吃秘密，在於它不花俏、不做任何多餘的加工，100%的濃醇鮮奶、70%瑞士蓮巧克力成就了菠蘿泡芙最純粹的兩種口味，當您一口咬下外酥内軟的外皮，
                便知其中隱藏的魅力都記憶在味蕾中，讓您想一口接一口，細細的將它品嘗殆盡。
                ',
                'location' => '台中市西區民生路358號',
                'created_at' => now()->toDateString(),
                'updated_at' => now()->toDateString(),
            ],
            [
                'type_id' => '1',
                'name' => '森小姐的茶店',
                'url' => 'https://senstea.misssense.com.tw/',
                'phone' => '04-2301-9569',
                'content' => '品牌創辦人之一早期在國外進行推廣農產品的工作，走過異國大大小小城市，體驗過許多不同的文化故事，當我們更深入了解百年製茶工藝並且潛心學習時，我們開始思考賣茶這件事，不僅僅是茶與茶香的銷售過程，我們重新定義了茶品。從挑選最好的茶開始到送到每一個人手中的每個細節。',
                'content_second' => '所有的一切是為了分享一種生活的態度，其實每個人心中都有一個森小姐，那是對美好生活的一種方式而不是想像，所以我們開始了「森小姐的茶店」，把我們所知的美好送給進入森小姐世界的每個人。
                身體有70％是水分，喝下身體需要的水。 你對身體好，身體也會對你好。 不喜歡沒有味道的白開水嗎？ 別擔心，森小姐的茶店讓你的水更有味道。
                ',
                'location' => '台中市西區民生路364號(審計新村內)',
                'created_at' => now()->toDateString(),
                'updated_at' => now()->toDateString(),
            ],
            [
                'type_id' => '1',
                'name' => '艸水木堂',
                'url' => 'https://www.facebook.com/grass364/',
                'phone' => '04-2301-9569',
                'content' => '主要是販售 panini sandwich.& Burger 套餐類型，店內主題以旋轉木馬為概念。
                店裡有超吸睛的旋轉木馬，好萌的兔子和松鼠。
                店不大，以外帶式餐點為主，戶外有少少的位子，會限制入內的人數，方便大家拍照。
                ',
                'content_second' => '「艸水木堂」位於審計新村內，是主打外帶甜甜圈的小店，甜甜圈會在每天12:30出爐，店家會放在小餐車上販賣，琳瑯滿目的甜甜圈讓我目不轉睛，整個選擇性障礙！

                每到假日客人總是絡繹不絕，甜甜圈賣完就沒有了哦！店外有一些動物系列裝置藝術可以拍照
                
                每到假日要來「艸水木堂」吃上一顆甜甜圈可是要排隊的呢！如果賣完了就吃不到嘍～',
                'location' => '台中市西區民生路364號(審計新村內)',
                'created_at' => now()->toDateString(),
                'updated_at' => now()->toDateString(),
            ],
            [
                'type_id' => '1',
                'name' => '三時杏仁',
                'url' => 'https://www.walkerland.com.tw/article/view/216204',
                'phone' => '04-2301-7301',
                'content' => '三時茶坊入境隨俗，貼合審計新村懷舊風格，取名為三時福利社杏仁茶專賣店，刻意保留紅磚瓦舍外觀，低矮石灰牆以早期閱讀順序寫下審計三時為您服務，一台鏽蝕腳踏車和三輪餐車，營造出古樸柑仔店的意象，喚起六七年級生兒時的回憶。',
                'content_second' => '走進店裡幾坪大的老宅空間，簡約黑白色系搭配溫潤木質窗櫺，小巧溫暖的，但座位數並不多，三五個人就坐滿，所以也有許多客人都是外帶，可以在審計新村裡邊逛邊吃，喜歡三時杏仁茶的可以買罐裝，也有盒裝杏仁豆腐，還有許多網友都推的古早味油條配杏仁茶！',
                'location' => '台中市西區民生路356號',
                'created_at' => now()->toDateString(),
                'updated_at' => now()->toDateString(),
            ],
            [
                'type_id' => '1',
                'name' => '甜月亮義大利手作冰淇淋',
                'url' => 'https://www.facebook.com/DLGelato/',
                'phone' => '0989 438 877',
                'content' => '甜月亮 Dolce Luna 取自於義大利語，即是「甜月亮」的意思。
                店外頭的冰淇淋道具模型，五顏六色超可愛！',
                'content_second' => '「 甜月亮 Dolce Luna Gelato 」的義式冰淇淋口味多樣、好吃，每次來還有機會遇到不一樣的特殊口味，讓人每次來都充滿著期待當天有什麼口味。
                ',
                'location' => '台中市西區民生路368巷4弄14號',
                'created_at' => now()->toDateString(),
                'updated_at' => now()->toDateString(),
            ],
            [
                'type_id' => '1',
                'name' => '成真咖啡 台中審計店',
                'url' => 'https://www.facebook.com/ComeTrueCoffee.201',
                'phone' => '04-2302-6882',
                'content' => '成真咖啡由老舊矮房改建，保留了一些復古的元素，陳舊的水泥牆看的見歲月留下的痕跡，店面走白色系的設計帶點小清新，亦提供了舒適的內用環境以及戶外座位區。',
                'content_second' => '成真咖啡除了多款咖啡品項，也有輕食、甜點等，選擇性很多，飲品系列滿有創意，有來審計新村遊玩，成真咖啡是個還不錯的休息落腳處。',
                'location' => '403台中市西區民生路370號',
                'created_at' => now()->toDateString(),
                'updated_at' => now()->toDateString(),
            ],
            [
                'type_id' => '2',
                'name' => '森多水耕植研所',
                'url' => 'https://www.senduo.tw/',
                'phone' => 'none',
                'content' => '森多前身為九鄉水耕實驗農場，創立於2006 年，觸及範圍包含草本、木本、松柏及多肉等；歷經七年實驗研究並於2013年上市第一代產品，於隔年擴大實驗農場，提升量產及研究數據﹔2016年正式推出新品牌－「森多」，注入新活力將自然帶到每個人生活中，希望藉此傳達更多植物知識，讓更多人認識台灣的農產業。',
                'content_second' => '我們以水耕技術種植森林。
                在過去，水耕植物被視為高單價的產品，但在經過我們的研發與改良後：
                不需土壤作為媒介，少了澆水造成的髒亂；經馴化過後的植物更能夠養在室內，僅需少許間接光源即可；
                也不需每天澆水，讓繁忙的你也能簡單享有清新的自然氛圍。
                我們販賣的是一種全新的懶人植栽型態，快來加入我們的行列吧！
                ',
                'location' => '台中市西區民生路368巷4弄10號1樓',
                'created_at' => now()->toDateString(),
                'updated_at' => now()->toDateString(),
            ],
            [
                'type_id' => '2',
                'name' => '森林島嶼x台中審計店',
                'url' => 'https://www.forestmosashop.com/',
                'phone' => '04 2301 2715',
                'content' => '森林島嶼，以體現「台灣生活美感」為出發點的主題展覽型選物店。凝聚台灣的多元與和諧，讓這萬般美麗在日常生活中永續不息。',
                'content_second' => '森林島嶼 Forestmosa
                種子著地，在島嶼上緩慢長成茂密的樹，逐漸遍布成森林。在這裡，生命不再漂流，開始向下扎根、茁壯，發展自己獨有的美麗。
                森林島嶼，以體現「台灣的生活美感」為出發點，原創企劃出主題式展覽型選物店。
                ',
                'location' => '403台中市西區民生路360號',
                'created_at' => now()->toDateString(),
                'updated_at' => now()->toDateString(),
            ],
            [
                'type_id' => '2',
                'name' => '愚室實驗所插畫主題商店',
                'url' => 'https://www.yushilab.com/',
                'phone' => 'none',
                'content' => '愚室 : 台灣原創插畫，用動物的角度來看煩惱很多的愚蠢人類
                實驗所 : 指的是品牌精神，設計師Ellen結合台灣元素，不斷實驗嘗試有趣又有文化的團隊創作。
                ',
                'content_second' => '由良川工作室的2位台灣設計師組成，來自台中的插畫品牌，擅長日系插畫風格的他們創作出呆萌可愛的角色，透過穿越時空帶大家認識過去台灣廣告的摩登時尚的時代氛圍！店內販售著印有角色們的各式商品，包包、衣服、麻布袋等等，與角色相呼應採用可愛復古的裝潢，近期還開始販售古早味剉冰，推薦給喜歡可愛逗趣風格的朋友前來挖寶！',
                'location' => '台中市西區民生路368巷2弄5號1樓',
                'created_at' => now()->toDateString(),
                'updated_at' => now()->toDateString(),
            ],
            [
                'type_id' => '2',
                'name' => '小日子商号',
                'url' => 'https://onelittleday.com.tw/?fbclid=IwAR398d9lPB0YE-KMyEdJjqsqjmMZ3KkNiO3YJmGlFWT_hORaJ4lHKV7Ew94',
                'phone' => '04-2301-9580',
                'content' => '小日子，書寫有故事的人。溫暖記錄臺灣土地上的小人物。讓未曾留心的生活小細節，優雅顯現。',
                'content_second' => '小日子商号審計店位在審計新村內，店面簡約帶點文青正好是我喜歡的風格，店面周圍有擺放許多綠色植栽，裡面除了有雜誌選物，有可以來這邊喝杯咖啡，另外一側有外帶的窗口。
                有咖啡、茶類跟氣泡飲，價位也不會很貴。店內也是白色系的風格，很有質感的文具店。
                ',
                'location' => '台中市西區民生路368巷2弄10號1樓',
                'created_at' => now()->toDateString(),
                'updated_at' => now()->toDateString(),
            ],
            [
                'type_id' => '2',
                'name' => 'Kou Jewellery',
                'url' => 'https://www.facebook.com/KouJewellery',
                'phone' => '0930 676 529',
                'content' => 'Kou Jewellery來自台灣的設計品牌，Kou唸做「寇」ㄎㄡˋ。
                將生活中的細節畫面，用細緻的線條和金屬自然紋理色澤，表現出優雅又堅韌的美。
                ',
                'content_second' => '起源於2013年的夏天,在芝加哥的藝術中心接觸到了金屬工藝。

                細緻的線條詮釋簡約。 讓配戴者能在任何時候輕鬆優雅地穿戴在身上，搭配屬於自己的風格美學。
                
                延續這樣的理念, 在2016年正式創立KOU Jewellery,以設計師姓氏 寇 命名的配飾品牌。',
                'location' => '403台中市西區民生路368巷4弄12號1樓',
                'created_at' => now()->toDateString(),
                'updated_at' => now()->toDateString(),
            ],
            [
                'type_id' => '2',
                'name' => '品墨良行',
                'url' => 'https://paper.pinmo.com.tw/',
                'phone' => '04 2301 9262',
                'content' => '「紙的材料室：品墨良行」
                品墨，是一間設計公司，也是一個原創品牌，參與的活動很多、面向很廣，不論你是如何接觸到這個品牌，紙的材料室、晒日子、生日書、太陽神力⋯⋯都是品墨的一部分，而且你可以很快發現，他們的發想和概念都非常有趣！
                ',
                'content_second' => '品墨非常在乎紙張，也需要收納大量紙材，如果有個專門陳列的地方多好？因此，將這間店舖以紙的材料室命名，定調為服務專業的人而設，比方說當你開了一家咖啡店，需要精美的menu，就可以來這裡尋找適合的紙張和印刷方式，或者設計師、設計科系學生常常需要從材料找靈感，因此紙的材料室也是一個蒐集靈感的地方。',
                'location' => '403台中市西區民生路368巷2弄8號',
                'created_at' => now()->toDateString(),
                'updated_at' => now()->toDateString(),
            ],
            [
                'type_id' => '2',
                'name' => 'KerKerland 審計店',
                'url' => 'https://www.facebook.com/KerKerland/',
                'phone' => '0963 165 181',
                'content' => '“KerKerland”一片充滿歡樂笑聲的土地。
                以生活中所見的美好為題材，簡潔童趣的創作，期望呈現豐沛的生命力。希望每一位觀者在畫裡，能感受到貼心的溫暖與最初的勇氣。Wish we are always in the KerKerland.
                ',
                'content_second' => '「寄一張明信片給10年後的自己。」
                KerKerland，一家滿是手作文創小物插畫、明信片的小店。西區有特色的小店不少，這回在SONO園日式料理用過午餐後，無目的的在附近晃著，就這樣發現這家未來明信片小店。KerKerland貳店最大的特色就是可以幫你寄送未來明信片，時光最遠可以寄給10年後的自己。數十張的明信片，張張都別具特色，讓我們光是挑選明信片就費上不少時間。有空的朋友不妨點杯茶飲坐下來，放慢步調，靜下心來想想：如果你現在乘坐時光機到10年後，你會想對自己說什麼呢？
                ',
                'location' => '403台中市西區民生路368巷4弄16號',
                'created_at' => now()->toDateString(),
                'updated_at' => now()->toDateString(),
            ],
        ]);
    }
}
