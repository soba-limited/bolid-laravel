<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class DShopDTagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('d_shop_d_tags')->delete();
        DB::unprepared("ALTER TABLE d_shop_d_tags AUTO_INCREMENT = 1 ");

        \App\Models\DShopDTag::factory()->count(50)->create();
    }
}
