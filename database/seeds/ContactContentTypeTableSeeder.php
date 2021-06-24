<?php

use Carbon\Carbon;
use App\ContactContentType;
use Illuminate\Database\Seeder;

class ContactContentTypeTableSeeder extends Seeder
{
    /**
     * 
     * 1 => 審計店家
     * 2 => 遊客回饋
     */
    public function run()
    {
        ContactContentType::insert([
            [
                'type_id' => 1,
                'name' => '進駐店家',
                'created_at' => now()->toDateString(),
                'updated_at' => now()->toDateString(),
            ],
            [
                'type_id' => 1,
                'name' => '退出審計',
                'created_at' => now()->toDateString(),
                'updated_at' => now()->toDateString(),
            ],
            [
                'type_id' => 1,
                'name' => '其他狀況',
                'created_at' => now()->toDateString(),
                'updated_at' => now()->toDateString(),
            ],
            [
                'type_id' => 2,
                'name' => '心得回饋',
                'created_at' => now()->toDateString(),
                'updated_at' => now()->toDateString(),
            ],
            [
                'type_id' => 2,
                'name' => '問題抱怨',
                'created_at' => now()->toDateString(),
                'updated_at' => now()->toDateString(),
            ],
        ]);
    }
}
