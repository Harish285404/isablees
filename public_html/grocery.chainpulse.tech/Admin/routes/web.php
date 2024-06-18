<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\User\GoogleSocialiteController;
use App\Http\Controllers\User\PropertyController;
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

Route::get('/', function () {
      return view('auth.login');
});

Route::get('/Login', function () {
      return view('login');
});

Route::get('/forgot-password', function () {
      return view('forgot-password');
});
Route::get('/change-password', function () {
      return view('change-password');
});

Auth::routes();

Route::get('auth/google', [GoogleSocialiteController::class, 'redirectToGoogle']);
Route::get('callback/google', [GoogleSocialiteController::class, 'handleCallback']);

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::group(['middleware' => 'admin'], function () {
      Route::get('admin', [App\Http\Controllers\Admin\AdminController::class, 'index']);
      Route::get('admin/properties', [App\Http\Controllers\Admin\AdminController::class, 'properties']);
      Route::get('admin/single-properties/{id}', [App\Http\Controllers\Admin\AdminController::class, 'single_properties']);
      Route::get('admin/profile', [App\Http\Controllers\Admin\AdminController::class, 'profile']);
      Route::get('admin/edit-profile', [App\Http\Controllers\Admin\AdminController::class, 'edit_profile']);
      Route::get('admin/change-password', [App\Http\Controllers\Admin\AdminController::class, 'change_password']);
      Route::post('admin/update-password', [App\Http\Controllers\Admin\AdminController::class, 'update_password']);
      Route::post('admin/edit-user-data/{id}', [App\Http\Controllers\Admin\AdminController::class, 'update']);
      Route::get('admin/property-provider', [App\Http\Controllers\Admin\AdminController::class, 'property_provider']);
      Route::get('admin/provider-detail', [App\Http\Controllers\Admin\AdminController::class, 'provider_detail']);
      Route::get('admin/sales-list', [App\Http\Controllers\Admin\AdminController::class, 'sales_list']);
      Route::get('admin/sales-detail/{id}', [App\Http\Controllers\Admin\AdminController::class, 'sales_detail']);
      Route::get('admin/delete-properties/{id}', [App\Http\Controllers\Admin\AdminController::class, 'delete_properties']);
      Route::get('admin/delete-properties-provider/{id}', [App\Http\Controllers\Admin\AdminController::class, 'delete_properties_provider']);

   Route::get('admin/chart', [App\Http\Controllers\Admin\AdminController::class, 'chart']);
   Route::get('admin/progress-bar', [App\Http\Controllers\Admin\AdminController::class, 'progress_bar']);
   Route::get('admin/circle-chart', [App\Http\Controllers\Admin\AdminController::class, 'circle_chart']);
   
    Route::get('admin/search/sale', [App\Http\Controllers\Admin\AdminController::class, 'get_search_result']);
     Route::get('admin/search/rent', [App\Http\Controllers\Admin\AdminController::class, 'get_rent_result']);


});

Route::group(['middleware' => 'user'], function () {
      Route::get('user', [App\Http\Controllers\User\UserController::class, 'index']);
      Route::get('user/properties', [App\Http\Controllers\User\PropertyController::class, 'properties']);
      Route::get('user/add-property', [App\Http\Controllers\User\PropertyController::class, 'index']);
      Route::post('user/add-property-data', [App\Http\Controllers\User\PropertyController::class, 'add_property']);
      Route::get('user/edit-property/{id}', [App\Http\Controllers\User\PropertyController::class, 'edit_property']);
      Route::post('user/edit-property-data', [App\Http\Controllers\User\PropertyController::class, 'update_property']);
      Route::get('user/single-properties/{id}', [App\Http\Controllers\User\PropertyController::class, 'single_properties']);
      Route::get('user/profile', [App\Http\Controllers\User\UserController::class, 'profile']);
      Route::get('user/edit-profile', [App\Http\Controllers\User\UserController::class, 'edit_profile']);
      Route::get('user/change-password', [App\Http\Controllers\User\UserController::class, 'change_password']);
      Route::post('user/update-password', [App\Http\Controllers\User\UserController::class, 'update_password']);
      Route::post('user/edit-user-data/{id}', [App\Http\Controllers\User\UserController::class, 'update']);
      Route::get('user/sales-list', [App\Http\Controllers\User\UserController::class, 'sales_list']);
      Route::get('user/sales-detail/{id}', [App\Http\Controllers\User\UserController::class, 'sales_detail']);
      Route::get('user/delete-properties/{id}', [App\Http\Controllers\User\PropertyController::class, 'delete_properties']);
       Route::get('user/progress-bar', [App\Http\Controllers\User\UserController::class, 'progress_bar']);
         Route::get('user/circle-chart', [App\Http\Controllers\User\UserController::class, 'circle_chart']);
           Route::get('user/search/sale', [App\Http\Controllers\User\PropertyController::class, 'get_search_result']);
     Route::get('user/search/rent', [App\Http\Controllers\User\PropertyController::class, 'get_rent_result']);

 



       });
