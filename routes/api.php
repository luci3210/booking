 <?php

use FontLib\Table\Type\name;
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

Route::post('auth/login/user', 'mobile\UserAuthController@login_user')->name('login_auth');
Route::post('auth/register/user', 'mobile\UserAuthController@register_user')->name('reg_user');

Route::group(['middleware' => 'auth:sanctum'], function(){
    //All secure URL's
    Route::post('toggle/favorite/tour', 'mobile\ServiceTourMobController@toggle_favorites')->name('toggle_favs');
    Route::get('get/my/favorites', 'mobile\ServiceTourMobController@get_myfavorite')->name('get_favs');
    // favorites

    Route::post('add/booking', 'mobile\ServiceTourMobController@submit_booking')->name('submit_booking');
    Route::get('my/booking', 'mobile\ServiceTourMobController@get_booking_record')->name('my_booking');
    // booking

    Route::get('get/me', 'mobile\UserProfileController@get_myinfo')->name('get_my_profile');
    Route::post('change/pass', 'mobile\UserProfileController@change_pass')->name('change_mypass');
    Route::post('update/myprofile', 'mobile\UserProfileController@update_profile')->name('update_profile');
    // user profile
    
});
// get near by
Route::get('/get/nearby/{lat}/{lng}', 'Tourismo\HomeController@get_near_by')->name('nearByDestinations');





Route::post('traxion/pay', 'Payment\TraxionController@generate_link')->name('generate_link');

Route::post('search', 'Tourismo\HeaderSearchController@Search')->name('search');
Route::post('/auth/check-login', 'Auth\UserLoginController@checkLogin')->name('check_auth');

// standard api response
Route::prefix('service-tour')->group(function () {
    Route::get('get/tours', 'mobile\ServiceTourMobController@getTours')->name('get_tours');
    Route::get('get/tour/{tour_id}', 'mobile\ServiceTourMobController@getTourOne')->name('get_tour');
    Route::get('get/tour/nearby', 'mobile\ServiceTourMobController@getNearBy')->name('get_near');
    Route::get('get/tours/nearby', 'mobile\ServiceTourMobController@getNearByv2')->name('get_near2');
});


Route::prefix('gsp')->group(function(){
    Route::get('register','gsp\ApiController@index')->name('register_gsp');
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





