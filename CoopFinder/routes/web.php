<?php

use Illuminate\Support\Facades\Route;
use App\Coop;


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
})->name('welcome');

Auth::routes();

Route::resource('/coop','CoopController');
Route::resource('/usr','UserController');
Route::resource('/cmt','CommentController');
Route::resource('/loc','LocationController');
// Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => ['auth','admin']], function () {
    Route::get('/dashboard', function(){
        return view('admin.dashboard');
    })->name('dashboard');
    
    // display coop list
    Route::get('/admin-coop','DashboardController@cooplist')->name('admin.coop');
    
    Route::get('/admin-user','DashboardController@userlist')->name('admin.user');

});

