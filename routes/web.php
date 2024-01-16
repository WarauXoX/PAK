<?php
	use Illuminate\Support\Facades\Auth;
	use Illuminate\Support\Facades\Route;
    use App\Http\Controllers\Courses\LessonController;
    use App\Http\Controllers\Courses\CourseController;
    use \App\Http\Controllers\Courses\RowController;
    use App\Http\Controllers\Courses\PostController;
        use App\Http\Controllers\Courses\Posts\PostTextController;
        use App\Http\Controllers\Courses\Factory;
                //USER ROUTES
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
    Route::group(['prefix' => 'courses'], function () {
        Route::get('/', [CourseController::class, 'index'])->name('courses.index');
        Route::get('/{id}', [CourseController::class, 'show',])->name('courses.show');
        Route::post('/', [CourseController::class, 'store',])->name('courses.store');
        Route::put('/{id}', [CourseController::class, 'update',])->name('courses.update');
        Route::delete('/{id}', [CourseController::class, 'delete',])->name('courses.delete');

            Route::get('{c_id}/lessons', [LessonController::class, 'index'])->name('lessons.index');
            Route::get('{c_id}/{id}', [LessonController::class, 'show',])->name('lessons.show');
            Route::post('{c_id}/', [LessonController::class, 'store',])->name('lessons.store');
            Route::put('{c_id}/{id}', [LessonController::class, 'update',])->name('lessons.update');
            Route::delete('{c_id}/{id}', [LessonController::class, 'delete',])->name('lessons.delete');

                Route::get('{c_id}/lessons/{l_id}/create', [PostController::class, 'create']);

    });

    Route::group(['prefix' => 'row'], function () {
        Route::get('/', [RowController::class, 'index'])->name('rows.index');
        Route::get('/_{id}', [RowController::class, 'show',])->name('rows.show');
        Route::post('/', [RowController::class, 'store',])->name('rows.store');
        Route::put('/', [RowController::class, 'update',])->name('rows.update');
        Route::delete('/_{id}', [RowController::class, 'delete',])->name('rows.delete');
    });
    Route::group(['prefix'=> 'posts'], function(){
        Route::get('/', [PostController::class, 'index'])->name('post.index');
        Route::post('/', [PostController::class, 'store'])->name('post.store');
        Route::post('/show', [PostController::class, 'show'])->name('post.show');
        Route::group(['prefix' => 'text'], function(){
            Route::get('/', [PostTextController::class, 'index'])->name('posttext.index');
            Route::post('/', [PostTextController::class, 'store'])->name('posttext.store');
        });
    });
    Route::resource('/text', TextController::class);
    Route::post('/post/show', [Factory::class, 'showChildren'])->name('posts.show');
    Route::post('/post/text', [Factory::class, 'storeText'])->name('post.text.store');
    Route::patch('/post/text/update', [Factory::class, 'updateText'])->name('post.text.update');

