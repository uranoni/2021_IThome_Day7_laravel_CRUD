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
    return view('home');
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
Route::get('trades/record', 'TradeController@record');
Route::get('skills/tree', 'SkillController@tree');
// Route::get('skills/gettree', 'SkillController@gettree');


Route::resource('skills', 'SkillController');
Route::resource('points', 'PointController');
Route::resource('trades', 'TradeController');

// Route::post('test', function (Request $request) {
//     // dd($request);
//     return response($request->all());
// });
Route::get('profile', 'UserController@getProfile');
// Route::get('trades/record', 'TradeController@record');
