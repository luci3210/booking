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

// testing 
Route::get('/cc', function() {
    Artisan::call('cache:clear');
    return "Cache is cleared";
});


Route::get('/check/me/', 'PaymentController@getUser')->middleware('checkUserData');
Route::get('/check/geo/{lat}/{lng}', 'Tourismo\HomeController@checkgeo');


// email verfication
Auth::routes(['verify'=>true]);

Route::get('/resend-email', 'user\EmailVerificationController@showResendForm')->name('show_resend_email');
Route::post('/resend-email/verify', 'user\EmailVerificationController@resendEmailVerification')->name('resend_email');

// testing email send
Route::get('/send-email', 'email\MailSendController@mailsend')->name('test_mail');

//home
Route::get('/', 'Tourismo\HomeController@index')->name('myhome');

//navigation with pagination
Route::get('/{service}/', 'Tourismo\ServicesController@service')->name('open_services');

//navigation view all
Route::get('/{service}/view_all', 'Tourismo\ServicesController@service_get_all')->name('all_services');


Route::get('/destination/ph', 'Tourismo\HomeController@page_destination')->name('destination');



//---------- exclusive --------------------
// Route::get('/tourismo/ph', 'Tourismo\HomeController@page_destination')->name('destination');


//---------- destination --------------------
// location_local

// Route::get('/destination/{destination}', 'Tourismo\DestinationController@location')->name('location_country');



Route::get('/destination/countries', 'Tourismo\DestinationController@by_countries')->name('by_countries');

Route::get('/explore/destination/{country}', 'Tourismo\DestinationController@exploreByCountry')->name('explore_by_country');
// explore all destination by country

Route::get('/destination/{country}', 'Tourismo\DestinationController@by_country')->name('by_country');

Route::get('/destination/{country}/{district}', 'Tourismo\DestinationController@by_district')->name('by_district');

Route::get('{category}/destination/{country}/{district}/service/{name}', 'Tourismo\DestinationController@by_name')->name('by_name');

        Route::get('{category}/destination/{country}/{district}/service/{name}/book','Tourismo\DestinationController@book')
                ->name('book');



Route::get('/destination/ph', 'Tourismo\HomeController@page_destination')->name('destination');
Route::get('/destination/region/{id}/ph', 'Tourismo\HomeController@page_region')->name('region');


Route::get('/destination/region/provice/{id}/ph', 'Tourismo\HomeController@page_provice')->name('provice'); //remove

Route::get('/hotel_and_resort/ph', 'Tourismo\HomeController@page_hotels')->name('hotel_and_resort');
Route::get('/tour_operators/ph', 'Tourismo\HomeController@page_tour_operator')->name('tour_operator');

Route::get('/hotels/rooms/{id}', 'Tourismo\RoomsController@index')->name('tourismo_room');
Route::get('/tour-package/{id}', 'Tourismo\TourPackageController@index')->name('tourimos_tour_package');

Route::get('/service-tour/explore/{id}', 'Tourismo\ServiceTourController@index')->name('service_tour_view');

Route::POST('/wishlist/toggle', 'user\WishListController@toggle_wishlist')->name('toggle_wishlist');

Route::POST('payment/hotels/xxxx', 'PaymentController@pay_booking')->name('pay2')->middleware('checkUserData','checkEmailVerified');
Route::POST('payment/hotels/xxxaaa', 'PaymentController@traxion')->name('traxion_pay')->middleware('checkUserData','checkEmailVerified');

Route::get('/tourismoph/hotel/{id}', 'Tourismo\HomeController@hotel_details')->name('tourismo-hotel-details');

Route::get('/invoice/download','user\TraxionApiController@invoice_copy')->name('invoice_payment');
Route::get('/invoice/download-test','user\TraxionApiController@invoice_copy2')->name('invoice_payment_test');


//});

Auth::routes();
// success payment traxion 
Route::get('/checkout/status', 'user\TraxionApiController@payment_status')->name('checkout_callback');

#merchant---

Route::group(['middleware'=>'jobs','jobs'=>['merchant'], 'prefix'=>'tourismo/'], function() {
        Route::get('/merchant','Merchant\ProfileController@redi')->name('merchant_redi');
});



#service profile---
Route::group(['middleware'=>'jobs','jobs'=>['merchant'], 'prefix'=>'merchant.dashboard/profile/s/service/'], function() {

    Route::get('/create/{id}','Merchant\ProfileServicesController@index')->name('sp_select');
    Route::post('/created/{id}','Merchant\ProfileServicesController@create_service')->name('sp_m_create');
    Route::get('/{id}/edit','Merchant\ProfileServicesController@edit_service')->name('sp_m_edit');
    Route::post('/{id}/update','Merchant\ProfileServicesController@update_service')->name('sp_m_update');
    Route::get('/{id}/details','Merchant\ProfileServicesController@request_details')->name('sp_m_details');

});



// profile---
Route::group(['middleware'=>'jobs','jobs'=>['merchant'], 'prefix'=>'merchant/profile'], function() {
        
    #profile---
    Route::get('/profile/','Merchant\ProfileController@index')->name('profile_index');

    Route::get('/update_profile','Merchant\ProfileController@profile_form')
    ->name('profile_form');

    Route::post('/profile_create/{id}','Merchant\ProfileController@profile_create')
    ->name('m_profile_create');  



    Route::post('/profile','Merchant\ProfileController@profile_form_submit')
    ->name('profile_submit');

    Route::post('/profile_update/{id}','Merchant\ProfileController@profile_form_update')
    ->name('profile_update');

    Route::post('/profile_update_permit','Merchant\ProfileController@merchant_permit')
    ->name('merchant_permit_submit');

    #contact---

    Route::get('/contact_form','Merchant\ProfileContactController@contact_form')->name('profile_contact_form');

    Route::post('/contact_form','Merchant\ProfileContactController@contact_create')->name('profile_contact_create');

    Route::get('/contact_edit/{id}','Merchant\ProfileContactController@contact_edit')->name('profile_contact_edit');

    Route::post('/contact_update/{id}','Merchant\ProfileContactController@contact_update')->name('profile_contact_update');

    Route::get('/contact_delete/{id}','Merchant\ProfileContactController@contact_delete')->name('profile_contact_delete');

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


Route::group(['middleware'=>'jobs','jobs'=>['merchant'], 'prefix'=>'merchant.dashboard/service'], function() {
        
        #post services and exclusive
    Route::get('/{destination}/','Merchant\ServiceListingController@index')
        ->name('service_listing');

    Route::post('/{id}/delete_post','Merchant\ServiceListingController@delete_post')
        ->name('m_delete_post');

    Route::post('/merchant/service/upload_photos/{id}', 'Merchant\ServiceListingController@upload_service_photos')
        ->name('m_upload_service_photos');

    Route::get('/merchant/upload_cover_photos/{id}/{upload_id}/', 'Merchant\ServiceListingController@upload_service_cover')
        ->name('m_upload_service_cover');

    Route::get('/{service_name}/edit_content/{content_id}/', 'Merchant\ServiceListingController@edit_content_post')
        ->name('m_edit_hotel_content');

    Route::post('update_content/{content_id}/', 'Merchant\ServiceListingController@update_content_post')
        ->name('m_update_hotel_content');

    Route::get('/hotel_and_resort/edit_cover/{cover_id}/', 'Merchant\ServiceListingController@edit_cover_post')
        ->name('m_edit_cover_post');

    Route::post('create_post_hotel/{id}','Merchant\ServiceListingController@service_save_hotel')
        ->name('service_listing_save_hotel');

    Route::get('/{destination}/create_service_post','Merchant\ServiceListingController@create_service')
        ->name('m_create_post');

     Route::get('/{id}/upload_photos/{description}','Merchant\ServiceListingController@service_update_photos')
        ->name('m_act_upload_photos');



        

        Route::get('/{destination}/{id}/delete','Merchant\ServiceListingController@delete_post')
        ->name('delete_post');

        Route::get('{destination}/{id}/create_cover/','Merchant\ServiceListingController@create_cover')
        ->name('add_cover');

        Route::post('upload_cover/{id}/{upload_id}/','Merchant\ServiceListingController@upload_cover')
        ->name('upload-cover');

        Route::get('/{destination}/create_post','Merchant\ServiceListingController@service_create_post')
        ->name('service_listing_create_post');


        
        



        Route::post('create_post/{id}','Merchant\ServiceListingController@service_save_post')
        ->name('service_listing_save_post');

       









        Route::post('/merchant/service/upload_service_photos/{id}', 'Merchant\ServiceListingController@service_upload_photos')
        ->name('service_upload_photos');

        Route::post('/editor_upload_photos', 'Merchant\ServiceListingController@editor_upload_photo')
        ->name('editor_upload_photo');



        Route::post('exlusive_save_post/{id}','Merchant\ServiceListingController@exlusive_create_post')
        ->name('exlusive_save_post');

});

Route::group(['middleware'=>'jobs','jobs'=>['merchant'], 
    'prefix'=>'merchant.dashboard/tph/finance/u/0/'], function() {
        
    // Route::get('/incomex','Merchant\FinanceController@incomeIndex')
        // ->name('income_index');

    Route::get('/income','Merchant\FinanceController@income')->name('income_index');

    Route::get('merchant.withdraw','Merchant\FinanceController@withdraw')->name('mch_withdraw');
    Route::post('merchant.withdraw','Merchant\FinanceController@withdraw_submit')->name('mch_withdraw_submit');
        
});

Route::group(['middleware'=>'password.confirm','jobs','jobs'=>['merchant'], 
    'prefix'=>'merchant.dashboard/tph/finance'], function() {

    Route::get('/bank','Merchant\FinanceController@bank')->name('bank');

    Route::post('/bank/create','Merchant\FinanceController@merchant_bank_create')->name('merchant_bank_create');
    
    Route::get('/mybalance/','Merchant\FinanceController@mybalance')->name('mybalance');

});



Route::group(['middleware'=>'jobs','jobs'=>['merchant'], 'prefix'=>'merchant_dashboard/booking'], function() {

    Route::get('/booking/{service}/{payment}/{status}/{refid}','Merchant\BookingController@index')
    ->name('booking-index');

    Route::get('/search','Merchant\BookingController@search_status_date')
    ->name('bookingserach');

    Route::get('/{product_name}/getdetails/{pm_id}','Merchant\BookingController@getdetails')
    ->name('booking_getdetails');


    Route::get('/new_booking','Merchant\BookingController@newbooking')->name('poster_new_booking');
    Route::get('/new_booking/{id}/to_confirm', 'Merchant\BookingController@to_confirm')->name('poster_to_confirm');
    Route::post('/new_booking/confirmed', 'Merchant\BookingController@to_confirmed')->name('poster_confirmed');
    
    Route::get('/confirm_booking', 'Merchant\BookingController@confirmbooking')->name('poster_confirmbooking');
    Route::get('/confirm_booking/{id}/details', 'Merchant\BookingController@confirmbooking_detail');

    Route::get('/today_reserved', 'Merchant\BookingController@todaybookingreserved')->name('poster_todayreserved');

    Route::get('/complete_booking', 'Merchant\BookingController@completebooking')->name('poster_completebooking');

});




// ---------------------------------address
Route::group(['middleware'=>'jobs','jobs'=>['merchant'], 'prefix'=>'merchantz/profile'], function() {

   Route::get('/address','Merchant\AddressController@addressCreateForm')
        ->name('create_address');


   Route::post('/address','Merchant\AddressController@addressSubmitForm')
        ->name('submit_address_form');
   
   Route::get('/address/delete/{id}','Merchant\AddressController@addressDelete')
        ->name('delete_address');        
});

// ---------------------------------services

Route::group(['middleware'=>'jobs','jobs'=>['merchant'], 'prefix'=>'merchant/service'], function() {

   Route::get('/','Merchant\ServiceController@home')
        ->name('m-services');

   Route::get('/{id}/addnew', 'Merchant\ServiceController@index')->name('m-service-list');
     
});



// reviews
Route::post('/review/hotel/submit', 'user\ReviewsController@sumbitHotelReview')->name('hotel_review');
Route::post('/service-tour/review/submit', 'user\ReviewsController@submitReviews')->name('service_tour_review');
// reviews




Route::get('/merchant', 'Merchant\UserController@index')->name('m-user');

Route::post('/merchantz/profile', 'Merchant\UserController@profiles')->name('profile-save');

Route::patch('/merchantz/profile/{id}', 'Merchant\UserController@profile_update')->name('profile-update');
Route::get('/merchantz/profile/add-contact', 'Merchant\UserController@profile_contacts')->name('profile-contact');
Route::post('/merchantz/profile/add-contact-submit', 'Merchant\UserController@profile_contacts_save')->name('profile-contact-add');
Route::get('/merchantz/profile/edit-contact/{id}', 'Merchant\UserController@profile_contacts_edit')->name('profile-contact-edit');
Route::patch('/merchantz/profile/edit-contact/{id}', 'Merchant\UserController@profile_contacts_update')->name('profile-contact-update');
Route::get('/merchantz/profile/delete-contact/{id}', 'Merchant\UserController@profile_contacts_delete')->name('profile-contact-delete');

Route::get('/merchantz/profile/add-address', 'Merchant\UserController@profile_addresses')->name('profile-address');
Route::post('/merchantz/profile/add-address-submit', 'Merchant\UserController@profile_address_save')->name('profile-address-add');
Route::get('/merchantz/profile/edit-address/{id}', 'Merchant\UserController@profile_address_edit')->name('profile-address-edit');
Route::patch('/merchantz/profile/edit-address/{id}', 'Merchant\UserController@profile_address_update')->name('profile-address-update');
Route::get('/merchantz/profile/delete-address/{id}', 'Merchant\UserController@profile_address_delete')->name('profile-address-delete');

Route::post('/merchantz/profile/picture', 'Merchant\UploadController@crop')->name('profile-pic-crop');

//SERVISES
Route::get('/merchantz/services/jayson/', 'Merchant\ServiceController@get_cover_id'); //extra


Route::post('/merchantz/services/', 'Merchant\ServiceController@savehotel')->name('service-submit');
Route::post('/merchant/service/tour', 'Merchant\ServiceController@savetour')->name('service_tour_submit');

Route::post('/merchantz/service/upload_cover', 'Merchant\ServiceController@upload_cover')->name('upload_cover');
Route::post('/merchantz/service/upload_tour_photos', 'Merchant\ServiceController@upload_tour_photos')->name('tour_photos');

//BOOKING

Route::get('/merchantx/booking/booked', 'Merchant\BookingController@booked')->name('merchant_booked');


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
Route::post('/3210/logout', 'Auth\LoginController@userLogout')->name('merchant_logout');


//Other route
Route::prefix('merchant')->group(function () {

    Route::get('/plan', 'Other\PlanContoller@index')->name('other-plan');
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
    Route::get('/{service}/{status}/reviews/index', 'user\ReviewsController@index')->name('reviews_index');
    Route::get('/booking/{service}/{payment}/{status}/index', 'user\UserBookingController@index')->name('booking_index');

    Route::get('/profile', 'Tourismo\AccountController@profile')->name('accnt_profile');
    Route::post('/upload/new/photo', 'Tourismo\AccountController@change_profile_pic')->name('user_profile_upload');
    Route::patch('/profile/update/{id}', 'Tourismo\AccountController@accnt_profile_update')->name('accnt_profile_update');
});

// --------------------------------------ADMIN---------------------------------------

// location
Route::prefix('administrator/tph.dashboard')->group(function () { 
    Route::get('ml/location/{id}', 'Admin\LocationController@index')->name('locations');
    Route::post('ml/country/deleted/{id}', 'Admin\LocationController@deleted_country')->name('delete_country');
});


Route::prefix('administrator/tph')->group(function () {

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

Route::get('/tourismo/merchant/verification/{id}','Admin\VerificationRequestController@verification_edit_view')
        ->name('merchant_verification_edit_view');


Route::post(
        '/tourismo/merchant/verification/{id}', 
        'Admin\VerificationRequestController@verification_update')
        ->name('verification_update');

        


    // Route::get('/tourismo/ph/page/4/inclusion/{id}/www/facilities/edit/{idt}', 'Admin\InclusionController@roomfacilities_edit')->name('facilities_edit');

    // Dashboard route


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

    #posting-request
    Route::get('/get_request/{url}/','Admin\PostRequestController@index')->name('get_posting_request');  
    Route::get('/{id}/view_request/{url}/','Admin\PostRequestController@posting_check')->name('view_posting');  
    Route::post('/{id}/update_request/{url}/','Admin\PostRequestController@update_posting_status')->name('update_posting'); 

    #manage bank
    Route::get('/manage_bank/{url}/','Admin\ManageBankController@index')->name('manage_bank'); 
    Route::post('/manage_bank/create/{url}/','Admin\ManageBankController@create')->name('bank_create'); 
    Route::get('/manage_bank/edit/{id}/{url}/','Admin\ManageBankController@edit')->name('bank_edit'); 
    Route::post('/manage_bank/update/{id}/{url}/','Admin\ManageBankController@update')->name('bank_update'); 
    Route::post('/manage_bank/delete/{id}/','Admin\ManageBankController@deleted')->name('bank_deleted'); 

    Route::get('/manage_charges/selected','Admin\ChargesController@index')->name('adm_charges'); 
    // Route::get('/manage_charges/selected/{id}','Admin\ChargesController@get_charges')->name('adm_get_charges'); 

    Route::get('/manage_charges/color/{id}/edit', 'Admin\ChargesController@get_charges')->name('color.update');
    Route::post('/manage_charges/color', 'Admin\ChargesController@edit')->name('adm_update_charge');
    

Route::get('/booking/between', 'Admin\BookingController@show_data_search_booking')->name('show_search_booking');
Route::get('/booking/{id}/booking', 'Admin\BookingController@execute_date')->name('execute_date');

});

Route::prefix('administrator/tph.dashboard')->group(function () { 

    Route::get('/', 'AdminController@index')->name('admin.dashboard');

    });

// -------------------------------BOOKING--------------------------

Route::prefix('booking.administrator/tph.booking')->group(function () { 

    Route::get('/new-booking', 'Admin\BookingController@index')->name('show_booking');
    Route::get('/confirm-booking', 'Admin\BookingController@confirm_booking')->name('adm_confirm_booking');
    Route::get('/execute-booking', 'Admin\BookingController@execute_booking')->name('adm_execute_booking');
    Route::get('/execute-this/{pm_id}', 'Admin\BookingController@execute_this_booking')->name('adm_execute_this');
    Route::post('/execute-confirm/{pm_id}', 'Admin\BookingController@execute_confirm')->name('adm_execute_confirm');

});

// -------------------------------FINANCE--------------------------

Route::prefix('finance.administrator/tph.finance')->group(function () { 

    Route::get('/index', 'Admin\FinanceController@income')->name('adm_income');
    Route::get('/index.withdrawal/request', 'Admin\FinanceController@withdrawals')->name('adm_withdrawal_request');
    Route::get('/index.withdrawal/{id}/request/get', 'Admin\FinanceController@withdrawal_get_request')->name('adm_withdrawal_get_request');
    Route::post('/index.withdrawal/validate/request', 'Admin\FinanceController@withdrawal_validate')->name('adm_withdrawal_validate_request');
    Route::post('/index.withdrawal/validated/post/request', 'Admin\FinanceController@withdrawal_validate_update')->name('adm_withdrawal_validated_post_request');

});


// Route::group(['middleware'=>'jobs','jobs'=>['admin'], 'prefix'=>'admin321?/posting_request'], function() {
//    Route::get('/view_request','Admin\PostRequestController@index')->name('view_posting_request');  
// });



Route::get('/token', function (Request $request) {
    $token = $request->session()->token();

    $token = csrf_token();

    // ...
});