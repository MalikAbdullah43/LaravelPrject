<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\login;
use App\Http\Controllers\signup;
use App\Http\controllers\searchpost;
use App\Http\Controllers\editpost;
use App\Http\Controllers\updatecontroller;
use App\Http\Controllers\create_post_controller;
use App\Http\Controllers\log_out_controller;
use App\Http\Controllers\update_post_controller;
use App\Http\Controllers\delete_post_controller;
use App\Http\Controllers\view_data_controller;
use App\Http\Controllers\get_user_data_controller;
use App\Http\Controllers\update_user_controller;
use App\Http\Controllers\user_comment_controller;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});



/**
 *  create a new post
 */

Route::post('/createpost',[create_post_controller::class,'create_post']);


/**
 * update post Route
 */
Route::post('/updatepost',[update_post_controller::class,'index']);

/**
 * delete post Route
 */

Route::post('/deletepost',[delete_post_controller::class,'delete_post']);

/**
 * get all posts
 */
 Route::post('/getdata',[view_data_controller::class,'get']);
/**
 * signup route
 */
Route::post('/signup',[signup::class,'user_signup']);

/**
 * login route
 */

Route::post('/login',[login::class,'user_login']);

/**
 * logout route
 */

Route::post('/logout',[log_out_controller::class,'log_out']);

/**
 * get all user information
 */
Route::post('/getuser',[get_user_data_controller::class,'get_data']);

/**
 * update user
 */
Route::post('/updateuser',[update_user_controller::class,'update_user']);



/**
 * search_post route
 */

Route::get('/searchpost',[searchpost::class,'search_post']);
 
/**
 * edit_post route
 */
Route::post('/editpost',[editpost::class,'edit_post']);

/**
 * create comment
 */
Route::post('/comment',[user_comment_controller::class,'create_comment']);

/**
 * update comment
 */

Route::post('/updatecomment',[user_comment_controller::class,'update_comment']);
// Route::post('/comment',[user_comment_controller::class,'create_comment']);
// Route::post('/comment',[user_comment_controller::class,'create_comment']);



/**
 * update verified email
 */

 Route::get('/verify/{email}/{token}',[updatecontroller::class,'update_data']);

