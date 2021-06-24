<?php

use App\ViewImg;
use Illuminate\Database\Seeder;
use Carbon\Carbon;

class ViewImgTableSeeder extends Seeder
{
    /**
     * 3筆假資料能附屬
     */
    public function run()
    {
        ViewImg::insert([
            [
                'view_id' => '1',
                'img' => '/img/views/01-taichung-literature-museum/taichung-literature-museum-img/taichung-literature-museum-01.jpg',
                'created_at' => now()->toDateString(),
                'updated_at' => now()->toDateString(),
            ],
            [
                'view_id' => '1',
                'img' => '/img/views/01-taichung-literature-museum/taichung-literature-museum-img/taichung-literature-museum-02.jpg',
                'created_at' => now()->toDateString(),
                'updated_at' => now()->toDateString(),
            ],
            [
                'view_id' => '1',
                'img' => '/img/views/01-taichung-literature-museum/taichung-literature-museum-img/taichung-literature-museum-03.jpg',
                'created_at' => now()->toDateString(),
                'updated_at' => now()->toDateString(),
            ],
            [
                'view_id' => '1',
                'img' => '/img/views/01-taichung-literature-museum/taichung-literature-museum-img/taichung-literature-museum-04.jpg',
                'created_at' => now()->toDateString(),
                'updated_at' => now()->toDateString(),
            ],
            [
                'view_id' => '1',
                'img' => '/img/views/01-taichung-literature-museum/taichung-literature-museum-img/taichung-literature-museum-05.jpg',
                'created_at' => now()->toDateString(),
                'updated_at' => now()->toDateString(),
            ],
            [
                'view_id' => '2',
                'img' => '/img/views/02-botanical-garden-of-national-museum-of-natural-science/botanical-garden-of-national-museum-of-natural-science-01.jpg',
                'created_at' => now()->toDateString(),
                'updated_at' => now()->toDateString(),
            ],
            [
                'view_id' => '2',
                'img' => '/img/views/02-botanical-garden-of-national-museum-of-natural-science/botanical-garden-of-national-museum-of-natural-science-02.jpg',
                'created_at' => now()->toDateString(),
                'updated_at' => now()->toDateString(),
            ],
            [
                'view_id' => '2',
                'img' => '/img/views/02-botanical-garden-of-national-museum-of-natural-science/botanical-garden-of-national-museum-of-natural-science-03.jpg',
                'created_at' => now()->toDateString(),
                'updated_at' => now()->toDateString(),
            ],
            [
                'view_id' => '2',
                'img' => '/img/views/02-botanical-garden-of-national-museum-of-natural-science/botanical-garden-of-national-museum-of-natural-science-04.jpg',
                'created_at' => now()->toDateString(),
                'updated_at' => now()->toDateString(),
            ],
            [
                'view_id' => '2',
                'img' => '/img/views/02-botanical-garden-of-national-museum-of-natural-science/botanical-garden-of-national-museum-of-natural-science-05.jpg',
                'created_at' => now()->toDateString(),
                'updated_at' => now()->toDateString(),
            ],
            [
                'view_id' => '2',
                'img' => '/img/views/02-botanical-garden-of-national-museum-of-natural-science/botanical-garden-of-national-museum-of-natural-science-06.jpg',
                'created_at' => now()->toDateString(),
                'updated_at' => now()->toDateString(),
            ],
            [
                'view_id' => '3',
                'img' => '/img/views/03-liuchuan-waterfront-trail/liuchuan-waterfront-trail-img/liuchuan-waterfront-trail-01.jpg',
                'created_at' => now()->toDateString(),
                'updated_at' => now()->toDateString(),
            ],
            [
                'view_id' => '3',
                'img' => '/img/views/03-liuchuan-waterfront-trail/liuchuan-waterfront-trail-img/liuchuan-waterfront-trail-02.jpg',
                'created_at' => now()->toDateString(),
                'updated_at' => now()->toDateString(),
            ],
            [
                'view_id' => '3',
                'img' => '/img/views/03-liuchuan-waterfront-trail/liuchuan-waterfront-trail-img/liuchuan-waterfront-trail-03.jpg',
                'created_at' => now()->toDateString(),
                'updated_at' => now()->toDateString(),
            ],
            [
                'view_id' => '3',
                'img' => '/img/views/03-liuchuan-waterfront-trail/liuchuan-waterfront-trail-img/liuchuan-waterfront-trail-04.jpg',
                'created_at' => now()->toDateString(),
                'updated_at' => now()->toDateString(),
            ],
            [
                'view_id' => '3',
                'img' => '/img/views/03-liuchuan-waterfront-trail/liuchuan-waterfront-trail-img/liuchuan-waterfront-trail-05.jpg',
                'created_at' => now()->toDateString(),
                'updated_at' => now()->toDateString(),
            ],
            [
                'view_id' => '3',
                'img' => '/img/views/03-liuchuan-waterfront-trail/liuchuan-waterfront-trail-img/liuchuan-waterfront-trail-06.jpg',
                'created_at' => now()->toDateString(),
                'updated_at' => now()->toDateString(),
            ],
            [
                'view_id' => '3',
                'img' => '/img/views/03-liuchuan-waterfront-trail/liuchuan-waterfront-trail-img/liuchuan-waterfront-trail-07.jpg',
                'created_at' => now()->toDateString(),
                'updated_at' => now()->toDateString(),
            ],
            [
                'view_id' => '4',
                'img' => '/img/views/04-national-museum-of-natural-science/national-museum-of-natural-science-img/national-museum-of-natural-science-01.jpg',
                'created_at' => now()->toDateString(),
                'updated_at' => now()->toDateString(),
            ],
            [
                'view_id' => '4',
                'img' => '/img/views/04-national-museum-of-natural-science/national-museum-of-natural-science-img/national-museum-of-natural-science-02.jpg',
                'created_at' => now()->toDateString(),
                'updated_at' => now()->toDateString(),
            ],
            [
                'view_id' => '4',
                'img' => '/img/views/04-national-museum-of-natural-science/national-museum-of-natural-science-img/national-museum-of-natural-science-03.jpg',
                'created_at' => now()->toDateString(),
                'updated_at' => now()->toDateString(),
            ],
            [
                'view_id' => '4',
                'img' => '/img/views/04-national-museum-of-natural-science/national-museum-of-natural-science-img/national-museum-of-natural-science-04.jpg',
                'created_at' => now()->toDateString(),
                'updated_at' => now()->toDateString(),
            ],
            [
                'view_id' => '4',
                'img' => '/img/views/04-national-museum-of-natural-science/national-museum-of-natural-science-img/national-museum-of-natural-science-05.jpg',
                'created_at' => now()->toDateString(),
                'updated_at' => now()->toDateString(),
            ],
            [
                'view_id' => '4',
                'img' => '/img/views/04-national-museum-of-natural-science/national-museum-of-natural-science-img/national-museum-of-natural-science-06.jpg',
                'created_at' => now()->toDateString(),
                'updated_at' => now()->toDateString(),
            ],
            [
                'view_id' => '4',
                'img' => '/img/views/04-national-museum-of-natural-science/national-museum-of-natural-science-img/national-museum-of-natural-science-07.jpg',
                'created_at' => now()->toDateString(),
                'updated_at' => now()->toDateString(),
            ],
            [
                'view_id' => '5',
                'img' => '/img/views/05-natural-way-six-arts-cultural-center/natural-way-six-arts-cultural-center-img/natural-way-six-arts-cultural-center-01.jpg',
                'created_at' => now()->toDateString(),
                'updated_at' => now()->toDateString(),
            ],
            [
                'view_id' => '5',
                'img' => '/img/views/05-natural-way-six-arts-cultural-center/natural-way-six-arts-cultural-center-img/natural-way-six-arts-cultural-center-02.jpg',
                'created_at' => now()->toDateString(),
                'updated_at' => now()->toDateString(),
            ],
            [
                'view_id' => '5',
                'img' => '/img/views/05-natural-way-six-arts-cultural-center/natural-way-six-arts-cultural-center-img/natural-way-six-arts-cultural-center-03.jpg',
                'created_at' => now()->toDateString(),
                'updated_at' => now()->toDateString(),
            ],
            [
                'view_id' => '5',
                'img' => '/img/views/05-natural-way-six-arts-cultural-center/natural-way-six-arts-cultural-center-img/natural-way-six-arts-cultural-center-04.jpg',
                'created_at' => now()->toDateString(),
                'updated_at' => now()->toDateString(),
            ],
            [
                'view_id' => '5',
                'img' => '/img/views/05-natural-way-six-arts-cultural-center/natural-way-six-arts-cultural-center-img/natural-way-six-arts-cultural-center-05.jpg',
                'created_at' => now()->toDateString(),
                'updated_at' => now()->toDateString(),
            ],
            [
                'view_id' => '5',
                'img' => '/img/views/05-natural-way-six-arts-cultural-center/natural-way-six-arts-cultural-center-img/natural-way-six-arts-cultural-center-06.jpg',
                'created_at' => now()->toDateString(),
                'updated_at' => now()->toDateString(),
            ],
            [
                'view_id' => '5',
                'img' => '/img/views/05-natural-way-six-arts-cultural-center/natural-way-six-arts-cultural-center-img/natural-way-six-arts-cultural-center-07.jpg',
                'created_at' => now()->toDateString(),
                'updated_at' => now()->toDateString(),
            ],
            [
                'view_id' => '6',
                'img' => '/img/views/06-national-taiwan-museum-of-fine-arts/national-taiwan-museum-of-fine-arts-img/national-taiwan-museum-of-fine-arts-01.jpg',
                'created_at' => now()->toDateString(),
                'updated_at' => now()->toDateString(),
            ],
            [
                'view_id' => '6',
                'img' => '/img/views/06-national-taiwan-museum-of-fine-arts/national-taiwan-museum-of-fine-arts-img/national-taiwan-museum-of-fine-arts-02.jpg',
                'created_at' => now()->toDateString(),
                'updated_at' => now()->toDateString(),
            ],
            [
                'view_id' => '6',
                'img' => '/img/views/06-national-taiwan-museum-of-fine-arts/national-taiwan-museum-of-fine-arts-img/national-taiwan-museum-of-fine-arts-03.jpg',
                'created_at' => now()->toDateString(),
                'updated_at' => now()->toDateString(),
            ],
            [
                'view_id' => '6',
                'img' => '/img/views/06-national-taiwan-museum-of-fine-arts/national-taiwan-museum-of-fine-arts-img/national-taiwan-museum-of-fine-arts-04.jpg',
                'created_at' => now()->toDateString(),
                'updated_at' => now()->toDateString(),
            ],
            [
                'view_id' => '6',
                'img' => '/img/views/06-national-taiwan-museum-of-fine-arts/national-taiwan-museum-of-fine-arts-img/national-taiwan-museum-of-fine-arts-05.jpg',
                'created_at' => now()->toDateString(),
                'updated_at' => now()->toDateString(),
            ],
        ]);
    }
}
