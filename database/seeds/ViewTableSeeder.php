<?php

use App\View;
use Illuminate\Database\Seeder;
use Carbon\Carbon;

class ViewTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        View::insert([
            [
                'name' => '台中文學館',
                'content' => '臺中文學館原為日治時期警察宿舍，為活化歷史建築，以「臺中文學」為主題，推廣在地文化，讓文學走進日常生活中。是臺中第一座以文學為主題之公立博物館，也是文青休閒好去處。',
                'phone' => '1.18km',
                'address' => '403003臺中市西區樂群街38號',
                'time_open' => 10,
                'time_close' => 17,
                'created_at' => now()->toDateString(),
                'updated_at' => now()->toDateString(),
            ],
            [
                'name' => '國立自然科學博物館之植物園',
                'content' => '植物園以臺灣低海拔具有的特色生態和熱帶雨林為展示主題，細心挑選仔細檢視臺灣本土具有代表性的幾個生態區造景，並表現景觀的趣味及特色。',
                'phone' => '1.45km',
                'address' => '404605 臺中市北區館前路一號',
                'time_open' => 9,
                'time_close' => 17,
                'created_at' => now()->toDateString(),
                'updated_at' => now()->toDateString(),
            ],
            [
                'name' => '柳川水岸步道',
                'content' => '柳川是台中市中心四條重要河川之一，整治之後成為市區首座永續性生態工法開發的景觀河岸，白天景色宜人，晚上燈火璀璨，兼具了美感與儲水灌溉的功能。',
                'phone' => '1.49km',
                'address' => '台中市中區柳川西路三段與柳川東路三段間',
                'time_open' => 6,
                'time_close' => 22,
                'created_at' => now()->toDateString(),
                'updated_at' => now()->toDateString(),
            ],
            [
                'name' => '國立自然科學博物館',
                'content' => '國立自然科學博物館位於臺中市北區，為國家設立的第一座科學博物館，也是首座將自然科學生活化的博物館，亦是一處可以實地操作學習的知識殿堂。',
                'phone' => '1.45km',
                'address' => '404605 臺中市北區館前路一號',
                'time_open' => 9,
                'time_close' => 17,
                'created_at' => now()->toDateString(),
                'updated_at' => now()->toDateString(),
            ],
            [
                'name' => '道禾六藝文化館',
                'content' => '台中刑務所演武場，興建於日治時期昭和12年，為司獄官、警察日常練武之武道館舍，屬本市僅存之演武場，歷史原貌保存完整， 極具保存、再利用及建築研究價值。',
                'phone' => '1.62km',
                'address' => '403台中市西區林森路33號',
                'time_open' => 0,
                'time_close' => 0,
                'created_at' => now()->toDateString(),
                'updated_at' => now()->toDateString(),
            ],
            [
                'name' => '國立臺灣美術館',
                'content' => '國立臺灣美術館以視覺藝術為主導，典藏並研究臺灣現代與當代美術發展特色；除提供各項展覽，並致力於多樣性的主題規劃特展與藝術教育推廣活動，提供民眾多元化欣賞藝術的環境。',
                'phone' => '1.00km',
                'address' => '403台中市西區五權西路一段2號',
                'time_open' => 0,
                'time_close' => 0,
                'created_at' => now()->toDateString(),
                'updated_at' => now()->toDateString(),
            ],
        ]);
    }
}
