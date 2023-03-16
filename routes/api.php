<?php

use App\Http\Controllers\BolidesJapanController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\CBusinessInformaitionController;
use App\Http\Controllers\CCardController;
use App\Http\Controllers\CCommentController;
use App\Http\Controllers\CCompanyProfileController;
use App\Http\Controllers\CCompanySocialController;
use App\Http\Controllers\CCouponController;
use App\Http\Controllers\CFollowController;
use App\Http\Controllers\CIndexController;
use App\Http\Controllers\CItemController;
use App\Http\Controllers\CLikeController;
use App\Http\Controllers\COfficeController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\CPostAppController;
use App\Http\Controllers\CPostBookmarkController;
use App\Http\Controllers\CPostController;
use App\Http\Controllers\CPrController;
use App\Http\Controllers\CPrCountsController;
use App\Http\Controllers\CPresidentController;
use App\Http\Controllers\CProfileController;
use App\Http\Controllers\CSalonAppController;
use App\Http\Controllers\CSalonBookmarkController;
use App\Http\Controllers\CSalonController;
use App\Http\Controllers\CSustController;
use App\Http\Controllers\CUserProfileController;
use App\Http\Controllers\CUserSocialController;
use App\Http\Controllers\LIndexController;
use App\Http\Controllers\LPickupController;
use App\Http\Controllers\LPostController;
use App\Http\Controllers\LPostUserController;
use App\Http\Controllers\LPresentController;
use App\Http\Controllers\LPresentUserController;
use App\Http\Controllers\LProfileController;
use App\Http\Controllers\LSeriesController;
use App\Http\Controllers\LFaqController;
use App\Http\Controllers\LSidebarController;

use App\Http\Controllers\DIndexController;
use App\Http\Controllers\DShopController;
use App\Http\Controllers\DMallController;
use App\Http\Controllers\DProfileController;
use App\Http\Controllers\DGoodController;
use App\Http\Controllers\DCommentController;
use App\Http\Controllers\DCommentGoodController;
use App\Http\Controllers\DCouponController;
use App\Http\Controllers\DFollowController;
use App\Http\Controllers\DInfoController;
use App\Http\Controllers\DInstaApiTokenController;
use App\Http\Controllers\DItemController;
use App\Http\Controllers\DMallBookmarksController;
use App\Http\Controllers\DMallInController;
use App\Http\Controllers\DOfficialController;
use App\Http\Controllers\DOverviewController;
use App\Http\Controllers\DPickupController;
use App\Http\Controllers\DSocialController;
use App\Http\Controllers\DTagController;
use App\Http\Controllers\LCollectionController;
use App\Http\Controllers\LFirstController;
use App\Http\Controllers\User\SubscriptionController;
use App\Http\Controllers\User\Ajax\AjaxSubscriptionController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['middleware'=>['api']], function () {
    //user root

    Route::get('/administar/user', [BolidesJapanController::class,'administar_user_index']);
    Route::post('/administar/user', [BolidesJapanController::class,'administar_user_search']);
    Route::delete('/delete/user/{user_id}', [BolidesJapanController::class,'user_destroy']);
    Route::post('/restore/user/{user_id}', [BolidesJapanController::class,'user_restore']);
    Route::delete('/hard_delete/user/{user_id}', [BolidesJapanController::class,'user_hard_destroy']);

    //stripe
    Route::get('/subscription/{user_id}', [SubscriptionController::class,'index']);
    Route::get('/subscription/status/{user_id}/{db_name}', [AjaxSubscriptionController::class,'status']);
    Route::post('/subscription/subscribe/{user_id}', [AjaxSubscriptionController::class,'subscribe']);
    Route::post('/subscription/cancel/{user_id}', [AjaxSubscriptionController::class,'cancel']);
    Route::post('/subscription/resume/{user_id}', [AjaxSubscriptionController::class,'resume']);
    Route::post('/subscription/change_plan/{user_id}', [AjaxSubscriptionController::class,'change_plan']);
    Route::post('/subscription/update_card/{user_id}', [AjaxSubscriptionController::class,'update_card']);

    Route::post('/subscription/use_check/', [AjaxSubscriptionController::class,'use_check']);

    //liondor管理者コントローラー

    Route::get('/liondor/admin/present', [LPresentController::class,'admin_index'])->name('l_present.admin_index');
    Route::get('/liondor/admin/present/{id}', [LPresentController::class,'admin_show'])->name('l_present.admin_show');
    Route::get('/liondor/present/create', [LPresentController::class,'create'])->name('l_present.create');
    Route::post('/liondor/present/store', [LPresentController::class,'store'])->name('l_present.store');
    Route::get('/liondor/present/edit/{id}', [LPresentController::class,'edit'])->name('l_present.edit');
    Route::post('/liondor/present/update/{id}', [LPresentController::class,'update'])->name('l_present.update');
    Route::delete('/liondor/present/delete/{id}', [LPresentController::class,'destroy'])->name('l_present.delete');

    Route::get('/liondor/faq/admin', [LFaqController::class,'admin'])->name('l_faq.admin');
    Route::get('/liondor/faq/create', [LFaqController::class,'create'])->name('l_faq.create');
    Route::post('/liondor/faq/store', [LFaqController::class,'store'])->name('l_faq.store');
    Route::get('/liondor/faq/edit/{id}', [LFaqController::class,'edit'])->name('l_faq.edit');
    Route::post('/liondor/faq/update/{id}', [LFaqController::class,'update'])->name('l_faq.update');
    Route::delete('/liondor/faq/delete/{id}', [LFaqController::class,'destroy'])->name('l_faq.delete');

    Route::get('/liondor/admin/pickup/', [LPickupController::class,'index'])->name('l_pickup.index');
    Route::post('/liondor/pickup/store/{id}', [LPickupController::class,'store'])->name('l_pickup.store');
    Route::delete('/liondor/pickup/delete/{id}', [LPickupController::class,'destroy'])->name('l_pickup.delete');

    Route::get('/liondor/admin/sidebar', [LSidebarController::class,'index'])->name('l_sidebar.index');
    Route::post('/liondor/sidebar/imagesave', [LSidebarController::class,'imagesave'])->name('l_sidebar.imagesave');
    Route::post('/liondor/sidebar/store', [LSidebarController::class,'store'])->name('l_sidebar.store');
    Route::get('/liondor/sidebar/edit/{id}', [LSidebarController::class,'edit'])->name('l_sidebar.edit');
    Route::post('/liondor/sidebar/update/{id}', [LSidebarController::class,'update'])->name('l_sidebar.update');
    Route::delete('/liondor/sidebar/delete/{id}', [LSidebarController::class,'destroy'])->name('l_sidebar.destroy');

    Route::get('/liondor/admin/collection/create', [LCollectionController::class,'create']);
    Route::post('/liondor/admin/collection/store', [LCollectionController::class,'store']);
    Route::get('/liondor/admin/collection/edit/{l_collection_id}', [LCollectionController::class,'edit']);
    Route::post('/liondor/admin/collection/update/{l_collection_id}', [LCollectionController::class,'update']);

    Route::get('/liondor/admin/first/create', [LFirstController::class,'create']);
    Route::post('/liondor/admin/first/store', [LFirstController::class,'store']);
    Route::get('/liondor/admin/first/edit/{l_first_id}', [LFirstController::class,'edit']);
    Route::post('/liondor/admin/first/update/{l_first_id}', [LFirstController::class,'update']);


    //デラモール運営コントローラー

    Route::post('/dellamall/admin/image_permission', [DShopController::class,'image_permission']);
    Route::post('/dellamall/admin/official_add', [DShopController::class,'official_add']);
    Route::post('/dellamall/admin/official_cancel', [DShopController::class,'official_cancel']);
    Route::post('/dellamall/d_pickups/list', [DPickupController::class,'index']);
    Route::post('/dellamall/d_pickups/store', [DPickupController::class,'store']);
    Route::delete('/dellamall/d_pickups/delete/{id}', [DPickupController::class,'destroy']);

    Route::post('/dellamall/pickup/check', [DPickupController::class,'check']);

    //コラプラ運営コントローラー

    Route::post('/coprapura/admin/salon/update/{c_salon_id}', [CSalonController::class,'admin_update']);
    Route::delete('/corapura/comment/delete', [CCommentController::class,'destroy']);


    //liondor記事投稿者コントローラー

    Route::get('/liondor/post/editor_index/{id}', [LPostController::class,'editor_index']);
    Route::post('/liondor/post/editor_index/{id}', [LPostController::class,'editor_index_post']);
    Route::get('/liondor/post/create', [LPostController::class,'create'])->name('l_post.create');
    Route::post('/liondor/post/imagesave', [LPostController::class,'imagesave'])->name('l_post.imagesave');
    Route::post('/liondor/post/store', [LPostController::class,'store'])->name('l_post.store');
    Route::get('/liondor/post/edit/{id}', [LPostController::class,'edit'])->name('l_post.edit');
    Route::post('/liondor/post/update/{id}', [LPostController::class,'update'])->name('l_post.update');
    Route::delete('/liondor/post/delete/{id}', [LPostController::class,'destroy'])->name('l_post.delete');

    Route::get('/liondor/series/create', [LSeriesController::class,'create'])->name('l_series.create');
    Route::post('/liondor/series/store', [LSeriesController::class,'store'])->name('l_series.store');
    Route::get('/liondor/series/edit/{id}', [LSeriesController::class,'edit'])->name('l_series.edit');
    Route::post('/liondor/series/update/{id}', [LSeriesController::class,'update'])->name('l_series.update');
    Route::delete('/liondor/series/delete/{id}', [LSeriesController::class,'destroy'])->name('l_series.delete');

    //デラモール公式コントローラー(listとstoreはショップのID,edit以下はそれぞれのID)

    Route::get('/dellamall/shop/official_comments/{shop_id}', [DCommentController::class,'official_comment']);
    Route::delete('/dellamall/comment/delete', [DCommentController::class,'destroy']);

    Route::get('/dellamall/shop/official/{shop_id}', [DShopController::class,'official']);

    Route::post('/dellamall/d_overviews/store/{shop_id}', [DOverviewController::class,'store']);
    Route::post('/dellamall/d_overviews/edit/{id}', [DOverviewController::class,'edit']);
    Route::post('/dellamall/d_overviews/update/{id}', [DOverviewController::class,'update']);
    Route::delete('/dellamall/d_overviews/delete/{id}', [DOverviewController::class,'destroy']);

    Route::post('/dellamall/d_infos/store/{shop_id}', [DInfoController::class,'store']);
    Route::post('/dellamall/d_infos/edit/{id}', [DInfoController::class,'edit']);
    Route::post('/dellamall/d_infos/update/{id}', [DInfoController::class,'update']);
    Route::delete('/dellamall/d_infos/delete/{id}', [DInfoController::class,'destroy']);

    Route::post('/dellamall/d_coupons/store/{shop_id}', [DCouponController::class,'store']);
    Route::post('/dellamall/d_coupons/edit/{id}', [DCouponController::class,'edit']);
    Route::post('/dellamall/d_coupons/update/{id}', [DCouponController::class,'update']);
    Route::delete('/dellamall/d_coupons/delete/{id}', [DCouponController::class,'destroy']);

    Route::post('/dellamall/d_items/store/{shop_id}', [DItemController::class,'store']);
    Route::post('/dellamall/d_items/edit/{id}', [DItemController::class,'edit']);
    Route::post('/dellamall/d_items/update/{id}', [DItemController::class,'update']);
    Route::delete('/dellamall/d_items/delete/{id}', [DItemController::class,'destroy']);

    Route::post('/dellamall/d_socials/store/{shop_id}', [DSocialController::class,'store']);
    Route::post('/dellamall/d_socials/edit/{id}', [DSocialController::class,'edit']);
    Route::post('/dellamall/d_socials/update/{id}', [DSocialController::class,'update']);
    Route::delete('/dellamall/d_socials/delete/{id}', [DSocialController::class,'destroy']);

    Route::post('/dellamall/d_insta/store/{shop_id}', [DInstaApiTokenController::class,'store']);
    Route::post('/dellamall/d_insta/edit/{id}', [DInstaApiTokenController::class,'edit']);
    Route::post('/dellamall/d_insta/update/{id}', [DInstaApiTokenController::class,'update']);
    Route::delete('/dellamall/d_insta/delete/{id}', [DInstaApiTokenController::class,'destroy']);

    //liondor一般ユーザーコントローラー
    Route::post('/liondor/present/app/{id}', [LPresentUserController::class,'store'])->name('l_present.store');

    Route::get('/liondor/mypage/create', [LProfileController::class,'create'])->name('l_profile.create');
    Route::get('/liondor/mypage/edit/{profile_id}', [LProfileController::class,'edit'])->name('l_profile.edit');
    Route::post('/liondor/mypage/store', [LProfileController::class,'store'])->name('l_profile.store');
    Route::post('/liondor/mypage/update/{profile_id}', [LProfileController::class,'update'])->name('l_profile.update');

    Route::post('/liondor/post/bookmark/{id}', [LPostUserController::class,'store'])->name('l_post_user.store');
    Route::delete('/liondor/post/bookmark_remove/{id}', [LPostUserController::class,'destroy'])->name('l_post_user.delete');

    Route::post('/liondor/hasprofile/{id}', [LProfileController::class,'hasprofile'])->name('l_profile.hasprofile');


    //デラモール一般会員コントローラー
    Route::post('/dellamall/shop/store', [DShopController::class,'store']);
    Route::get('/dellamall/shop/edit/{shop_id}', [DShopController::class,'edit']);
    Route::post('/dellamall/shop/update/{shop_id}', [DShopController::class,'update']);
    Route::delete('/dellamall/shop/delete/{shop_id}', [DShopController::class,'destroy']);

    Route::post('/dellamall/mall/store', [DMallController::class,'store']);
    Route::get('/dellamall/mall/edit/{mall_id}', [DMallController::class,'edit']);
    Route::post('/dellamall/mall/update/{mall_id}', [DMallController::class,'update']);
    Route::delete('/dellamall/mall/delete/{mall_id}', [DMallController::class,'destroy']);

    Route::post('/dellamall/mall_in/store', [DMallInController::class,'store']);
    Route::delete('/dellamall/mall_in/delete', [DMallInController::class,'destroy']);

    Route::get('/dellamall/mypage/{id}', [DProfileController::class,'mypage']);
    Route::post('/dellamall/mypage/store', [DProfileController::class,'store']);
    Route::post('/dellamall/mypage/edit/{profile_id}', [DProfileController::class,'edit']);
    Route::post('/dellamall/mypage/update/{profile_id}', [DProfileController::class,'update']);

    Route::get('/dellamall/mypage/follower/{user_id}', [DProfileController::class,'follower']);
    Route::post('/dellamall/mypage/follower/{user_id}', [DProfileController::class,'follower_more']);
    Route::get('/dellamall/mypage/following/{user_id}', [DProfileController::class,'following']);
    Route::post('/dellamall/mypage/following/{user_id}', [DProfileController::class,'following_more']);

    Route::post('/dellamall/shop/comment_add/{shop_id}', [DCommentController::class,'store']);
    Route::post('/dellamall/shop/mall_return', [DMallController::class,'return_mall']);
    Route::post('/dellamall/shop/good/store', [DGoodController::class,'store']);
    Route::delete('/dellamall/shop/good/delete', [DGoodController::class,'destroy']);

    Route::post('/dellamall/hasprofile/{id}', [DProfileController::class,'hasprofile']);

    Route::post('/dellamall/follow/store', [DFollowController::class,'store']);
    Route::delete('/dellamall/follow/delete', [DFollowController::class,'destroy']);
    Route::post('/dellamall/follow/check', [DFollowController::class,'check']);

    Route::post('/dellamall/d_comment_good/store', [DCommentGoodController::class,'store']);
    Route::delete('/dellamall/d_comment_good/delete', [DCommentGoodController::class,'destroy']);

    Route::post('/dellamall/mall_bookmark/store', [DMallBookmarksController::class,'store']);
    Route::delete('/dellamall/mall_bookmark/delete', [DMallBookmarksController::class,'destroy']);

    Route::post('/dellamall/comment/shop_return', [DCommentGoodController::class,'shop_return']);
    Route::post('/dellamall/mallbookmark/mall_return', [DMallBookmarksController::class,'mall_return']);

    Route::post('/dellamall/shop_create_url', [DShopController::class,'shop_create_url']);

    Route::post('/dellamall/mynews', [DProfileController::class,'mynews']);



    //corapra　会員コントローラー

    Route::post('/corapura/follow/store', [CFollowController::class,'store']);
    Route::delete('/corapura/follow/delete', [CFollowController::class,'destroy']);
    Route::post('/corapura/follow/check', [CFollowController::class,'check']);

    Route::post('/corapura/pr/count/add', [CPrCountsController::class,'add']);
    Route::post('/corapura/pr/count/check', [CPrCountsController::class,'check']);

    Route::post('/corapura/post_bookmark/store', [CPostBookmarkController::class,'store']);
    Route::delete('/corapura/post_bookmark/delete', [CPostBookmarkController::class,'destroy']);
    Route::post('/corapura/post_bookmark/check', [CPostBookmarkController::class,'check']);

    Route::post('/corapura/salon_bookmark/store', [CSalonBookmarkController::class,'store']);
    Route::delete('/corapura/salon_bookmark/delete', [CSalonBookmarkController::class,'destroy']);
    Route::post('/corapura/salon_bookmark/check', [CSalonBookmarkController::class,'check']);

    Route::post('/corapura/salon_app/store', [CSalonAppController::class,'store']);
    Route::delete('/corapura/salon_app/delete', [CSalonAppController::class,'destroy']);
    Route::post('/corapura/salon_app/check', [CSalonAppController::class,'check']);

    Route::post('/corapura/comment/send_list', [CCommentController::class,'send_list']);
    Route::post('/corapura/comment/recive_list', [CCommentController::class,'recive_list']);
    Route::post('/corapura/comment/store', [CCommentController::class,'store']);

    Route::get('/corapura/post/create', [CPostController::class,'create']);
    Route::post('/corapura/post/store', [CPostController::class,'store']);
    Route::get('/corapura/post/edit/{c_post_id}', [CPostController::class,'edit']);
    Route::post('/corapura/post/update/{c_post_id}', [CPostController::class,'update']);
    Route::post('/corapura/post/imagesave', [CPostController::class,'imagesave'])->name('c_post.imagesave');
    Route::delete('/corapura/post/delete', [CPostController::class,'destroy']);

    Route::post('/corapura/post_app/list', [CPostAppController::class,'index']);
    Route::post('/corapura/post_app/add', [CPostAppController::class,'store']);
    Route::post('/corapura/post_app/check', [CPostAppController::class,'check']);
    Route::post('/corapura/post_app/state_change/{app_id}', [CPostAppController::class,'update']);
    Route::post('/corapura/post/compleate/{c_post_id}', [CPostController::class,'compleate']);
    Route::delete('/corapura/post_app/delete', [CPostAppController::class,'destroy']);

    Route::get('/corapura/salon/create', [CSalonController::class,'create']);
    Route::post('/corapura/salon/store', [CSalonController::class,'store']);
    Route::get('/corapura/salon/edit/{c_salon_id}', [CSalonController::class,'edit']);
    Route::post('/corapura/salon/update/{c_salon_id}', [CSalonController::class,'update']);
    Route::post('/corapura/salon/imagesave', [CSalonController::class,'imagesave'])->name('c_salon.imagesave');
    Route::delete('/corapura/salon/delete', [CSalonController::class,'destroy']);

    Route::get('/corapura/pr/create', [CPrController::class,'create']);
    Route::post('/corapura/pr/store', [CPrController::class,'store']);
    Route::get('/corapura/pr/edit/{c_pr_id}', [CPrController::class,'edit']);
    Route::post('/corapura/pr/update/{c_pr_id}', [CPrController::class,'update']);
    Route::post('/corapura/pr/imagesave', [CPrController::class,'imagesave'])->name('c_pr.imagesave');
    Route::delete('/corapura/pr/delete', [CPrController::class,'destroy']);

    Route::get('/corapura/mypage/create', [CProfileController::class,'create']);
    Route::post('/corapura/mypage/store', [CProfileController::class,'store']);
    Route::get('/corapura/mypage/edit/{c_profile_id}', [CProfileController::class,'edit']);
    Route::post('/corapura/mypage/update/{c_profile_id}', [CProfileController::class,'update']);

    Route::get('/corapura/mypage/follower/{user_id}', [CProfileController::class,'follower']);
    Route::post('/corapura/mypage/follower/{user_id}', [CProfileController::class,'follower_more']);
    Route::get('/corapura/mypage/following/{user_id}', [CProfileController::class,'following']);
    Route::post('/corapura/mypage/following/{user_id}', [CProfileController::class,'following_more']);

    Route::post('/corapura/mypage/c_user_profile/update/{c_user_profile_id}', [CUserProfileController::class,'update']);

    Route::post('/corapura/mypage/c_user_social/store/', [CUserSocialController::class,'store']);
    Route::post('/corapura/mypage/c_user_social/edit/{c_user_social_id}', [CUserSocialController::class,'edit']);
    Route::post('/corapura/mypage/c_user_social/update/{c_user_social_id}', [CUserSocialController::class,'update']);
    Route::delete('/corapura/mypage/c_user_social/delete', [CUserSocialController::class,'destroy']);

    Route::post('/corapura/mypage/c_company_profile/update/{c_company_profile_id}', [CCompanyProfileController::class,'update']);

    Route::post('/corapura/mypage/c_company_social/store/', [CCompanySocialController::class,'store']);
    Route::post('/corapura/mypage/c_company_social/edit/{c_company_social_id}', [CCompanySocialController::class,'edit']);
    Route::post('/corapura/mypage/c_company_social/update/{c_company_social_id}', [CCompanySocialController::class,'update']);
    Route::delete('/corapura/mypage/c_company_social/delete', [CCompanySocialController::class,'destroy']);

    Route::post('/corapura/businessinformation/store', [CBusinessInformaitionController::class,'store']);
    Route::post('/corapura/businessinformation/edit/{c_business_information_id}', [CBusinessInformaitionController::class,'edit']);
    Route::post('/corapura/businessinformation/update/{c_business_information_id}', [CBusinessInformaitionController::class,'update']);
    Route::delete('/corapura/businessinformation/delete', [CBusinessInformaitionController::class,'destroy']);

    Route::post('/corapura/card/store', [CCardController::class,'store']);
    Route::post('/corapura/card/edit/{c_card_id}', [CCardController::class,'edit']);
    Route::post('/corapura/card/update/{c_card_id}', [CCardController::class,'update']);
    Route::delete('/corapura/card/delete', [CCardController::class,'destroy']);

    Route::post('/corapura/coupon/store', [CCouponController::class,'store']);
    Route::post('/corapura/coupon/edit/{c_coupon_id}', [CCouponController::class,'edit']);
    Route::post('/corapura/coupon/update/{c_coupon_id}', [CCouponController::class,'update']);
    Route::delete('/corapura/coupon/delete', [CCouponController::class,'destroy']);

    Route::post('/corapura/item/store', [CItemController::class,'store']);
    Route::post('/corapura/item/edit/{c_item_id}', [CItemController::class,'edit']);
    Route::post('/corapura/item/update/{c_item_id}', [CItemController::class,'update']);
    Route::delete('/corapura/item/delete', [CItemController::class,'destroy']);

    Route::post('/corapura/like/store', [CLikeController::class,'store']);
    Route::post('/corapura/like/edit/{c_like_id}', [CLikeController::class,'edit']);
    Route::post('/corapura/like/update/{c_like_id}', [CLikeController::class,'update']);
    Route::delete('/corapura/like/delete', [CLikeController::class,'destroy']);

    Route::post('/corapura/office/store', [COfficeController::class,'store']);
    Route::post('/corapura/office/edit/{c_office_id}', [COfficeController::class,'edit']);
    Route::post('/corapura/office/update/{c_office_id}', [COfficeController::class,'update']);
    Route::delete('/corapura/office/delete', [COfficeController::class,'destroy']);

    Route::post('/corapura/president/store', [CPresidentController::class,'store']);
    Route::post('/corapura/president/edit/{c_president_id}', [CPresidentController::class,'edit']);
    Route::post('/corapura/president/update/{c_president_id}', [CPresidentController::class,'update']);
    Route::delete('/corapura/president/delete', [CPresidentController::class,'destroy']);

    Route::post('/corapura/sust/store', [CSustController::class,'store']);
    Route::post('/corapura/sust/edit/{c_sust_id}', [CSustController::class,'edit']);
    Route::post('/corapura/sust/update/{c_sust_id}', [CSustController::class,'update']);
    Route::delete('/corapura/sust/delete', [CSustController::class,'destroy']);

    Route::get('/corapura/mypost/compleate/{user_id}', [CPostAppController::class,'my_compleate_post']);
    Route::post('/corapura/c_post_app/state_change_comment_compleate/{c_post_app_id}', [CPostAppController::class,'comment_compleate']);


    //liondorコントローラー
    Route::get('/liondor', [LIndexController::class,'index'])->name('l_index');

    Route::get('/liondor/search', [LPostController::class,'search'])->name('l_post.search');
    Route::get('/liondor/post/{category}', [LPostController::class,'index'])->name('l_post.index');
    Route::get('/liondor/post/show/{id}', [LPostController::class,'show'])->name('l_post.show');

    Route::get('/liondor/present', [LPresentController::class,'index'])->name('l_present.index');
    Route::get('/liondor/present/{id}', [LPresentController::class,'show'])->name('l_present.show');

    //Route::post('/liondor/present/{id}/mail', [LPresentController::class,'sendMail']);

    Route::get('/liondor/series/{id}', [LSeriesController::class,'show'])->name('l_series.show');

    Route::get('/liondor/faq', [LFaqController::class,'index'])->name('l_faq.index');

    Route::post('/liondor/contact', [LIndexController::class,'sendMail'])->name('index.sendMail');

    Route::post('/liondor/ad', [LIndexController::class,'sendMail_ad']);

    Route::post('/liondor/firstclass/check', [LFirstController::class,'check']);
    Route::post('/liondor/collection/check', [LCollectionController::class,'check']);


    //デラモール
    Route::get('/dellamall', [DIndexController::class,'index']);
    Route::post('/dellamall/more/{page}', [DIndexController::class,'index_more']);

    Route::post('/dellamall/tag/list', [DTagController::class,'index']);

    Route::post('/dellamall/shop', [DShopController::class,'index']);
    Route::post('/dellamall/shop/sort/{page}/{sort}/{acount}', [DShopController::class,'sort']);
    Route::post('/dellamall/shop/search/{page}/{sort}/{acount}', [DShopController::class,'search']);
    Route::post('/dellamall/shop/add_shop', [DShopController::class,'add_shop']);
    Route::get('/dellamall/shop/show/{shop_id}', [DShopController::class,'show']);

    Route::get('/dellamall/mall/show/{mall_id}', [DMallController::class,'show']);

    Route::get('/dellamall/user/show/{user_id}', [DProfileController::class,'show']);
    Route::post('/dellamall/user/create_shop', [DProfileController::class,'create_shop']);
    Route::post('/dellamall/user/create_mall', [DProfileController::class,'create_mall']);
    Route::post('/dellamall/user/save_shop', [DProfileController::class,'save_shop']);
    Route::post('/dellamall/user/save_mall', [DProfileController::class,'save_mall']);
    Route::post('/dellamall/user/send_comments', [DProfileController::class,'send_comments']);
    Route::post('/dellamall/user/mall_click', [DMallController::class,'mall_in_all']);

    Route::post('/dellamall/contact', [DIndexController::class,'sendMail']);

    Route::post('/dellamall/officialRequest', [DOfficialController::class,'sendMail']);
    Route::post('/dellamall/report', [DIndexController::class,'sendMail_report']);



    //コラプラ

    Route::get('/corapura', [CIndexController::class,'index']);

    Route::get('/corapura/post', [CPostController::class,'index']);
    Route::post('/corapura/post', [CPostController::class,'search']);
    Route::get('/corapura/user_post', [CPostController::class,'user_index']);
    Route::post('/corapura/user_post', [CPostController::class,'user_search']);
    Route::post('/corapura/post/mypost', [CPostController::class,'mypost']);
    Route::get('/corapura/post/show/{c_post_id}', [CPostController::class,'show']);

    Route::get('/corapura/post_bookmark/{user_id}', [CPostBookmarkController::class,'index']);
    Route::post('/corapura/post_bookmark/{user_id}', [CPostBookmarkController::class,'search']);

    Route::get('/corapura/company', [CProfileController::class,'company_index']);
    Route::post('/corapura/company', [CProfileController::class,'company_search']);
    Route::get('/corapura/user', [CProfileController::class,'user_index']);
    Route::post('/corapura/user', [CProfileController::class,'user_search']);
    Route::get('/corapura/company/show/{user_id}', [CProfileController::class,'company_show']);
    Route::get('/corapura/user/show/{user_id}', [CProfileController::class,'user_show']);
    Route::post('/corapura/matching/tab_return', [CProfileController::class,'matching']);
    Route::post('/corapura/matching_user/tab_return', [CProfileController::class,'matching_user']);
    Route::post('/corapura/businessinformation/tab_return', [CBusinessInformaitionController::class,'tab_return']);
    Route::post('/corapura/office/tab_return', [COfficeController::class,'tab_return']);
    Route::post('/corapura/president/tab_return', [CPresidentController::class,'tab_return']);
    Route::post('/corapura/item/tab_return', [CItemController::class,'tab_return']);
    Route::post('/corapura/sust/tab_return', [CSustController::class,'tab_return']);
    Route::post('/corapura/card/tab_return', [CCardController::class,'tab_return']);
    Route::post('/corapura/coupon/tab_return', [CCouponController::class,'tab_return']);
    Route::post('/corapura/like/tab_return', [CLikeController::class,'tab_return']);
    Route::post('/corapura/salon/tab_return', [CSalonController::class,'tab_return']);

    Route::get('/corapura/salon', [CSalonController::class,'index']);
    Route::post('/corapura/salon', [CSalonController::class,'search']);
    Route::post('/corapura/salon/mysalon', [CSalonController::class,'mysalon']);
    Route::get('/corapura/salon/show/{salon_id}', [CSalonController::class,'show']);

    Route::get('/corapura/pr', [CPrController::class,'index']);
    Route::post('/corapura/pr', [CPrController::class,'search']);
    Route::post('/corapura/pr/mypr', [CPrController::class,'mypr']);
    Route::get('/corapura/pr/show/{pr_id}', [CPrController::class,'show']);

    Route::post('/c_profile_get', [CProfileController::class,'allways']);
    Route::post('/d_profile_get', [DProfileController::class,'allways']);
    Route::post('/l_profile_get', [LProfileController::class,'allways']);

    //bjc

    Route::post('/bolides_japan/plan_add', [BolidesJapanController::class,'plan_add']);
    Route::post('/bolides_japan/plan_change', [BolidesJapanController::class,'plan_change']);
});
