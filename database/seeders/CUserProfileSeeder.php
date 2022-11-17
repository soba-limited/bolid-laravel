<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class CUserProfileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('c_user_profiles')->delete();
        DB::unprepared("ALTER TABLE c_user_profiles AUTO_INCREMENT = 1 ");

        $params = [
            [
                'c_profile_id' => '1',
                'brand' => 'https::example.jp/',
                'appeal_text' => 'アピールテキストアピールテキストアピールテキストアピールテキストアピールテキストアピールテキスト'
            ],
        ];

        $now = Carbon::now();
        foreach ($params as $param) {
            $param['created_at'] = $now;
            $param['updated_at'] = $now;
            DB::table('c_user_profiles')->insert($param);
        }
    }
}