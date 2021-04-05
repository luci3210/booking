<?php

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

Route::get('/', 'Tourismo\HomeController@index')->name('myhome');

//});

Auth::routes();


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
Route::get('/merchant/service/jayson/', 'Merchant\ServiceController@get_cover_id');
Route::get('/merchant/service/{id}', 'Merchant\ServiceController@index')->name('service');
Route::post('/merchant/service/', 'Merchant\ServiceController@savehotel')->name('service-submit');
Route::post('/merchant/service/upload_cover', 'Merchant\ServiceController@upload_cover')->name('upload_cover');

Route::post('dropzone/upload_image', 'Merchant\ServiceControllerr@upload_image')->name('dropzone.upload_image');
Route::get('dropzone/fetch_image', 'Merchant\ServiceController@fetch_image')->name('dropzone.fetch_image');
Route::get('dropzone/delete_image', 'Merchant\ServiceController@delete_image')->name('dropzone.delete');







Route::get('/page/y/dd', 'Tourismo\SettingsController@index')->name('account-setting');

Route::get('/1/subscribe', 'Tourismo\SubscribeContollrer@index')->name('subscribe');

Route::get('/1/myplan', 'Tourismo\MyplanController@index')->name('myplan');

// Route::get('/merchant/{}/services/{id}','Tourismo\ServicesController@menu')->name('services');

Route::get('/merchant/1/services/{id}', 'Tourismo\ServicesController@menu')->name('services');

Route::get('/1/services/PH-select/{id}', 'Tourismo\ServicesController@store')->name('services-id');

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/3210/logout', 'Auth\LoginController@userLogout')->name('logout');

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

    Route::get('/tourismo/ph/page/5/location/{id}/search_result/1', 'Admin\LocationController@get_country_search')->name('search_country');
    Route::get('/tourismo/ph/page/5/location/{id}/search_result/2', 'Admin\LocationController@get_region_search')->name('search_region');
    

   
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


