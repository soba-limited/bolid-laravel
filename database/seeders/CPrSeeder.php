<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class CPrSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('c_prs')->delete();
        DB::unprepared("ALTER TABLE c_prs AUTO_INCREMENT = 1 ");

        \App\Models\CPr::factory()->count(20)->create();
    }
}