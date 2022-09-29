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
    Route::get('/liondor/present/{id}/edit', [LPresentController::class,'edit'])->name('l_present.edit');
    Route::post('/liondor/present/{id}/update', [LPresentController::class,'update'])->name('l_present.update');
    Route::delete('/liondor/present/{id}/delete', [LPresentController::class,'destroy'])->name('l_present.delete');
    Route::get('/liondor/faq/create', [LFaqController::class,'create'])->name('l_faq.create');
    Route::post('/liondor/faq/store', [LFaqController::class,'store'])->name('l_faq.store');
    Route::get('/liondor/faq/{id}/edit', [LFaqController::class,'edit'])->name('l_faq.edit');
    Route::post('/liondor/faq/{id}/update', [LFaqController::class,'update'])->name('l_faq.update');
    Route::delete('/liondor/faq/{id}/delete', [LFaqController::class,'destroy'])->name('l_faq.delete');
    Route::get('/liondor/admin/pickup/', [LPickupController::class,'index'])->name('l_pickup.index');
    Route::post('/liondor/pickup/{id}/store', [LPickupController::class,'store'])->name('l_pickup.store');
    Route::delete('/liondor/pickup/{id}/delete', [LPickupController::class,'destroy'])->name('l_pickup.delete');
    Route::get('/liondor/admin/sidebar', [LSidebarController::class,'index'])->name('l_sidebar.index');
    Route::post('/liondor/sidebar/imagesave', [LSidebarController::class,'imagesave'])->name('l_sidebar.imagesave');
    Route::post('/liondor/sidebar/store', [LSidebarController::class,'store'])->name('l_sidebar.store');
    Route::get('/liondor/sidebar/{id}/edit', [LSidebarController::class,'edit'])->name('l_sidebar.edit');
    Route::post('/liondor/sidebar/{id}/update', [LSidebarController::class,'update'])->name('l_sidebar.update');

    //liondor記事投稿者コントローラー

    Route::get('/liondor/post/{id}/editor_index', [LPostController::class,'editor_index'])->name('l_post.editor_index');
    Route::get('/liondor/post/create', [LPostController::class,'create'])->name('l_post.create');
    Route::post('/liondor/post/imagesave', [LPostController::class,'imagesave'])->name('l_post.imagesave');
    Route::post('/liondor/post/store', [LPostController::class,'store'])->name('l_post.store');
    Route::get('/liondor/post/{id}/edit', [LPostController::class,'edit'])->name('l_post.edit');
    Route::post('/liondor/post/{id}/update', [LPostController::class,'update'])->name('l_post.update');
    Route::delete('/liondor/post/{id}/delete', [LPostController::class,'destroy'])->name('l_post.delete');
    Route::get('/liondor/series/create', [LSeriesController::class,'create'])->name('l_series.create');
    Route::post('/liondor/series/store', [LSeriesController::class,'store'])->name('l_series.store');
    Route::get('/liondor/series/{id}/edit', [LSeriesController::class,'edit'])->name('l_series.edit');
    Route::post('/liondor/series/{id}/update', [LSeriesController::class,'update'])->name('l_series.update');
    Route::delete('/liondor/series/{id}/delete', [LSeriesController::class,'destroy'])->name('l_series.delete');

    //liondor一般ユーザーコントローラー

    Route::post('/liondor/present/{id}/app', [LPresentUserController::class,'store'])->name('l_present.store');
    Route::get('/liondor/mypage', [LProfileController::class,'show'])->name('l_profile.show');
    Route::post('/liondor/mypage/store', [LProfileController::class,'store'])->name('l_profile.store');
    Route::post('/liondor/mypage/update', [LProfileController::class,'update'])->name('l_profile.update');
    Route::post('/liondor/post/{id}/bookmark', [LPostUserController::class,'store'])->name('l_post_user.store');
    Route::delete('/liondor/post/{id}/bookmark_remove', [LPostUserController::class,'destroy'])->name('l_post_user.delete');
    Route::post('/liondor/{id}/hasprofile', [LProfileController::class,'hasprofile'])->name('l_profile.hasprofile');

    //liondorコントローラー
    Route::get('/liondor', [LIndexController::class,'index'])->name('l_index');
    Route::get('/liondor/post/{category}', [LPostController::class,'index'])->name('l_post.index');
    Route::get('/liondor/post/show/{id}', [LPostController::class,'show'])->name('l_post.show');
    Route::get('/liondor/presents', [LPresentController::class,'index'])->name('l_present.index');
    Route::get('/liondor/presents/{id}', [LPresentController::class,'show'])->name('l_present.show');
    Route::get('/liondor/series/{id}', [LSeriesController::class,'show'])->name('l_series.show');
    Route::get('/liondor/faq', [LFaqController::class,'index'])->name('l_faq.index');
    Route::post('/liondor/contact', [LIndexController::class,'sendMail'])->name('index.sendMail');
});