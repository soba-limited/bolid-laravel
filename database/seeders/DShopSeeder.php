<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class DShopSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('d_shops')->delete();
        DB::unprepared("ALTER TABLE d_shops AUTO_INCREMENT = 1 ");

        \App\Models\DShop::factory()->count(100)->create();
    }
}
