<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class CPostAppSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('c_post_apps')->delete();
        DB::unprepared("ALTER TABLE c_post_apps AUTO_INCREMENT = 1 ");

        \App\Models\CPostApp::factory()->count(200)->create();
    }
}