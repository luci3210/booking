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

Route::post('search', 'Tourismo\HeaderSearchController@Search')->name('search');
Route::post('/auth/check-login', 'Auth\UserLoginController@checkLogin')->name('check_auth');

Route::prefix('service-tour')->group(function () {
    Route::get('get/tours/{service}/{limit}/{offset}/', 'mobile\ServiceTourController@getTours')->name('get_tours');
    Route::get('get/tour/{id}', 'mobile\ServiceTourController@getTour')->name('get_tour');
});


Route::post('user/register', 'mobile\UserAuthController@register')->name('regiser_mobile');
Route::get('user/login', 'mobile\UserAuthController@login')->name('login_mobile');
Route::post('payment/status/callback', 'user\TraxionApiController@status_callback')->name('status_payment');

Route::get('search','mobile\UserAuthController@index');

Route::middleware('auth:api')->get('/user', function (Request $request) {
    Route::POST('payment/traxion', 'PaymentController@pay_booking');
    return $request->user();
});
Route::POST('tourismoph.payment/hotels/xxxx', 'PaymentController@pay_booking')->name('pay');
Route::POST('hotels/rooms/wishlist/wew', 'HomeController@toggle_wishlist')->name('wishlist2');





