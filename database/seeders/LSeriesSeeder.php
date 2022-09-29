<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class LSeriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('l_series')->delete();
        DB::unprepared("ALTER TABLE l_series AUTO_INCREMENT = 1 ");

        \App\Models\LSeries::factory()->count(10)->create();
    }
}