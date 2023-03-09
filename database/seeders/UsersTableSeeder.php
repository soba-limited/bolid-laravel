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
            ],
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
        ];

        $now = Carbon::now();
        foreach ($params as $param) {
            $param['created_at'] = $now;
            $param['updated_at'] = $now;
            DB::table('users')->insert($param);
        }
    }
}
