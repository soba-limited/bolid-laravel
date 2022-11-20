<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class CItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('c_items')->delete();
        DB::unprepared("ALTER TABLE c_items AUTO_INCREMENT = 1 ");

        \App\Models\CItem::factory()->count(50)->create();
    }
}