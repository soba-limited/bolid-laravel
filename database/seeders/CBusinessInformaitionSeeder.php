<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class CBusinessInformaitionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('c_business_informaitions')->delete();
        DB::unprepared("ALTER TABLE c_business_informaitions AUTO_INCREMENT = 1 ");

        \App\Models\CBusinessInformaition::factory()->count(12)->create();
    }
}