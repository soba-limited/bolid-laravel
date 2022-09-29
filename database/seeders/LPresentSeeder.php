<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class LPresentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('l_presents')->delete();
        DB::unprepared("ALTER TABLE l_presents AUTO_INCREMENT = 1 ");

        \App\Models\LPresent::factory()->count(20)->create();
    }
}