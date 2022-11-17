<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class CCompanySocialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('c_company_socials')->delete();
        DB::unprepared("ALTER TABLE c_company_socials AUTO_INCREMENT = 1 ");

        $params = [
            [
                'c_company_profile_id' => '1',
                'name' => 'facebook',
                'url' => 'https://google.com',
            ],
            [
                'c_company_profile_id' => '1',
                'name' => 'twitter',
                'url' => 'https://google.com',
            ],
            [
                'c_company_profile_id' => '1',
                'name' => 'line',
                'url' => 'https://google.com',
            ],
            [
                'c_company_profile_id' => '1',
                'name' => 'instagram',
                'url' => 'https://google.com',
            ],
            [
                'c_company_profile_id' => '1',
                'name' => 'tiktok',
                'url' => 'https://google.com',
            ],
        ];

        $now = Carbon::now();
        foreach ($params as $param) {
            $param['created_at'] = $now;
            $param['updated_at'] = $now;
            DB::table('c_company_socials')->insert($param);
        }
    }
}