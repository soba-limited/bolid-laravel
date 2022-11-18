<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class CCouponSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('c_coupons')->delete();
        DB::unprepared("ALTER TABLE c_coupons AUTO_INCREMENT = 1 ");

        \App\Models\CCoupon::factory()->count(12)->create();
    }
}