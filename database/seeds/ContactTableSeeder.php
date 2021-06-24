<?php

use App\Contact;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class ContactTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * 1 => 進駐店家
     * 2 => 退出審計
     * 3 => 其他狀況
     * 
     * 4 => 心得回饋
     * 5 => 問題抱怨     
     */
    public function run()
    {
        Contact::insert([
            [
                'content_id' => 1,
                'sender' => '金城武',
                'mail' => 'sd4gwe98g4w9ag@4g89weag49',
                'content' => '進駐店家的內容',
                'created_at' => now()->toDateString(),
                'updated_at' => now()->toDateString(),
            ],
            [
                'content_id' => 2,
                'sender' => '金城武',
                'mail' => 'g4sd98ag4@sd4g89erwg',
                'content' => '退出審計的內容',
                'created_at' => now()->toDateString(),
                'updated_at' => now()->toDateString(),
            ],
            [
                'content_id' => 3,
                'sender' => '金城武',
                'mail' => '8gh9w4hg9we8@sd4gh98wg',
                'content' => '其他狀況的內容',
                'created_at' => now()->toDateString(),
                'updated_at' => now()->toDateString(),
            ],
            [
                'content_id' => 4,
                'sender' => '金城武',
                'mail' => 'sg89e4g9@sd5g4e98',
                'content' => '心得回饋的內容',
                'created_at' => now()->toDateString(),
                'updated_at' => now()->toDateString(),
            ],
            [
                'content_id' => 5,
                'sender' => '金城武',
                'mail' => 'chinchin@chinchin.chinchin',
                'content' => '問題抱怨的內容',
                'created_at' => now()->toDateString(),
                'updated_at' => now()->toDateString(),
            ],
        ]);
    }
}
