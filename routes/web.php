<?php

use App\Http\Controllers\ProfileController;
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

//Route::get('/', function () {
//    return view('welcome');
//});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

//----------------------------------------------------------------


Route::get('/',[App\Http\Controllers\HomeControl::class,'index'])->name('main');
//Route::get('/home', function () {
//    return view('home');
//});


Route::post('/about',[App\Http\Controllers\HomeControl::class,'contact'])->name('contact');


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


//-----------------------------------------------------



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
