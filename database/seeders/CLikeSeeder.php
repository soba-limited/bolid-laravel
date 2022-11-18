<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class CLikeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('c_likes')->delete();
        DB::unprepared("ALTER TABLE c_likes AUTO_INCREMENT = 1 ");

        \App\Models\CLike::factory()->count(100)->create();
    }
}