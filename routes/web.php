<?php

	use Illuminate\Support\Facades\Auth;
	use Illuminate\Support\Facades\Route;
    use App\Http\Controllers\Courses\LessonController;
    use App\Http\Controllers\Courses\CourseController;
    use \App\Http\Controllers\Courses\RowController;
    use App\Http\Controllers\Courses\PostController;

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
Route::get('/home',[\App\Http\Controllers\HomeController::class, 'profile'])->name('home');
Route::get('/profile', [\App\Http\Controllers\HomeController::class, 'profile'])->name('home.profile');
Route::get('/creator', [\App\Http\Controllers\HomeController::class, 'creator'])->name('home.creator');

    Auth::routes();



                //AVATAR ROUTES
Route::post('/img/upload', [\App\Http\Controllers\Courses\ImageController::class, 'store'])->name('img.store');
Route::get('/img', [\App\Http\Controllers\Courses\ImageController::class, 'index'])->name('img.index');


    Route::get('/student/course', [\App\Http\Controllers\Courses\PostController::class, 'StudentPostGroupIndex']);
    Route::get('/student/course/{id}', [\App\Http\Controllers\Courses\PostController::class, 'StudentPostGroupShow']);


    //Course

    Route::group(['prefix' => 'course'], function () {
        Route::get('/', [CourseController::class, 'index'])->name('courses.index');
        Route::get('/{id}', [CourseController::class, 'show',])->name('courses.show');
        Route::post('/', [CourseController::class, 'store',])->name('courses.store');
        Route::put('/{id}', [CourseController::class, 'update',])->name('courses.update');
        Route::delete('/{id}', [CourseController::class, 'delete',])->name('courses.delete');
    });
    Route::group(['prefix' => 'lesson'], function () {
        Route::get('/', [LessonController::class, 'index'])->name('lessons.index');
        Route::get('/{id}', [LessonController::class, 'show',])->name('lessons.show');
        Route::post('/', [LessonController::class, 'store',])->name('lessons.store');
        Route::put('/{id}', [LessonController::class, 'update',])->name('lessons.update');
        Route::delete('/{id}', [LessonController::class, 'delete',])->name('lessons.delete');
    });
    Route::group(['prefix' => 'row'], function () {
        Route::get('/', [RowController::class, 'index'])->name('rows.index');
        Route::get('/{id}', [RowController::class, 'show',])->name('rows.show');
        Route::post('/', [RowController::class, 'store',])->name('rows.store');
        Route::put('/{id}', [RowController::class, 'update',])->name('rows.update');
        Route::delete('/{id}', [RowController::class, 'delete',])->name('rows.delete');

    });
    Route::group(['prefix' => 'text'], function () {
        Route::get('/', [\App\Http\Controllers\TextController::class, 'index'])->name('post.text.index');
        Route::get('/{id}', [\App\Http\Controllers\TextController::class, 'show',])->name('post.text.show');
        Route::post('/', [\App\Http\Controllers\TextController::class, 'store',])->name('post.text.store');
        Route::put('/{id}', [\App\Http\Controllers\TextController::class, 'update',])->name('post.text.update');
        Route::delete('/{id}', [\App\Http\Controllers\TextController::class, 'delete',])->name('post.text.delete');
    });

