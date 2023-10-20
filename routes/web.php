<?php

use Illuminate\Support\Facades\Route;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

                //USER ROUTES

//Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('index');
Route::get('/', function () {return view('index');})->name('index');
Route::get('/home',[\App\Http\Controllers\HomeController::class, 'profile']);
Route::get('/profile', [\App\Http\Controllers\HomeController::class, 'profile'])->name('user.profile');

    Route::get('/admin', function (){
        dd('admin');
    })->middleware('is_admin');
    Route::get('/student', function (){
        dd('student');
    })->middleware('is_student');
    Route::get('/teacher', function (){
        dd('teacher');
    })->middleware('is_teacher');

    Auth::routes();

                //AVATAR ROUTES
Route::post('/avatar/upload', [\App\Http\Controllers\AvatarController::class, 'store'])->name('avatar.store');
Route::get('/avatar', [\App\Http\Controllers\AvatarController::class, 'index'])->name('avatar.index');




