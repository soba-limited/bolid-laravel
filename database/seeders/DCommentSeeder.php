<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class DCommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('d_comments')->delete();
        DB::unprepared("ALTER TABLE d_comments AUTO_INCREMENT = 1 ");

        \App\Models\DComment::factory()->count(100)->create();
    }
}
