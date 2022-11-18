<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class CSustSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('c_susts')->delete();
        DB::unprepared("ALTER TABLE c_susts AUTO_INCREMENT = 1 ");

        \App\Models\CSust::factory()->count(50)->create();
    }
}