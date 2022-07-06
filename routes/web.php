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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('user','fireauth');

// Route::get('/home/customer', [App\Http\Controllers\HomeController::class, 'customer'])->middleware('user','fireauth');

Route::get('/email/verify', [App\Http\Controllers\Auth\ResetController::class, 'verify_email'])->name('verify')->middleware('fireauth');

Route::post('login/{provider}/callback', 'Auth\LoginController@handleCallback');

// log out
Route::get('logout', [App\Http\Controllers\Auth\LogoutController::class, 'perform'])->name('user.logout');

Route::get('forum', [App\Http\Controllers\ForumController::class, 'index'])->name('forum.get');
Route::post('forum/{id}', [App\Http\Controllers\ForumController::class, 'update'])->name('forum.update');


Route::get('ilmu', [App\Http\Controllers\IlmuController::class, 'index'])->name('ilmu.get');
Route::delete('ilmu/{id}', [App\Http\Controllers\IlmuController::class, 'destroy'])->name('ilmu.delete');
Route::post('ilmu/{id}', [App\Http\Controllers\IlmuController::class, 'update'])->name('ilmu.update');


Route::get('ilmu-add', [App\Http\Controllers\IlmuController::class, 'addIlmu'])->name('ilmu.add');
Route::post('imu-add', [App\Http\Controllers\IlmuController::class, 'store'])->name('ilmu.store');

Route::get('contoh', [App\Http\Controllers\ContohController::class, 'index'])->name('contoh.get');

Route::get('contoh-add', [App\Http\Controllers\ContohController::class, 'addContoh'])->name('contoh.add');
Route::post('contoh-add', [App\Http\Controllers\ContohController::class, 'store'])->name('contoh.store');

Route::resource('/home/profile', App\Http\Controllers\Auth\ProfileController::class)->middleware('user','fireauth');

Route::resource('/password/reset', App\Http\Controllers\Auth\ResetController::class);

Route::resource('/img', App\Http\Controllers\ImageController::class);


