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

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth'])->name('dashboard');

Route::middleware(['myauth:admin'])->prefix('admin')->group(function(){
    Route::get('/dashboard',[
        'uses'=>'App\Http\Controllers\HomeController@index',
        'as'=>'admin.home'
    ]);
    Route::resource('teachers',App\Http\Controllers\TeachersController::class);
});
Route::middleware(['myauth:student'])->prefix('student')->group(function(){
    Route::get('/dashboard',[
        'uses'=>'App\Http\Controllers\HomeController@index',
        'as'=>'student.home'
    ]);
});

require __DIR__.'/auth.php';
