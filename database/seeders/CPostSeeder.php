<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class CPostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('c_posts')->delete();
        DB::unprepared("ALTER TABLE c_posts AUTO_INCREMENT = 1 ");

        \App\Models\CPost::factory()->count(100)->create();
    }
}