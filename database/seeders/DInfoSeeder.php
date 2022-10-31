<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class DInfoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('d_infos')->delete();
        DB::unprepared("ALTER TABLE d_infos AUTO_INCREMENT = 1 ");

        $params = [
            [
                'd_shop_id' => 1,
                'title' => 'ショップお知らせタイトル',
                'content' => 'ショップ情報内容',
            ],
            [
                'd_shop_id' => 1,
                'title' => 'ショップお知らせタイトル',
                'content' => 'ショップ情報内容',
            ],
            [
                'd_shop_id' => 1,
                'title' => 'ショップお知らせタイトル',
                'content' => 'ショップ情報内容',
            ],
            [
                'd_shop_id' => 1,
                'title' => 'ショップお知らせタイトル',
                'content' => 'ショップ情報内容',
            ],
            [
                'd_shop_id' => 1,
                'title' => 'ショップお知らせタイトル',
                'content' => 'ショップ情報内容',
            ],
        ];

        $now = Carbon::now();
        foreach ($params as $param) {
            $param['created_at'] = $now;
            $param['updated_at'] = $now;
            DB::table('d_infos')->insert($param);
        }
    }
}
