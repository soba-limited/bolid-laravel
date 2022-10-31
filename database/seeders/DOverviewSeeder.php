<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class DOverviewSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('d_overviews')->delete();
        DB::unprepared("ALTER TABLE d_overviews AUTO_INCREMENT = 1 ");

        $params = [
            [
                'd_shop_id' => 1,
                'title' => 'ショップ情報項目',
                'content' => 'ショップ情報内容',
            ],
            [
                'd_shop_id' => 1,
                'title' => 'ショップ情報項目',
                'content' => 'ショップ情報内容',
            ],
            [
                'd_shop_id' => 1,
                'title' => 'ショップ情報項目',
                'content' => 'ショップ情報内容',
            ],
            [
                'd_shop_id' => 1,
                'title' => 'ショップ情報項目',
                'content' => 'ショップ情報内容',
            ],
            [
                'd_shop_id' => 1,
                'title' => 'ショップ情報項目',
                'content' => 'ショップ情報内容',
            ]
        ];

        $now = Carbon::now();
        foreach ($params as $param) {
            $param['created_at'] = $now;
            $param['updated_at'] = $now;
            DB::table('d_overviews')->insert($param);
        }
    }
}
