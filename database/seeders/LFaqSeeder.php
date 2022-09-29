<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use \App\Models\LFaq;

class LFaqSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('l_faqs')->delete();
        DB::unprepared("ALTER TABLE l_faqs AUTO_INCREMENT = 1 ");

        LFaq::factory(100)->create();
    }
}
