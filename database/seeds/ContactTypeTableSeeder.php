<?php

use App\ContactType;
use Illuminate\Database\Seeder;
use Carbon\Carbon;

class ContactTypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ContactType::insert([
            [
                'name' => '審計店家',
                'created_at' => now()->toDateString(),
                'updated_at' => now()->toDateString(),
            ],
            [
                'name' => '遊客回饋',
                'created_at' => now()->toDateString(),
                'updated_at' => now()->toDateString(),
            ],
        ]);
    }
}
