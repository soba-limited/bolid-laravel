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
        DB::table('users')->delete();
        DB::unprepared("ALTER TABLE users AUTO_INCREMENT = 1 ");

        $params = [
            [
                'name' => 'MaoYamauchi',
                'email' => 'yamauchi@ai-communication.jp',
                'password' => Hash::make('yamauchi'),
                'l_profile_id' => '1',
            ],
            [
                'name' => 'KojiNakano',
                'email' => 'koji.nakano@google.com',
                'password' => Hash::make('nakano'),
                'l_profile_id' => '2',
            ]
        ];

        $now = Carbon::now();
        foreach ($params as $param) {
            $param['created_at'] = $now;
            $param['updated_at'] = $now;
            DB::table('users')->insert($param);
        }
    }
}