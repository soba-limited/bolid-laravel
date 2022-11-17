<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class CProfileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('c_profiles')->delete();
        DB::unprepared("ALTER TABLE c_profiles AUTO_INCREMENT = 1 ");

        $params = [
            [
                'nicename' => 'ai-yamauchi',
                'profile' => 'プロフィールテストプロフィールテストプロフィールテストプロフィールテストプロフィールテスト',
                'zip' => '愛知県',
            ],
            [
                'nicename' => 'こーじなかーの',
                'profile' => 'プロフィールテストプロフィールテストプロフィールテストプロフィールテストプロフィールテスト',
                'zip' => '岐阜県',
            ],
        ];

        $now = Carbon::now();
        foreach ($params as $param) {
            $param['created_at'] = $now;
            $param['updated_at'] = $now;
            DB::table('c_profiles')->insert($param);
        }
    }
}