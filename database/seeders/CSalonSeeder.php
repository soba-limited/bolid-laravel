<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class CSalonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('c_salons')->delete();
        DB::unprepared("ALTER TABLE c_salons AUTO_INCREMENT = 1 ");

        $params = [
            [
                'user_id' => '1',
                'state' => '1',
                'title' => 'テストサロン1',
                'date' => '開催未定',
                'plan' => '月額100万円',
                'number_of_people' => '1000人',
                'content' => 'テストテストテストテストテストテストテストテストテストテストテストテスト',
            ],
            [
                'user_id' => '2',
                'state' => '1',
                'title' => 'テストサロン2',
                'date' => '開催未定',
                'plan' => '月額100万円',
                'number_of_people' => '1000人',
                'content' => 'テストテストテストテストテストテストテストテストテストテストテストテスト',
            ],
            [
                'user_id' => '3',
                'state' => '1',
                'title' => 'テストサロン3',
                'date' => '開催未定',
                'plan' => '月額100万円',
                'number_of_people' => '1000人',
                'content' => 'テストテストテストテストテストテストテストテストテストテストテストテスト',
            ],
            [
                'user_id' => '4',
                'state' => '1',
                'title' => 'テストサロン4',
                'date' => '開催未定',
                'plan' => '月額100万円',
                'number_of_people' => '1000人',
                'content' => 'テストテストテストテストテストテストテストテストテストテストテストテスト',
            ],
            [
                'user_id' => '5',
                'state' => '1',
                'title' => 'テストサロン5',
                'date' => '開催未定',
                'plan' => '月額100万円',
                'number_of_people' => '1000人',
                'content' => 'テストテストテストテストテストテストテストテストテストテストテストテスト',
            ],
        ];

        $now = Carbon::now();
        foreach ($params as $param) {
            $param['created_at'] = $now;
            $param['updated_at'] = $now;
            DB::table('c_salons')->insert($param);
        }
    }
}