<?php

use App\Http\Controllers\Controller;
use App\Http\Controllers\LFaqController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Http;

use App\Models\User;
use App\Http\Controllers\LProfileController;
use App\Http\Controllers\LIndexController;
use App\Http\Controllers\LPostController;
use App\Http\Controllers\LSeriesController;
use App\Http\Controllers\LPresentController;
use App\Http\Controllers\DIndexController;
use App\Http\Controllers\DShopController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/*
Route::get('/', function () {
    $test = User::where('id', 1)->get();
    return json_encode($test, JSON_PRETTY_PRINT);
});
*/

Route::get('/liondor', [LIndexController::class,'index'])->name('l_index');
Route::get('/liondor/post/create', [LPostController::class,'create'])->name('l_post.create');
Route::get('/liondor/post/show/{id}', [LPostController::class,'show'])->name('l_post.show');
Route::get('/liondor/post/{category}', [LPostController::class,'index'])->name('l_post.index');
Route::get('/liondor/present/', [LPresentController::class,'index'])->name('l_present.index');
Route::get('/liondor/present/{id}', [LPresentController::class,'show'])->name('l_present.show');
Route::get('/liondor/series/{id}', [LSeriesController::class,'show'])->name('l_series.show');
Route::get('/liondor/faq', [LFaqController::class,'index'])->name('l_faq.index');

Route::get('/dellamall', [DIndexController::class,'index'])->name('d_index');
Route::get('/dellamall/shop', [DShopController::class,'index']);
Route::get('/dellamall/shop/show/{shop_id}', [DShopController::class,'show']);






require __DIR__.'/auth.php';