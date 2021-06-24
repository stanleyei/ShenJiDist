<?php

use App\Slider;
use Illuminate\Database\Seeder;
use Carbon\Carbon;

class SliderTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Slider::insert([
            [
                'name' => '審計新村照片',
                'img' => '/img/aboutUs/backup/swiper-04.jpg',
                'content' => '審計新村照片',
                'created_at' => now()->toDateString(),
                'updated_at' => now()->toDateString(),
            ],
            [
                'name' => '審計新村照片',
                'img' => '/img/aboutUs/backup/swiper-05.jpg',
                'content' => '審計新村照片',
                'created_at' => now()->toDateString(),
                'updated_at' => now()->toDateString(),
            ],
            [
                'name' => '審計新村照片',
                'img' => '/img/aboutUs/backup/swiper-06.jpg',
                'content' => '審計新村照片',
                'created_at' => now()->toDateString(),
                'updated_at' => now()->toDateString(),
            ],
            [
                'name' => '審計新村照片',
                'img' => '/img/aboutUs/backup/swiper-10.jpg',
                'content' => '審計新村照片',
                'created_at' => now()->toDateString(),
                'updated_at' => now()->toDateString(),
            ],
            [
                'name' => '審計新村照片',
                'img' => '/img/aboutUs/backup/swiper-01.png',
                'content' => '審計新村照片',
                'created_at' => now()->toDateString(),
                'updated_at' => now()->toDateString(),
            ],
        ]);
    }
}
