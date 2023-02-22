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


Route::get('/home',[App\Http\Controllers\HomeControl::class,'index'])->name('main');
//Route::get('/home', function () {
//    return view('home');
//});

Route::get('/about', function () {
    return view('about');
});

Route::get('/contact', function () {
    return view('contact');
});

Route::get('/courses', function () {
    return view('courses');
});

Route::get('/team', function () {
    return view('team');
});

Route::get('/testimonial', function () {

    return view('testimonial');
});

Route::get('/404', function () {
    return view('404');
});

Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});
