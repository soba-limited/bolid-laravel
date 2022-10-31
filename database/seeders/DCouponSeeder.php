<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class DCouponSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('d_coupons')->delete();
        DB::unprepared("ALTER TABLE d_coupons AUTO_INCREMENT = 1 ");

        $params = [
            [
                'd_shop_id' => 1,
                'title' => 'クーポンタイトル',
                'content' => 'クーポン内容',
                'limit' => '使用期限',
            ],
            [
                'd_shop_id' => 1,
                'title' => 'クーポンタイトル',
                'content' => 'クーポン内容',
                'limit' => '使用期限',
            ],
            [
                'd_shop_id' => 1,
                'title' => 'クーポンタイトル',
                'content' => 'クーポン内容',
                'limit' => '使用期限',
            ],
            [
                'd_shop_id' => 1,
                'title' => 'クーポンタイトル',
                'content' => 'クーポン内容',
                'limit' => '使用期限',
            ],
            [
                'd_shop_id' => 1,
                'title' => 'クーポンタイトル',
                'content' => 'クーポン内容',
                'limit' => '使用期限',
            ],
        ];

        $now = Carbon::now();
        foreach ($params as $param) {
            $param['created_at'] = $now;
            $param['updated_at'] = $now;
            DB::table('d_coupons')->insert($param);
        }
    }
}
