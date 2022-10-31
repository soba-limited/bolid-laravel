<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class DTagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('d_tags')->delete();
        DB::unprepared("ALTER TABLE d_tags AUTO_INCREMENT = 1 ");

        \App\Models\DTag::factory()->count(20)->create();
    }
}
