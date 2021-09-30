<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Models\User;

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
    $users = User::paginate(9);
    return view('welcome',compact('users'));
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//Create post Page
Route::resource('/createpost','App\Http\Controllers\PostController');

//Like Dislike
Route::post('/like/{id}','App\Http\Controllers\LikeDisLikeController@like');
Route::post('/dislike/{id}','App\Http\Controllers\LikeDisLikeController@dislike');

//Comment
Route::post('/comment/{id}','App\Http\Controllers\CommentController@store');

//admin
Route::get('/showuser','App\Http\Controllers\UserController@showuser');
Route::get('/manageuser/{id}','App\Http\Controllers\UserController@manageuser');
Route::post('/deleteuser/{id}','App\Http\Controllers\UserController@deleteuser');
Route::post('/update/{id}','App\Http\Controllers\UserController@update');

Route::get('/search','App\Http\Controllers\SearchController@search');

Route::get('/search_category/{cat_name}','App\Http\Controllers\SearchController@search_category');

