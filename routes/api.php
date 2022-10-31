<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Route;

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

    //liondor記事投稿者コントローラー

    Route::get('/liondor/post/editor_index/{id}', [LPostController::class,'editor_index'])->name('l_post.editor_index');
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
    Route::get('/dellamall/mall/edit/{shop_id}', [DMallController::class,'edit']);
    Route::post('/dellamall/mall/update/{shop_id}', [DMallController::class,'update']);
    Route::delete('/dellamall/mall/delete/{shop_id}', [DMallController::class,'destroy']);

    Route::post('/dellamall/mypage', [DProfileController::class,'mypage']);
    Route::post('/dellamall/mypage/store', [DProfileController::class,'store']);
    Route::post('/dellamall/mypage/edit/{profile_id}', [DProfileController::class,'edit']);
    Route::post('/dellamall/mypage/update/{profile_id}', [DProfileController::class,'update']);

    Route::post('/dellamall/shop/comment_add/{shop_id}', [DCommentController::class,'store']);
    Route::post('/dellamall/shop/mall_return', [DMallController::class,'return_mall']);


    //liondorコントローラー
    Route::get('/liondor', [LIndexController::class,'index'])->name('l_index');

    Route::get('/liondor/search', [LPostController::class,'search'])->name('l_post.search');
    Route::get('/liondor/post/{category}', [LPostController::class,'index'])->name('l_post.index');
    Route::get('/liondor/post/show/{id}', [LPostController::class,'show'])->name('l_post.show');

    Route::get('/liondor/present', [LPresentController::class,'index'])->name('l_present.index');
    Route::get('/liondor/present/{id}', [LPresentController::class,'show'])->name('l_present.show');

    Route::get('/liondor/series/{id}', [LSeriesController::class,'show'])->name('l_series.show');

    Route::get('/liondor/faq', [LFaqController::class,'index'])->name('l_faq.index');

    Route::post('/liondor/contact', [LIndexController::class,'sendMail'])->name('index.sendMail');


    //デラモール
    Route::get('/dellamall', [DIndexController::class,'index'])->name('d_index');
    Route::post('/dellamall/more/{page}', [DIndexController::class,'index_more'])->name('d_index_more');

    Route::get('/dellamall/shop', [DShopController::class,'index']);
    Route::post('/dellamall/shop/sort/', [DShopController::class,'sort']);
    Route::post('/dellamall/shop/add_shop', [DShopController::class,'add_shop']);
    Route::get('/dellamall/shop/show/{shop_id}', [DShopController::class,'show'])->name('d_shop.show');

    Route::get('/dellamall/mall/show/{mall_id}', [DMallController::class,'show']);

    Route::get('/dellamall/user/show/{user_id}', [DProfileController::class,'show']);
    Route::post('/dellamall/user/create_shop', [DProfileController::class,'create_shop']);
    Route::post('/dellamall/user/create_mall', [DProfileController::class,'create_mall']);
    Route::post('/dellamall/user/save_shop', [DProfileController::class,'save_shop']);
    Route::post('/dellamall/user/save_mall', [DProfileController::class,'save_mall']);
    Route::post('/dellamall/user/send_comments', [DProfileController::class,'send_comments']);
});
