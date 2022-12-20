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
                'title' => '肩書1',
                'profile' => 'プロフィールテストプロフィールテストプロフィールテストプロフィールテストプロフィールテスト',
                'zip' => '愛知県',
            ],
            [
                'nicename' => 'こーじなかーの',
                'title' => '肩書2',
                'profile' => 'プロフィールテストプロフィールテストプロフィールテストプロフィールテストプロフィールテスト',
                'zip' => '岐阜県',
            ],
            [
                'nicename' => 'テストユーザー1',
                'title' => '肩書3',
                'profile' => 'プロフィールテストプロフィールテストプロフィールテストプロフィールテストプロフィールテスト',
                'zip' => '岐阜県',
            ],
            [
                'nicename' => 'テストユーザー2',
                'title' => '肩書4',
                'profile' => 'プロフィールテストプロフィールテストプロフィールテストプロフィールテストプロフィールテスト',
                'zip' => '岐阜県',
            ],
            [
                'nicename' => 'テストユーザー3',
                'title' => '肩書5',
                'profile' => 'プロフィールテストプロフィールテストプロフィールテストプロフィールテストプロフィールテスト',
                'zip' => '岐阜県',
            ],
            [
                'nicename' => 'テストユーザー4',
                'title' => '肩書6',
                'profile' => 'プロフィールテストプロフィールテストプロフィールテストプロフィールテストプロフィールテスト',
                'zip' => '岐阜県',
            ],
            [
                'nicename' => 'テストユーザー5',
                'title' => '肩書7',
                'profile' => 'プロフィールテストプロフィールテストプロフィールテストプロフィールテストプロフィールテスト',
                'zip' => '岐阜県',
            ],
            [
                'nicename' => 'テストユーザー6',
                'title' => '肩書8',
                'profile' => 'プロフィールテストプロフィールテストプロフィールテストプロフィールテストプロフィールテスト',
                'zip' => '岐阜県',
            ],
            [
                'nicename' => 'テストユーザー7',
                'title' => '肩書9',
                'profile' => 'プロフィールテストプロフィールテストプロフィールテストプロフィールテストプロフィールテスト',
                'zip' => '岐阜県',
            ],
            [
                'nicename' => 'テストユーザー8',
                'title' => '肩書10',
                'profile' => 'プロフィールテストプロフィールテストプロフィールテストプロフィールテストプロフィールテスト',
                'zip' => '岐阜県',
            ],
            [
                'nicename' => 'テストユーザー9',
                'title' => '肩書11',
                'profile' => 'プロフィールテストプロフィールテストプロフィールテストプロフィールテストプロフィールテスト',
                'zip' => '岐阜県',
            ],
            [
                'nicename' => 'テストユーザー10',
                'title' => '肩書12',
                'profile' => 'プロフィールテストプロフィールテストプロフィールテストプロフィールテストプロフィールテスト',
                'zip' => '岐阜県',
            ],
            [
                'nicename' => 'テストユーザー10',
                'title' => '肩書13',
                'profile' => 'プロフィールテストプロフィールテストプロフィールテストプロフィールテストプロフィールテスト',
                'zip' => '岐阜県',
            ],
            [
                'nicename' => 'テストユーザー11',
                'title' => '肩書14',
                'profile' => 'プロフィールテストプロフィールテストプロフィールテストプロフィールテストプロフィールテスト',
                'zip' => '岐阜県',
            ],
            [
                'nicename' => 'テストユーザー12',
                'title' => '肩書15',
                'profile' => 'プロフィールテストプロフィールテストプロフィールテストプロフィールテストプロフィールテスト',
                'zip' => '岐阜県',
            ],
            [
                'nicename' => 'テストユーザー13',
                'title' => '肩書16',
                'profile' => 'プロフィールテストプロフィールテストプロフィールテストプロフィールテストプロフィールテスト',
                'zip' => '岐阜県',
            ],
            [
                'nicename' => 'テストユーザー14',
                'title' => '肩書17',
                'profile' => 'プロフィールテストプロフィールテストプロフィールテストプロフィールテストプロフィールテスト',
                'zip' => '岐阜県',
            ],
            [
                'nicename' => 'テストユーザー15',
                'title' => '肩書18',
                'profile' => 'プロフィールテストプロフィールテストプロフィールテストプロフィールテストプロフィールテスト',
                'zip' => '岐阜県',
            ],
            [
                'nicename' => 'テストユーザー16',
                'title' => '肩書19',
                'profile' => 'プロフィールテストプロフィールテストプロフィールテストプロフィールテストプロフィールテスト',
                'zip' => '岐阜県',
            ],
            [
                'nicename' => 'テストユーザー17',
                'title' => '肩書20',
                'profile' => 'プロフィールテストプロフィールテストプロフィールテストプロフィールテストプロフィールテスト',
                'zip' => '岐阜県',
            ],
            [
                'nicename' => 'テストユーザー18',
                'title' => '肩書21',
                'profile' => 'プロフィールテストプロフィールテストプロフィールテストプロフィールテストプロフィールテスト',
                'zip' => '岐阜県',
            ],
            [
                'nicename' => 'テストユーザー19',
                'title' => '肩書22',
                'profile' => 'プロフィールテストプロフィールテストプロフィールテストプロフィールテストプロフィールテスト',
                'zip' => '岐阜県',
            ],
            [
                'nicename' => 'テストユーザー20',
                'title' => '肩書23',
                'profile' => 'プロフィールテストプロフィールテストプロフィールテストプロフィールテストプロフィールテスト',
                'zip' => '岐阜県',
            ],
            [
                'nicename' => 'テストユーザー21',
                'title' => '肩書24',
                'profile' => 'プロフィールテストプロフィールテストプロフィールテストプロフィールテストプロフィールテスト',
                'zip' => '岐阜県',
            ],
            [
                'nicename' => 'テストユーザー22',
                'title' => '肩書25',
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