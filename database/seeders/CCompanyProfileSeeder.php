<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class CCompanyProfileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('c_company_profiles')->delete();
        DB::unprepared("ALTER TABLE c_company_profiles AUTO_INCREMENT = 1 ");

        $params = [
            [
                'c_profile_id' => '2',
                'president' => 'ko-ji nakano',
                'maked' => '2000年11月17日',
                'jojo' => '非上場',
                'capital' => '100円',
                'zipcode' => '455-6487',
                'address' => '岐阜県郡上市八幡宮',
                'tel' => '000-0000-0000',
                'site_url' => 'https://google.com',
            ],
        ];

        $now = Carbon::now();
        foreach ($params as $param) {
            $param['created_at'] = $now;
            $param['updated_at'] = $now;
            DB::table('c_company_profiles')->insert($param);
        }
    }
}