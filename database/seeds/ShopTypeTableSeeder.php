<?php

use App\ShopType;
use Illuminate\Database\Seeder;
use Carbon\Carbon;

class ShopTypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ShopType::insert([
            [
                'name' => '美食點心類',
                'created_at' => now()->toDateString(),
                'updated_at' => now()->toDateString(),
            ],
            [
                'name' => '小物禮品類',
                'created_at' => now()->toDateString(),
                'updated_at' => now()->toDateString(),
            ],
            [
                'name' => '其他',
                'created_at' => now()->toDateString(),
                'updated_at' => now()->toDateString(),
            ],
        ]);
    }
}
