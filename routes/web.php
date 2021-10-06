<?php

use App\Http\Controllers\UserController;
use Facade\FlareClient\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Symfony\Component\HttpKernel\Profiler\Profile;

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
    return view('welcome');
});

Route::resource('books', 'BookController');
Route::post('signup', 'AuthController@signup');
Route::get('user/login', function () {
    return view('user.login');
});
Route::post('login', 'AuthController@login');
Route::middleware(['auth:api'])->group(function () {
    Route::get('user', 'AuthController@user');
    Route::delete('logout', 'AuthController@logout');
});

// Route::group(['middleware'=>'auth:api'],function(){
//     Route::get('user','AuthController@user');
// });

Route::resource('skills', 'SkillController');

// Route::post('test', function (Request $request) {
//     // dd($request);
//     return response($request->all());
// });


Route::get('profile', 'UserController@getProfile');
