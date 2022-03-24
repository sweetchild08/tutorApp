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
    return redirect(route('admin.home'));
    // return view('welcome');
});
Route::get('/version', function () {
    echo phpinfo();
    return;
    // return view('welcome');
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth'])->name('dashboard');




// admin routes
Route::middleware(['myauth:admin'])
    ->prefix('admin')
    ->name('admin.')
    ->namespace('App\Http\Controllers')
    ->group(function(){
        Route::get('/dashboard',[
            'uses'=>'HomeController@index',
            'as'=>'home'
        ]);
        Route::resource('principal',PrincipalController::class)
            ->only(['store','index','destroy']);

        Route::resource('teachers',TeachersController::class)
            ->only(['store','index','destroy']);
        
        Route::resource('students',StudentsController::class)
            ->only(['index','store']);
});
// endof admin routes


Route::middleware(['myauth:principal'])
    ->prefix('principal')
    ->name('principal.')
    ->namespace('App\Http\Controllers')
    ->group(function(){
        Route::get('/dashboard',[
            'uses'=>'HomeController@index',
            'as'=>'home'
        ]);
        
        Route::resource('teachers',TeachersController::class)
            ->only(['store','index','destroy']);
        
        Route::resource('students',StudentsController::class)
            ->only(['index','store']);


        // Route::get('/audio',[
        //     'uses'=>'App\Http\Controllers\ResourcesController@audio',
        //     'as'=>'audio'
        // ]);
        // Route::get('/video',[
        //     'uses'=>'App\Http\Controllers\ResourcesController@video',
        //     'as'=>'video'
        // ]);
        // Route::get('/games',[
        //     'uses'=>'App\Http\Controllers\ResourcesController@games',
        //     'as'=>'games'
        // ]);
        // Route::get('/quiz',[
        //     'uses'=>'App\Http\Controllers\ResourcesController@quiz',
        //     'as'=>'quiz'
        // ]);
});

Route::middleware(['myauth:teacher'])
    ->prefix('teacher')
    ->name('teacher.')
    ->namespace('App\Http\Controllers')
    ->group(function(){
        Route::get('/dashboard',[
            'uses'=>'HomeController@index',
            'as'=>'home'
        ]);
        Route::resource('students',StudentsController::class)
            ->only(['index','store']);

        Route::resource('audio',AudioController::class)
            ->only(['store','index','destroy']);

        Route::resource('video',VideoController::class)
        ->only(['store','index','destroy']);

        // Route::get('/audio',[
        //     'uses'=>'App\Http\Controllers\ResourcesController@audio',
        //     'as'=>'audio'
        // ]);
        // Route::get('/video',[
        //     'uses'=>'App\Http\Controllers\ResourcesController@video',
        //     'as'=>'video'
        // ]);
        // Route::get('/games',[
        //     'uses'=>'App\Http\Controllers\ResourcesController@games',
        //     'as'=>'games'
        // ]);
        // Route::get('/quiz',[
        //     'uses'=>'App\Http\Controllers\ResourcesController@quiz',
        //     'as'=>'quiz'
        // ]);
});

Route::middleware(['myauth:student'])
    ->prefix('student')
    ->group(function(){
        Route::get('/dashboard',[
            'uses'=>'App\Http\Controllers\HomeController@index',
            'as'=>'student.home'
        ]);
    });


require __DIR__.'/auth.php';
