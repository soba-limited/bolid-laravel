<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class CCatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('c_cats')->delete();
        DB::unprepared("ALTER TABLE c_cats AUTO_INCREMENT = 1 ");

        $params = [
            [
                'name' => 'インフルエンサー募集案件　PRや拡散を任せたい！',
                'slug' => 'c_cat1',
            ],
            [
                'name' => 'SNSでのお仕事できます　PRや拡散お任せください！',
                'slug' => 'c_cat2',
            ],
            [
                'name' => '売りたい',
                'slug' => 'c_cat3',
            ],
            [
                'name' => '買いたい',
                'slug' => 'c_cat4',
            ],
            [
                'name' => 'コラボしたい/パートナー募集',
                'slug' => 'c_cat5',
            ],
            [
                'name' => '仲間募集！',
                'slug' => 'c_cat6',
            ],
            [
                'name' => '相談したい',
                'slug' => 'c_cat7',
            ],
            [
                'name' => '求人募集',
                'slug' => 'c_cat8',
            ],
            [
                'name' => 'スカウト募集',
                'slug' => 'c_cat9',
            ],
            [
                'name' => 'お仕事依頼　あなたのスキル求めてます',
                'slug' => 'c_cat10',
            ],
            [
                'name' => 'お仕事募集　私のスキルを活用しませんか',
                'slug' => 'c_cat11',
            ],
            [
                'name' => '講演会募集・依頼案件',
                'slug' => 'c_cat12',
            ],
            [
                'name' => 'スポンサー募集中',
                'slug' => 'c_cat13',
            ],
            [
                'name' => 'その他',
                'slug' => 'c_cat14',
            ],
            [
                'name' => 'アンケート/モニター案件',
                'slug' => 'c_cat15',
            ],
            [
                'name' => '見積り募集します',
                'slug' => 'c_cat16',
            ],
            [
                'name' => 'クラウドファンディング',
                'slug' => 'c_cat17',
            ],
            [
                'name' => '相互フォローします！',
                'slug' => 'c_cat18',
            ],
        ];

        $now = Carbon::now();
        foreach ($params as $param) {
            $param['created_at'] = $now;
            $param['updated_at'] = $now;
            DB::table('c_cats')->insert($param);
        }
    }
}