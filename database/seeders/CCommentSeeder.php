<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class CCommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('c_comments')->delete();
        DB::unprepared("ALTER TABLE c_cards AUTO_INCREMENT = 1 ");

        \App\Models\CComment::factory()->count(50)->create();
    }
}