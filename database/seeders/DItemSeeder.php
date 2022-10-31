<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class DItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('d_items')->delete();
        DB::unprepared("ALTER TABLE d_items AUTO_INCREMENT = 1 ");

        $params = [
            [
                'd_shop_id' => 1,
                'title' => '商品タイトル',
                'price' => '商品金額',
            ],
            [
                'd_shop_id' => 1,
                'title' => '商品タイトル',
                'price' => '商品金額',
            ],
            [
                'd_shop_id' => 1,
                'title' => '商品タイトル',
                'price' => '商品金額',
            ],
            [
                'd_shop_id' => 1,
                'title' => '商品タイトル',
                'price' => '商品金額',
            ],
        ];

        $now = Carbon::now();
        foreach ($params as $param) {
            $param['created_at'] = $now;
            $param['updated_at'] = $now;
            DB::table('d_items')->insert($param);
        }
    }
}
