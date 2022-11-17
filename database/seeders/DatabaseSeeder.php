<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\CCompanyProfile;
use App\Models\DInfo;
use App\Models\DOverview;
use App\Models\DShop;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        $this->call([
            LProfileSeeder::class,
            DProfileSeeder::class,
            CProfileSeeder::class,
            UsersTableSeeder::class,
            LSeriesSeeder::class,
            LCategorySeeder::class,
            LPostSeeder::class,
            LPickupSeeder::class,
            LPresentSeeder::class,
            LPostUserSeeder::class,
            LFaqSeeder::class,
            DShopSeeder::class,
            DMallSeeder::class,
            DTagSeeder::class,
            DShopDTagSeeder::class,
            DMallInSeeder::class,
            DCommentSeeder::class,
            DOverviewSeeder::class,
            DInfoSeeder::class,
            DCouponSeeder::class,
            DItemSeeder::class,
            DSocialSeeder::class,
            DInstaApiTokenSeeder::class,
            CUserProfileSeeder::class,
            CCompanyProfileSeeder::class,
            CUserSocialSeeder::class,
            CCompanySocialSeeder::class,
        ]);
    }
}