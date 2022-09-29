<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class LPostUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('l_post_user')->delete();
        DB::unprepared("ALTER TABLE l_post_user AUTO_INCREMENT = 1 ");

        $params = [
            [
                'user_id' => '1',
                'l_post_id' => '1'
            ],
            [
                'user_id' => '1',
                'l_post_id' => '2'
            ],
            [
                'user_id' => '1',
                'l_post_id' => '3'
            ],
            [
                'user_id' => '1',
                'l_post_id' => '4'
            ],
            [
                'user_id' => '1',
                'l_post_id' => '5'
            ],
            [
                'user_id' => '1',
                'l_post_id' => '6'
            ],
            [
                'user_id' => '1',
                'l_post_id' => '7'
            ],
            [
                'user_id' => '1',
                'l_post_id' => '8'
            ],
            [
                'user_id' => '1',
                'l_post_id' => '9'
            ],
            [
                'user_id' => '1',
                'l_post_id' => '10'
            ],
            [
                'user_id' => '1',
                'l_post_id' => '11'
            ],
            [
                'user_id' => '1',
                'l_post_id' => '12'
            ],
            [
                'user_id' => '1',
                'l_post_id' => '13'
            ],
            [
                'user_id' => '1',
                'l_post_id' => '14'
            ],
            [
                'user_id' => '1',
                'l_post_id' => '15'
            ],
            [
                'user_id' => '1',
                'l_post_id' => '16'
            ],
        ];

        $now = Carbon::now();
        foreach ($params as $param) {
            $param['created_at'] = $now;
            $param['updated_at'] = $now;
            DB::table('l_post_user')->insert($param);
        }
    }
}