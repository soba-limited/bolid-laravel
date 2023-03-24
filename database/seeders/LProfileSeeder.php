<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class LProfileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        DB::table('l_profiles')->delete();
        DB::unprepared("ALTER TABLE l_profiles AUTO_INCREMENT = 1 ");

        $params = [
            [
                'nicename' => 'ai-yamauchi',
                'sex'=> '男',
                'zipcode'=> '4510053',
                'zip'=>'愛知県',
                'other_address'=>'名古屋市',
                'age'=>'31',
                'work_type'=>'正社員',
                'industry'=>'サービス業',
                'occupation'=>'通信事業',
            ],
        ];

        $now = Carbon::now();
        foreach ($params as $param) {
            $param['created_at'] = $now;
            $param['updated_at'] = $now;
            DB::table('l_profiles')->insert($param);
        }
    }
}
