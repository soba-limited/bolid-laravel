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
                'd_profile_id' => '1',
                'c_profile_id' => '1',
                'account_type' => '3',
            ],
            [
                'name' => 'KojiNakano',
                'email' => 'koji.nakano@google.com',
                'password' => Hash::make('nakano'),
                'l_profile_id' => '2',
                'd_profile_id' => '2',
                'c_profile_id' => '2',
                'account_type' => '1',
            ],
            [
                'name' => 'testuser1',
                'email' => 'testuser1@google.com',
                'password' => Hash::make('testuser1'),
                'c_profile_id' => '3',
                'account_type' => '0',
            ],
            [
                'name' => 'testuser2',
                'email' => 'testuser2@google.com',
                'password' => Hash::make('testuser2'),
                'c_profile_id' => '4',
                'account_type' => '0',
            ],
            [
                'name' => 'testuser3',
                'email' => 'testuser3@google.com',
                'password' => Hash::make('testuser3'),
                'c_profile_id' => '5',
                'account_type' => '0',
            ],
            [
                'name' => 'testuser4',
                'email' => 'testuser4@google.com',
                'password' => Hash::make('testuser4'),
                'c_profile_id' => '6',
                'account_type' => '0',
            ],
            [
                'name' => 'testuser5',
                'email' => 'testuser5@google.com',
                'password' => Hash::make('testuser5'),
                'c_profile_id' => '7',
                'account_type' => '0',
            ],
            [
                'name' => 'testuser6',
                'email' => 'testuser6@google.com',
                'password' => Hash::make('testuser6'),
                'c_profile_id' => '8',
                'account_type' => '0',
            ],
            [
                'name' => 'testuser7',
                'email' => 'testuser7@google.com',
                'password' => Hash::make('testuser7'),
                'c_profile_id' => '9',
                'account_type' => '0',
            ],
            [
                'name' => 'testuser8',
                'email' => 'testuser8@google.com',
                'password' => Hash::make('testuser8'),
                'c_profile_id' => '10',
                'account_type' => '0',
            ],
            [
                'name' => 'testuser9',
                'email' => 'testuser9@google.com',
                'password' => Hash::make('testuser9'),
                'c_profile_id' => '11',
                'account_type' => '0',
            ],
            [
                'name' => 'testuser10',
                'email' => 'testuser10@google.com',
                'password' => Hash::make('testuser10'),
                'c_profile_id' => '12',
                'account_type' => '0',
            ],
            [
                'name' => 'testuser11',
                'email' => 'testuser10@google.com',
                'password' => Hash::make('testuser10'),
                'c_profile_id' => '13',
                'account_type' => '1',
            ],
            [
                'name' => 'testuser12',
                'email' => 'testuser10@google.com',
                'password' => Hash::make('testuser10'),
                'c_profile_id' => '14',
                'account_type' => '1',
            ],
            [
                'name' => 'testuser13',
                'email' => 'testuser10@google.com',
                'password' => Hash::make('testuser10'),
                'c_profile_id' => '15',
                'account_type' => '1',
            ],
            [
                'name' => 'testuser14',
                'email' => 'testuser10@google.com',
                'password' => Hash::make('testuser10'),
                'c_profile_id' => '16',
                'account_type' => '1',
            ],
            [
                'name' => 'testuser15',
                'email' => 'testuser10@google.com',
                'password' => Hash::make('testuser10'),
                'c_profile_id' => '17',
                'account_type' => '1',
            ],
            [
                'name' => 'testuser16',
                'email' => 'testuser10@google.com',
                'password' => Hash::make('testuser10'),
                'c_profile_id' => '18',
                'account_type' => '1',
            ],
            [
                'name' => 'testuser17',
                'email' => 'testuser10@google.com',
                'password' => Hash::make('testuser10'),
                'c_profile_id' => '19',
                'account_type' => '1',
            ],
            [
                'name' => 'testuser18',
                'email' => 'testuser10@google.com',
                'password' => Hash::make('testuser10'),
                'c_profile_id' => '20',
                'account_type' => '1',
            ],
            [
                'name' => 'testuser19',
                'email' => 'testuser10@google.com',
                'password' => Hash::make('testuser10'),
                'c_profile_id' => '21',
                'account_type' => '1',
            ],
            [
                'name' => 'testuser20',
                'email' => 'testuser10@google.com',
                'password' => Hash::make('testuser10'),
                'c_profile_id' => '22',
                'account_type' => '1',
            ],
            [
                'name' => 'testuser21',
                'email' => 'testuser10@google.com',
                'password' => Hash::make('testuser10'),
                'c_profile_id' => '23',
                'account_type' => '1',
            ],
            [
                'name' => 'testuser22',
                'email' => 'testuser10@google.com',
                'password' => Hash::make('testuser10'),
                'c_profile_id' => '24',
                'account_type' => '1',
            ],
            [
                'name' => 'testuser22',
                'email' => 'm.office4@bolides.co.jp',
                'password' => Hash::make('bolidestest'),
                'c_profile_id' => '25',
                'account_type' => '0',
            ],
            [
                'name' => 'testuser22',
                'email' => 'm.office5@bolides.co.jp',
                'password' => Hash::make('bolidestest'),
                'l_profile_id' => '3',
                'account_type' => '2',
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