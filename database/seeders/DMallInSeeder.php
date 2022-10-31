<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class DMallInSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('d_mall_ins')->delete();
        DB::unprepared("ALTER TABLE d_mall_ins AUTO_INCREMENT = 1 ");

        \App\Models\DMAllin::factory()->count(20)->create();
    }
}
