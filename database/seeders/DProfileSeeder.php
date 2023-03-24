<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class DProfileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('d_profiles')->delete();
        DB::unprepared("ALTER TABLE d_profiles AUTO_INCREMENT = 1 ");

        $params = [
            [
                'nicename' => 'ai-yamauchi',
                'profile' => 'プロフィールテストプロフィールテストプロフィールテストプロフィールテストプロフィールテスト',
            ],
        ];

        $now = Carbon::now();
        foreach ($params as $param) {
            $param['created_at'] = $now;
            $param['updated_at'] = $now;
            DB::table('d_profiles')->insert($param);
        }
    }
}
