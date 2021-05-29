<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::post('user/register', 'mobile\UserAuthController@register')->name('regiser_mobile');
Route::get('user/login', 'mobile\UserAuthController@login')->name('login_mobile');

Route::get('search','mobile\UserAuthController@index');

Route::middleware('auth:api')->get('/user', function (Request $request) {
    Route::POST('payment/traxion', 'PaymentController@pay_booking');
    return $request->user();
});
Route::POST('tourismoph.payment/hotels/xxxx', 'PaymentController@pay_booking')->name('pay');
Route::POST('hotels/rooms/wishlist/wew', 'HomeController@toggle_wishlist')->name('wishlist2');





