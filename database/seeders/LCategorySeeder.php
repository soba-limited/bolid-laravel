<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\LCategory;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;

class LCategoryseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        DB::table('l_categories')->delete();
        DB::unprepared("ALTER TABLE l_categories AUTO_INCREMENT = 1 ");

        $parents = [
            [
                'name' => 'Fashion',
                'slug' => 'fashion',
                'depth' => '0',
            ],
            [
                'name' => 'Beauty',
                'slug' => 'beauty',
                'depth' => '0',
            ],
            [
                'name' => 'Trend',
                'slug' => 'trend',
                'depth' => '0',
            ],
            [
                'name' => 'Lifestyle',
                'slug' => 'lifestyle',
                'depth' => '0',
            ],
            [
                'name' => 'Wedding',
                'slug' => 'wedding',
                'depth' => '0',
            ],
            [
                'name' => 'TopLeader',
                'slug' => 'topleader',
                'depth' => '0',
            ],
            [
                'name' => 'Fortune',
                'slug' => 'fortune',
                'depth' => '0',
            ],
            [
                'name' => 'Video',
                'slug' => 'video',
                'depth' => '0',
            ],
        ];

        $now = Carbon::now();
        foreach ($parents as $param) {
            $param['created_at'] = $now;
            $param['updated_at'] = $now;
            DB::table('l_categories')->insert($param);
        }

        $children = [
            [
                'name' => 'News',
                'slug' => 'news_fashion',
                'depth' => '1',
                'parent_slug' => 'fashion'
            ],
            [
                'name' => 'Trend',
                'slug' => 'trend_fashion',
                'depth' => '1',
                'parent_slug' => 'fashion'
            ],
            [
                'name' => 'Snap',
                'slug' => 'snap',
                'depth' => '1',
                'parent_slug' => 'fashion'
            ],
            [
                'name' => 'FirstClass',
                'slug' => 'firstclass_fashion',
                'depth' => '1',
                'parent_slug' => 'fashion'
            ],
            [
                'name' => 'News',
                'slug' => 'news_beauty',
                'depth' => '1',
                'parent_slug' => 'beauty'
            ],
            [
                'name' => 'Trend',
                'slug' => 'trend_beauty',
                'depth' => '1',
                'parent_slug' => 'beauty'
            ],
            [
                'name' => 'Wellness',
                'slug' => 'wellness',
                'depth' => '1',
                'parent_slug' => 'beauty'
            ],
            [
                'name' => 'Expart',
                'slug' => 'expartt',
                'depth' => '1',
                'parent_slug' => 'beauty'
            ],
            [
                'name' => 'FirstClass',
                'slug' => 'firstclass_beauty',
                'depth' => '1',
                'parent_slug' => 'beauty'
            ],
            [
                'name' => 'SDGs',
                'slug' => 'sdgs',
                'depth' => '1',
                'parent_slug' => 'trend'
            ],
            [
                'name' => 'metaverse',
                'slug' => 'metaverse',
                'depth' => '1',
                'parent_slug' => 'trend'
            ],
            [
                'name' => 'virtualcurrency',
                'slug' => 'virtualcurrency',
                'depth' => '1',
                'parent_slug' => 'trend'
            ],
            [
                'name' => 'Blockchain',
                'slug' => 'blockchain',
                'depth' => '1',
                'parent_slug' => 'trend'
            ],
            [
                'name' => 'NFT',
                'slug' => 'nft',
                'depth' => '1',
                'parent_slug' => 'trend'
            ],
            [
                'name' => 'spaceBusiness',
                'slug' => 'spacebusiness',
                'depth' => '1',
                'parent_slug' => 'trend'
            ],
            [
                'name' => 'FirstClass',
                'slug' => 'firstclass_trend',
                'depth' => '1',
                'parent_slug' => 'trend'
            ],
            [
                'name' => 'News',
                'slug' => 'news_lifestyle',
                'depth' => '1',
                'parent_slug' => 'lifestyle'
            ],
            [
                'name' => 'Gurmet',
                'slug' => 'gurmet',
                'depth' => '1',
                'parent_slug' => 'lifestyle'
            ],
            [
                'name' => 'Culture',
                'slug' => 'culture',
                'depth' => '1',
                'parent_slug' => 'lifestyle'
            ],
            [
                'name' => 'Interior',
                'slug' => 'interior',
                'depth' => '1',
                'parent_slug' => 'lifestyle'
            ],
            [
                'name' => 'RealEstate',
                'slug' => 'realestate',
                'depth' => '1',
                'parent_slug' => 'lifestyle'
            ],
            [
                'name' => 'Travel',
                'slug' => 'travel',
                'depth' => '1',
                'parent_slug' => 'lifestyle'
            ],
            [
                'name' => 'Entertaiment',
                'slug' => 'entertaiment',
                'depth' => '1',
                'parent_slug' => 'lifestyle'
            ],
            [
                'name' => 'FirstClass',
                'slug' => 'firstclass_lifestyle',
                'depth' => '1',
                'parent_slug' => 'lifestyle'
            ],
            [
                'name' => 'News',
                'slug' => 'news_wedding',
                'depth' => '1',
                'parent_slug' => 'wedding'
            ],
            [
                'name' => 'Dress',
                'slug' => 'dress',
                'depth' => '1',
                'parent_slug' => 'wedding'
            ],
            [
                'name' => 'Weddinghall',
                'slug' => 'weddinghall',
                'depth' => '1',
                'parent_slug' => 'wedding'
            ],
            [
                'name' => 'Accessory',
                'slug' => 'accessory',
                'depth' => '1',
                'parent_slug' => 'wedding'
            ],
            [
                'name' => 'Bouquet',
                'slug' => 'bouquet',
                'depth' => '1',
                'parent_slug' => 'wedding'
            ],
            [
                'name' => 'Present',
                'slug' => 'present',
                'depth' => '1',
                'parent_slug' => 'wedding'
            ],
            [
                'name' => 'FirstClass',
                'slug' => 'firstclass_wedding',
                'depth' => '1',
                'parent_slug' => 'wedding'
            ],
            [
                'name' => 'Interview',
                'slug' => 'interview',
                'depth' => '1',
                'parent_slug' => 'topleader'
            ],
            [
                'name' => 'Career',
                'slug' => 'career',
                'depth' => '1',
                'parent_slug' => 'topleader'
            ],
            [
                'name' => 'Daily',
                'slug' => 'daily',
                'depth' => '1',
                'parent_slug' => 'fortune'
            ],
            [
                'name' => 'Monthly',
                'slug' => 'monthly',
                'depth' => '1',
                'parent_slug' => 'fortune'
            ],
            [
                'name' => 'Yealy',
                'slug' => 'yealy',
                'depth' => '1',
                'parent_slug' => 'fortune'
            ],
        ];

        $now = Carbon::now();
        foreach ($children as $param) {
            $param['created_at'] = $now;
            $param['updated_at'] = $now;
            DB::table('l_categories')->insert($param);
        }
    }
}
