<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        //DB::table('users')->delete();
        //DB::unprepared("ALTER TABLE users AUTO_INCREMENT = 1 ");

        $params = [

            [
                'name' => 'MaoYamauchi',
                'email' => 'yamauchi@ai-communication.jp',
                'password' => Hash::make('yamauchi'),
                'account_type' => '3',
                'l_profile_id' => '1',
                'd_profile_id' => '1',
                'c_profile_id' => '1',
            ],
            /*
            [
                'name' => 'KojiNakano',
                'email' => 'koji.nakano@ai-communication.jp',
                'password' => Hash::make('11111111'),
                'account_type' => '3',
            ],
            [
                'name' => 'bolides1',
                'email' => 'm.office4@bolides.co.jp',
                'password' => Hash::make('bolidestest'),
                'account_type' => '0',
            ],
            [
                'name' => 'bolides2',
                'email' => 'm.office5@bolides.co.jp',
                'password' => Hash::make('bolidestest'),
                'l_profile_id' => '3',
                'account_type' => '2',
            ],
            [
                'name' => 'bolides3',
                'email' => 'm.office7@bolides.co.jp',
                'password' => Hash::make('bolidestest'),
                'account_type' => '1',
            ],
            [
                'name' => 'bolides4',
                'email' => 'm.office8@bolides.co.jp',
                'password' => Hash::make('bolidestest'),
                'account_type' => '3',
            ],

            [
                'name' => 'bolides5',
                'email' => 'm.office9@bolides.co.jp',
                'password' => Hash::make('bolidestest'),
                'account_type' => '0',
            ],
            [
                'name' => 'bolides6',
                'email' => 'm.office10@bolides.co.jp',
                'password' => Hash::make('bolidestest'),
                'account_type' => '0',
            ],
            [
                'name' => 'bolides7',
                'email' => 'm.office11@bolides.co.jp',
                'password' => Hash::make('bolidestest'),
                'account_type' => '1',
            ],
            [
                'name' => 'bolides8',
                'email' => 'm.office12@bolides.co.jp',
                'password' => Hash::make('bolidestest'),
                'account_type' => '1',
            ],
            [
                'name' => '編集アカウント1',
                'email' => 'm.office13@bolides.co.jp',
                'password' => Hash::make('bolidestest'),
                'account_type' => '2',
            ],
            [
                'name' => '編集アカウント2',
                'email' => 'm.office14@bolides.co.jp',
                'password' => Hash::make('bolidestest'),
                'account_type' => '2',
            ],
            [
                'name' => '編集アカウント3',
                'email' => 'm.office15@bolides.co.jp',
                'password' => Hash::make('bolidestest'),
                'account_type' => '2',
            ],
            [
                'name' => '編集アカウント4',
                'email' => 'm.office16@bolides.co.jp',
                'password' => Hash::make('bolidestest'),
                'account_type' => '2',
            ],
            [
                'name' => '編集アカウント5',
                'email' => 'm.office17@bolides.co.jp',
                'password' => Hash::make('bolidestest'),
                'account_type' => '2',
            ],
            [
                'name' => '株式会社伊藤リホ',
                'email' => 'aic.riho.ito@gmail.com',
                'password' => Hash::make('aic1226test'),
                'account_type' => '1',
            ],*/
        ];

        $now = Carbon::now();
        foreach ($params as $param) {
            $param['created_at'] = $now;
            $param['updated_at'] = $now;
            DB::table('users')->insert($param);
        }
    }
}
