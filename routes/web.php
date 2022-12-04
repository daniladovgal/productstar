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

Route::get('/weather', function () {
    return view('weather');
});

Route::get('/', function () {
    return view('weather');
});

Route::get('/users/{id?}', function () {
    return view('users');
});

Route::get('/lessons', function () {
    return view('weather');
});

Route::get('/fill', 'FillController');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
