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

Route::get('subscription', 'User\SubscriptionController@index');
Route::get('ajax/subscription/status', 'User\Ajax\SubscriptionController@status');
Route::post('ajax/subscription/subscribe', 'User\Ajax\SubscriptionController@subscribe');
Route::post('ajax/subscription/cancel', 'User\Ajax\SubscriptionController@cancel');
Route::post('ajax/subscription/resume', 'User\Ajax\SubscriptionController@resume');
Route::post('ajax/subscription/change_plan', 'User\Ajax\SubscriptionController@change_plan');
Route::post('ajax/subscription/update_card', 'User\Ajax\SubscriptionController@update_card');


require __DIR__.'/auth.php';