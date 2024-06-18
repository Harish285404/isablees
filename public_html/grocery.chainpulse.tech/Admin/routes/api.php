<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\CommonController;

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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });


/* Login api */ 

Route::post('login',[App\Http\Controllers\API\CommonController::class, 'login']);
    
/* Register api */ 

Route::post('signup', [App\Http\Controllers\API\CommonController::class, 'signup']);
    
/* Forgot password send otp api*/
    
Route::post('forgot_email', [App\Http\Controllers\API\CommonController::class, 'sendverificationcode']);

/* Forgot password verify otp api*/
    
Route::post('/forgot_verify_otp', [App\Http\Controllers\API\CommonController::class, 'verifyotp']);

/* Forgot change password api*/  

Route::post('/forgot_password_change',[App\Http\Controllers\API\CommonController::class, 'forgot_change_password']); 


Route::group(['middleware'=>['auth:api']],function(){
    
    Route::post('logout', [App\Http\Controllers\API\CommonController::class, 'logout']);
    
    Route::get('user_profile', [App\Http\Controllers\API\CommonController::class, 'user_details']);
    
    Route::post('update_profile', [App\Http\Controllers\API\CommonController::class, 'edituser']);
    
    Route::post('logout', [App\Http\Controllers\API\CommonController::class, 'logout']);
    
    Route::post('change_password', [App\Http\Controllers\API\CommonController::class, 'changepassword']);
    
    Route::get('properties', [App\Http\Controllers\API\PropertyController::class, 'properties']);
    
    Route::get('search_property', [App\Http\Controllers\API\PropertyController::class, 'get_search_result']);
    
    Route::get('property_details', [App\Http\Controllers\API\PropertyController::class, 'property_details']);
  
    Route::post('property_buy', [App\Http\Controllers\API\PropertyController::class, 'property_buy']);
    
    Route::get('my_property', [App\Http\Controllers\API\PropertyController::class, 'my_property']);
    
     Route::post('add_rating_like', [App\Http\Controllers\API\WishlistController::class, 'save_like']);
     
      Route::post('add_rating_dislike', [App\Http\Controllers\API\WishlistController::class, 'save_dislike']);
 
    Route::get('liked_list', [App\Http\Controllers\API\WishlistController::class, 'get_liked_list']);
    
    Route::get('disliked_list', [App\Http\Controllers\API\WishlistController::class, 'get_disliked_list']);

});



