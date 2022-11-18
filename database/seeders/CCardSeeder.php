<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class CCardSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('c_cards')->delete();
        DB::unprepared("ALTER TABLE c_cards AUTO_INCREMENT = 1 ");

        \App\Models\CCard::factory()->count(12)->create();
    }
}