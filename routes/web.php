<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('welcome');

// email verfication
Auth::routes(['verify'=>true]);

Route::get('/resend-email', 'user\EmailVerificationController@showResendForm')->name('show_resend_email');
Route::post('/resend-email/verify', 'user\EmailVerificationController@resendEmailVerification')->name('resend_email');

// testing email send
Route::get('/send-email', 'email\MailSendController@mailsend')->name('test_mail');

//home
Route::get('/', 'Tourismo\HomeController@index')->name('myhome');

//navigation menu
Route::get('/{service}/', 'Tourismo\ServicesController@service')->name('open_services');

Route::get('/destination/ph', 'Tourismo\HomeController@page_destination')->name('destination');



//---------- exclusive --------------------
// Route::get('/tourismo/ph', 'Tourismo\HomeController@page_destination')->name('destination');


//---------- destination --------------------
Route::get('/destination/ph', 'Tourismo\HomeController@page_destination')->name('destination');
Route::get('/destination/region/{id}/ph', 'Tourismo\HomeController@page_region')->name('region');
Route::get('/destination/region/provice/{id}/ph', 'Tourismo\HomeController@page_provice')->name('provice');



Route::get('/hotel_and_resort/ph', 'Tourismo\HomeController@page_hotels')->name('hotel_and_resort');
Route::get('/tour_operators/ph', 'Tourismo\HomeController@page_tour_operator')->name('tour_operator');

Route::get('/hotels/rooms/{id}', 'Tourismo\RoomsController@index')->name('tourismo_room');
Route::get('/tour-package/{id}', 'Tourismo\TourPackageController@index')->name('tourimos_tour_package');
Route::POST('/wishlist/toggle', 'user\WishListController@toggle_wishlist')->name('toggle_wishlist');
Route::POST('payment/hotels/xxxx', 'PaymentController@pay_booking')->name('pay2');
Route::get('/tourismoph/hotel/{id}', 'Tourismo\HomeController@hotel_details')->name('tourismo-hotel-details');

Route::get('/invoice','user\TraxionApiController@invoice_copy')->name('invoice_payment');


//});

Auth::routes();
// success payment traxion 
Route::get('checkout', 'user\TraxionApiController@payment_status')->name('checkout_callback');



#merchant---
Route::group(['middleware'=>'jobs','jobs'=>['buyer','merchant'], 'prefix'=>'merchant_dashboard/profile'], function() {

        #profile---

        Route::get('/profile','Merchant\ProfileController@index')
        ->name('profile_index');

        Route::get('/profile_form','Merchant\ProfileController@profile_form')
        ->name('profile_form');

        Route::post('/profile','Merchant\ProfileController@profile_form_submit')
        ->name('profile_submit');

        Route::post('/profile_update','Merchant\ProfileController@profile_form_update')
        ->name('profile_update');

        Route::post('/profile_','Merchant\ProfileController@merchant_permit')
        ->name('merchant_permit_submit');

        #contact---

        Route::get('/contact_form','Merchant\ProfileContactController@contact_form')
        ->name('profile_contact_form');

        Route::post('/contact_form','Merchant\ProfileContactController@contact_create')
        ->name('profile_contact_create');

        Route::get('/contact_edit/{id}','Merchant\ProfileContactController@contact_edit')
        ->name('profile_contact_edit');

        Route::post('/contact_update/{id}','Merchant\ProfileContactController@contact_update')
        ->name('profile_contact_update');

        Route::get('/contact_delete/{id}','Merchant\ProfileContactController@contact_delete')
        ->name('profile_contact_delete');

        #address--- 

        Route::get('/address_form','Merchant\ProfileAddressController@address_form')
        ->name('profile_address_form');

        Route::post('/address_form','Merchant\ProfileAddressController@address_create')
        ->name('profile_address_form_update');

        Route::get('/address_edit/{id}','Merchant\ProfileAddressController@address_edit')
        ->name('profile_address_edit');

        Route::post('/address_update/{id}','Merchant\ProfileAddressController@address_update')
        ->name('profile_address_update');

        Route::get('/address_delete/{id}','Merchant\ProfileAddressController@address_delete')
        ->name('address_delete');

});


Route::group(['middleware'=>'jobs','jobs'=>['buyer','merchant'], 'prefix'=>'merchant_dashboard/service'], function() {

        #services---
        Route::get('/{destination}/','Merchant\ServiceListingController@index')
        ->name('service_listing');

        Route::get('/{destination}/create_post','Merchant\ServiceListingController@service_create_post')
        ->name('service_listing_create_post');

        Route::post('create_post/{id}','Merchant\ServiceListingController@service_save_post')
        ->name('service_listing_save_post');

        Route::get('/{id}/upload_photos/{description}','Merchant\ServiceListingController@service_update_photos')
        ->name('act_upload_photos');

        Route::post('/merchant/service/upload_photos/{id}', 'Merchant\ServiceListingController@service_upload_photos')
        ->name('service_upload_photos');

        Route::post('create_post_hotel/{id}','Merchant\ServiceListingController@service_save_hotel')
        ->name('service_listing_save_hotel');


        Route::post('exlusive_save_post/{id}','Merchant\ServiceListingController@exlusive_create_post')
        ->name('exlusive_save_post');

});



Route::group(['middleware'=>'jobs','jobs'=>['buyer','merchant'], 'prefix'=>'merchant_dashboard/manage_booking'], function() {

        Route::get('/booking/','Merchant\BookingController@index')
        ->name('booking-index');

});



















// ---------------------------------address
Route::group(['middleware'=>'jobs','jobs'=>['buyer','merchant'], 'prefix'=>'merchant/profile'], function() {

   Route::get('/address','Merchant\AddressController@addressCreateForm')
        ->name('create_address');


   Route::post('/address','Merchant\AddressController@addressSubmitForm')
        ->name('submit_address_form');
   
   Route::get('/address/delete/{id}','Merchant\AddressController@addressDelete')
        ->name('delete_address');        
});

// ---------------------------------services

Route::group(['middleware'=>'jobs','jobs'=>['buyer','merchant'], 'prefix'=>'merchant/service'], function() {

   Route::get('/','Merchant\ServiceController@home')
        ->name('m-services');

   Route::get('/{id}/addnew', 'Merchant\ServiceController@index')->name('m-service-list');
     
});



// reviews
Route::post('/review/hotel/submit', 'user\ReviewsController@sumbitHotelReview')->name('hotel_review');
// reviews




Route::get('/merchant', 'Merchant\UserController@index')->name('m-user');

Route::post('/merchant/profile', 'Merchant\UserController@profiles')->name('profile-save');

Route::patch('/merchant/profile/{id}', 'Merchant\UserController@profile_update')->name('profile-update');
Route::get('/merchant/profile/add-contact', 'Merchant\UserController@profile_contacts')->name('profile-contact');
Route::post('/merchant/profile/add-contact-submit', 'Merchant\UserController@profile_contacts_save')->name('profile-contact-add');
Route::get('/merchant/profile/edit-contact/{id}', 'Merchant\UserController@profile_contacts_edit')->name('profile-contact-edit');
Route::patch('/merchant/profile/edit-contact/{id}', 'Merchant\UserController@profile_contacts_update')->name('profile-contact-update');
Route::get('/merchant/profile/delete-contact/{id}', 'Merchant\UserController@profile_contacts_delete')->name('profile-contact-delete');

Route::get('/merchant/profile/add-address', 'Merchant\UserController@profile_addresses')->name('profile-address');
Route::post('/merchant/profile/add-address-submit', 'Merchant\UserController@profile_address_save')->name('profile-address-add');
Route::get('/merchant/profile/edit-address/{id}', 'Merchant\UserController@profile_address_edit')->name('profile-address-edit');
Route::patch('/merchant/profile/edit-address/{id}', 'Merchant\UserController@profile_address_update')->name('profile-address-update');
Route::get('/merchant/profile/delete-address/{id}', 'Merchant\UserController@profile_address_delete')->name('profile-address-delete');

Route::post('/merchant/profile/picture', 'Merchant\UploadController@crop')->name('profile-pic-crop');

//SERVISES
Route::get('/merchant/services/jayson/', 'Merchant\ServiceController@get_cover_id'); //extra


Route::post('/merchant/services/', 'Merchant\ServiceController@savehotel')->name('service-submit');
Route::post('/merchant/service/tour', 'Merchant\ServiceController@savetour')->name('service_tour_submit');

Route::post('/merchant/service/upload_cover', 'Merchant\ServiceController@upload_cover')->name('upload_cover');
Route::post('/merchant/service/upload_tour_photos', 'Merchant\ServiceController@upload_tour_photos')->name('tour_photos');

//BOOKING

Route::get('/merchant/booking/booked', 'Merchant\BookingController@booked')->name('merchant_booked');


Route::post('dropzone/upload_image', 'Merchant\ServiceControllerr@upload_image')->name('dropzone.upload_image');
Route::get('dropzone/fetch_image', 'Merchant\ServiceController@fetch_image')->name('dropzone.fetch_image');
Route::get('dropzone/delete_image', 'Merchant\ServiceController@delete_image')->name('dropzone.delete');

Route::get('/merchant/location/region/select/{id}', 'Merchant\ServiceController@find_region_id')->name('find_region_id');
Route::get('/merchant/location/district/select/{id}', 'Merchant\ServiceController@find_district_id')->name('find_district_id');
Route::get('/merchant/location/city/select/{id}', 'Merchant\ServiceController@find_city_id')->name('find_city_id');
Route::get('/merchant/location/municipality/select/{id}', 'Merchant\ServiceController@find_municipality_id')->name('find_municipality_id');
Route::get('/merchant/location/barangay/select/{id}', 'Merchant\ServiceController@find_barangay_id')->name('find_barangay_id');


Route::get('/page/y/dd', 'Tourismo\SettingsController@index')->name('account-setting');

Route::get('/1/subscribe', 'Tourismo\SubscribeContollrer@index')->name('subscribe');

Route::get('/1/myplan', 'Tourismo\MyplanController@index')->name('myplan');

// Route::get('/merchant/{}/services/{id}','Tourismo\ServicesController@menu')->name('services');

Route::get('/merchant/1/services/{id}', 'Tourismo\ServicesController@menu')->name('services');

Route::get('/1/services/PH-select/{id}', 'Tourismo\ServicesController@store')->name('services-id');

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/3210/logout', 'Auth\LoginController@userLogout')->name('logout');


//Other route
Route::prefix('merchant')->group(function () {

    Route::get('/subscription_plan', 'Other\PlanContoller@index')->name('other-plan');
    Route::get('/subscription_plan/step-1/{id}/plan','Tourismo\SubscribeContollrer@subscribe')->name('subscribe-steps');
    Route::post('/subscription_plan/step-1/submit','Tourismo\SubscribeContollrer@add_subscribe')->name('subscribe-submit');

    
    });

// --------------------------------------- PAYMENT -------------------------------------


Route::prefix('tourismoph.payment')->group(function () {

    Route::get('/hotels/xxx', 'PaymentController@sssss')->name('xxxx');
    Route::POST('/hotels/xxxx', 'PaymentController@pay_booking')->name('xxx');


});

// --------------------------------------- ACCOUNT -------------------------------------


Route::prefix('account')->middleware('auth')->group(function () {
    Route::get('/wishlist/index', 'user\WishListController@index')->name('wishlist_index'); // wishlist
    Route::get('/reviews/index', 'user\ReviewsController@index')->name('reviews_index');
    Route::get('/booking/index', 'user\UserBookingController@index')->name('booking_index');

    Route::get('/profile', 'Tourismo\AccountController@profile')->name('accnt_profile');
    Route::post('/upload/new/photo', 'Tourismo\AccountController@change_profile_pic')->name('user_profile_upload');
    Route::patch('/profile/update/{id}', 'Tourismo\AccountController@accnt_profile_update')->name('accnt_profile_update');
});



// --------------------------------------ADMIN---------------------------------------

Route::prefix('admin')->group(function () {

    Route::get('/tourismo/ph/page/1/product', 'Admin\ProductController@index')->name('product');
    Route::get('/tourismo/ph/page/1/product/www/create', 'Admin\ProductController@create')->name('product-create');
    Route::post('/tourismo/ph/page/1/product/www/submit', 'Admin\ProductController@store')->name('product-store-save');
    Route::get('/tourismo/ph/page/1/product/www/edit/{id}', 'Admin\ProductController@edit')->name('product-store-edit');
    Route::patch('/tourismo/ph/page/1/product/www/edit/{id}', 'Admin\ProductController@update')->name('product-store-update');
    Route::get('/tourismo/ph/page/1/product/www/delete/{id}', 'Admin\ProductController@delete')->name('product-store-delete');

    Route::get('/tourismo/ph/page/2/plan/package', 'Admin\PlanpackageController@index')->name('planpackage');
    Route::get('/tourismo/ph/page/2/plan/package/www/create', 'Admin\PlanpackageController@create')->name('planpackage-create');
    Route::post('/tourismo/ph/page/2/plan/package/www/submit', 'Admin\PlanpackageController@store')->name('planpackage-save');
    Route::get('/tourismo/ph/page/2/plan/package/www/edit/{id}', 'Admin\PlanpackageController@edit')->name('planpackage-edit');
    Route::patch('/tourismo/ph/page/2/plan/package/www/edit/{id}', 'Admin\PlanpackageController@update')->name('planpackage-update');
    Route::get('/tourismo/ph/page/2/plan/package/www/delete/{id}', 'Admin\PlanpackageController@delete')->name('planpackage-delete');

    Route::get('/tourismo/ph/page/3/laod-plan-package', 'Admin\PlanController@datapackage')->name('datapackage');

    Route::get('/tourismo/ph/page/3/plan', 'Admin\PlanController@index')->name('plan');
    Route::get('/tourismo/ph/page/3/plan/www/create', 'Admin\PlanController@create')->name('plan-create');
    Route::post('/tourismo/ph/page/3/plan/www/submit', 'Admin\PlanController@store')->name('plan-save');
    Route::get('/tourismo/ph/page/3/plan/www/edit/{id}', 'Admin\PlanController@edit')->name('plan-edit');
    Route::patch('/tourismo/ph/page/3/plan/www/edit/{id}', 'Admin\PlanController@update')->name('plan-update');
    Route::get('/tourismo/ph/page/3/plan/www/delete/{id}', 'Admin\PlanController@delete')->name('plan-delete');

    //inclusions
    Route::get('/tourismo/ph/page/4/inclusion/{id}', 'Admin\InclusionController@index')->name('inclusion');
    Route::post('/tourismo/ph/page/4/inclusion/room/www/submit', 'Admin\InclusionController@roomfacilities_save')->name('facilities_save');
    Route::post('/tourismo/ph/page/4/inclusion/build/www/submit', 'Admin\InclusionController@buildingfacilities_save')->name('builfaci_save');
    Route::post('/tourismo/ph/page/4/inclusion/package/www/submit', 'Admin\InclusionController@package_save')->name('package_save');

    //location
    Route::get('/tourismo/ph/page/5/location/{id}', 'Admin\LocationController@index')->name('locations');

    Route::post('/tourismo/ph/page/5/location/submit/{id}', 'Admin\LocationController@store_country_state')->name('store_country_state');
    Route::post('/tourismo/ph/page/5/location/submit/region/{id}', 'Admin\LocationController@store_region')->name('submit_region');
    Route::post('/tourismo/ph/page/5/location/submit/district/{id}', 'Admin\LocationController@store_district')->name('submit_district');
    Route::post('/tourismo/ph/page/5/location/submit/city/{id}', 'Admin\LocationController@store_city')->name('submit_city');
    Route::post('/tourismo/ph/page/5/location/submit/municipality/{id}', 'Admin\LocationController@store_municipality')->name('submit_municipality');
    Route::post('/tourismo/ph/page/5/location/submit/barangay/{id}', 'Admin\LocationController@store_barangay')->name('submit_barangay');

    Route::get('/tourismo/ph/page/5/location/{id}/search_result/1', 'Admin\LocationController@get_country_search')->name('search_country');
    Route::get('/tourismo/ph/page/5/location/{id}/search_result/2', 'Admin\LocationController@get_region_search')->name('search_region');

    Route::get('/location/region/select/{id}', 'Admin\LocationController@find_region_id')->name('find_region_id');
    Route::get('/location/district/select/{id}', 'Admin\LocationController@find_district_id')->name('find_district_id');
    Route::get('/location/city/select/{id}', 'Admin\LocationController@find_city_id')->name('find_city_id');
   
    Route::get('/location/municipality/select/{id}', 'Admin\LocationController@find_municipality_id')->name('find_municipality_id');

    // Route::get('/location/region/selecta', [\App\Http\Livewire\Location::class,'render'])->name('asas.ss');

// ---------------------- EXCLUSIVE -----------------------------

Route::get(
        '/tourismo/exlusive/update_form', 
        'Admin\ExclusiveController@update_form')
        ->name('update_form');  

Route::post(
        '/tourismo/exlusive/update_submit', 
        'Admin\ExclusiveController@exclusive_update_submit')
        ->name('exclusive_update_submit');

// ---------------------- DESTINATION -----------------------------

Route::get(
        '/tourismo/destination/provices/a/{id}', 
        'Admin\LocationController@find_district_for_destination');

Route::get(
        '/tourismo/destination/addnew', 
        'Admin\DestinationController@destination_form')
        ->name('destination_addnew');  
 
Route::post(
        '/tourismo/destination/addnedw', 
        'Admin\DestinationController@destination_submit_form')
        ->name('destination_submit_form');

// ---------------------- BANNER -----------------------------

Route::get(
        '/tourismo/banner/addnew', 
        'Admin\BannerController@banner_form')
        ->name('banner_form');  

Route::post(
        '/tourismo/banner/addnew', 
        'Admin\BannerController@banner_submit_form')
        ->name('banner_submit_form');  

//------------------------ Verificatio request ----------------

        
Route::get('/tourismo/merchant/verification_list', 'Admin\VerificationRequestController@index')->name('merchant_verification');

Route::get(
        '/tourismo/merchant/verification/{id}', 
        'Admin\VerificationRequestController@verification_edit_view')
        ->name('merchant_verification_edit_view');


Route::post(
        '/tourismo/merchant/verification/{id}', 
        'Admin\VerificationRequestController@verification_update')
        ->name('verification_update');

        


    // Route::get('/tourismo/ph/page/4/inclusion/{id}/www/facilities/edit/{idt}', 'Admin\InclusionController@roomfacilities_edit')->name('facilities_edit');

    // Dashboard route
    Route::get('/', 'AdminController@index')->name('admin.dashboard');

    // Login routes
    Route::get('/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
    Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');

    // Logout route
    Route::post('/logout', 'Auth\AdminLoginController@logout')->name('admin.logout');

    // Register routes
    Route::get('/register', 'Auth\AdminRegisterController@showRegistrationForm')->name('admin.register');
    Route::post('/register', 'Auth\AdminRegisterController@register')->name('admin.register.submit');

    // Password reset routes
    Route::get('/password/reset', 'Auth\AdminForgotPasswordController@showLinkRequestForm')->name('admin.password.request');
    Route::post('/password/email', 'Auth\AdminForgotPasswordController@sendResetLinkEmail')->name('admin.password.email');
    Route::get('/password/reset/{token}', 'Auth\AdminResetPasswordController@showResetForm')->name('admin.password.reset');
    Route::post('/password/reset', 'Auth\AdminResetPasswordController@reset')->name('admin.password.update');
});



Route::get('/token', function (Request $request) {
    $token = $request->session()->token();

    $token = csrf_token();

    // ...
});