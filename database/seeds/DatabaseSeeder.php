<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(InfoTypeTableSeeder::class);
        $this->call(InfoTableSeeder::class);
        
        $this->call(InfoImgTableSeeder::class);
        $this->call(ShopTypeTableSeeder::class);
        $this->call(ShopTableSeeder::class);
        $this->call(ShopImgTableSeeder::class);
        $this->call(SliderTableSeeder::class);
        $this->call(ViewTableSeeder::class);
        $this->call(ViewImgTableSeeder::class);
        $this->call(ContactTypeTableSeeder::class);
        $this->call(ContactContentTypeTableSeeder::class);
        $this->call(ContactTableSeeder::class);
    }
}
