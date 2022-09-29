<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class LPickupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('l_pickups')->delete();
        DB::unprepared("ALTER TABLE l_pickups AUTO_INCREMENT = 1 ");


        $picks = [
            [
                'l_post_id' => '1',
            ],
            [
                'l_post_id' => '2',
            ],
            [
                'l_post_id' => '3',
            ],
            [
                'l_post_id' => '4',
            ],
            [
                'l_post_id' => '5',
            ],
            [
                'l_post_id' => '6',
            ],
            [
                'l_post_id' => '7',
            ],
            [
                'l_post_id' => '8',
            ],
            [
                'l_post_id' => '9',
            ],
            [
                'l_post_id' => '10',
            ],
            [
                'l_post_id' => '11',
            ],
            [
                'l_post_id' => '12',
            ],
            [
                'l_post_id' => '13',
            ],
            [
                'l_post_id' => '14',
            ],
            [
                'l_post_id' => '15',
            ],
            [
                'l_post_id' => '16',
            ],
            [
                'l_post_id' => '17',
            ],
            [
                'l_post_id' => '18',
            ],
            [
                'l_post_id' => '19',
            ],
            [
                'l_post_id' => '20',
            ],
        ];

        $now = Carbon::now();
        foreach ($picks as $pick) {
            $pick['created_at'] = $now;
            $pick['updated_at'] = $now;
            DB::table('l_pickups')->insert($pick);
        }
    }
}
