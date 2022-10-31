<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class DSocialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('d_socials')->delete();
        DB::unprepared("ALTER TABLE d_socials AUTO_INCREMENT = 1 ");

        $params = [
            [
                'd_shop_id' => 1,
                'name' => 'twitter',
                'link' => 'https://xxxx.xx',
            ],
            [
                'd_shop_id' => 1,
                'name' => 'facebook',
                'link' => 'https://xxxx.xx',
            ],
            [
                'd_shop_id' => 1,
                'name' => 'instagram',
                'link' => 'https://xxxx.xx',
            ],
            [
                'd_shop_id' => 1,
                'name' => 'youtube',
                'link' => 'https://xxxx.xx',
            ],
            [
                'd_shop_id' => 1,
                'name' => 'ticktok',
                'link' => 'https://xxxx.xx',
            ],
        ];

        $now = Carbon::now();
        foreach ($params as $param) {
            $param['created_at'] = $now;
            $param['updated_at'] = $now;
            DB::table('d_socials')->insert($param);
        }
    }
}
