<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class DMallSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('d_malls')->delete();
        DB::unprepared("ALTER TABLE d_malls AUTO_INCREMENT = 1 ");

        \App\Models\DMall::factory()->count(5)->create();
    }
}
