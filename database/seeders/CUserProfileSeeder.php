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
            [
                'c_profile_id' => '3',
                'brand' => 'https::google.jp/',
                'appeal_text' => 'アピールテキストアピールテキストアピールテキストアピールテキストアピールテキストアピールテキスト'
            ],
            [
                'c_profile_id' => '4',
                'brand' => 'https::google.jp/',
                'appeal_text' => 'アピールテキストアピールテキストアピールテキストアピールテキストアピールテキストアピールテキスト'
            ],
            [
                'c_profile_id' => '5',
                'brand' => 'https::google.jp/',
                'appeal_text' => 'アピールテキストアピールテキストアピールテキストアピールテキストアピールテキストアピールテキスト'
            ],
            [
                'c_profile_id' => '6',
                'brand' => 'https::google.jp/',
                'appeal_text' => 'アピールテキストアピールテキストアピールテキストアピールテキストアピールテキストアピールテキスト'
            ],
            [
                'c_profile_id' => '7',
                'brand' => 'https::google.jp/',
                'appeal_text' => 'アピールテキストアピールテキストアピールテキストアピールテキストアピールテキストアピールテキスト'
            ],
            [
                'c_profile_id' => '8',
                'brand' => 'https::google.jp/',
                'appeal_text' => 'アピールテキストアピールテキストアピールテキストアピールテキストアピールテキストアピールテキスト'
            ],
            [
                'c_profile_id' => '9',
                'brand' => 'https::google.jp/',
                'appeal_text' => 'アピールテキストアピールテキストアピールテキストアピールテキストアピールテキストアピールテキスト'
            ],
            [
                'c_profile_id' => '10',
                'brand' => 'https::google.jp/',
                'appeal_text' => 'アピールテキストアピールテキストアピールテキストアピールテキストアピールテキストアピールテキスト'
            ],
            [
                'c_profile_id' => '11',
                'brand' => 'https::google.jp/',
                'appeal_text' => 'アピールテキストアピールテキストアピールテキストアピールテキストアピールテキストアピールテキスト'
            ],
            [
                'c_profile_id' => '12',
                'brand' => 'https::google.jp/',
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