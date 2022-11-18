<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class CPresidentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('c_presidents')->delete();
        DB::unprepared("ALTER TABLE c_presidents AUTO_INCREMENT = 1 ");

        \App\Models\CPresident::factory()->count(12)->create();
    }
}