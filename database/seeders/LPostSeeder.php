<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use \App\Models\LPost;

class LPostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('l_posts')->delete();
        DB::unprepared("ALTER TABLE l_posts AUTO_INCREMENT = 1 ");

        Lpost::factory(300)->create();
    }
}