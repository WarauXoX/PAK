<?php

    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\Route;
    use App\Http\Controllers\Courses\LessonController;
    use App\Http\Controllers\Courses\CourseController;
    use \App\Http\Controllers\Courses\RowController;
    use App\Http\Controllers\Courses\PostController;

    /*
    |--------------------------------------------------------------------------
    | API Routes
    |--------------------------------------------------------------------------
    |
    | Here is where you can register API routes for your application. These
    | routes are loaded by the RouteServiceProvider and all of them will
    | be assigned to the "api" middleware group. Make something great!
    |
    */

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return auth()->user()->name;
});

//Route::resource('courses', CourseController::class);
//
//Route::resource('lessons', LessonController::class);
//Route::resource('rows', RowController::class);
//
//    Route::resource('posts', PostController::class);
