<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class DInstaApiTokenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('d_insta_api_tokens')->delete();
        DB::unprepared("ALTER TABLE d_insta_api_tokens AUTO_INCREMENT = 1 ");

        $params = [
            [
                'd_shop_id' => 1,
                'account_name' => 'hidamarikidsschool',
                'user_name' => '17841454890195789',
                'api_token' => 'EAAPoY5h1kT4BADl9hRnvtz5YurswWZCzN9nL0zHTsEjR9lErECETCtGr7gYypqMdglRQEwBINQhbMSef5ceLSAYHqpocr9CzNJY5pTHAql2Ai756VDd7su4KRbUVRPZBN7oY5K3hvjWcHFV2qHwQFWExZCBHhKjZB6oPAdYjBSlfb0SZCNHOLwJgXA8FfOccZD',
            ]
        ];

        $now = Carbon::now();
        foreach ($params as $param) {
            $param['created_at'] = $now;
            $param['updated_at'] = $now;
            DB::table('d_insta_api_tokens')->insert($param);
        }
    }
}
