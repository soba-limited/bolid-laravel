<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class COfficeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('c_offices')->delete();
        DB::unprepared("ALTER TABLE c_offices AUTO_INCREMENT = 1 ");

        \App\Models\COffice::factory()->count(50)->create();
    }
}