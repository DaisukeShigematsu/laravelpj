<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DataUserController;
use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\RestController;


Route::get('/', function () {return view('welcome');});
Route::get('/dashboard', function () {return view('dashboard');})
->middleware(['auth'])->name('dashboard');


Route::get('/', function () {return view('dashboard');})->middleware('auth');

Route::get('/data', [DataUserController::class, 'index']);
Route::get('/add',  [DataUserController::class, 'add']);
Route::post('/add', [DataUserController::class, 'create']);


/////

Route::get('/login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('/login', 'Auth\LoginController@login');
Route::post('/logout', 'Auth\LoginController@logout')->name('logout');


Route::group(['middleware' => ['auth', 'can:admin']], function() {
    Route::get('admin/user/index', 'UserController@index')->name('admin/user/index');
    Route::get('admin/user/show/{id}', 'UserController@show')->name('admin/user/show');
});

Route::group(['middleware' => 'auth'], function() {
    Route::post('/punchin', 'TimestampsController@punchIn')->name('timestamp/punchin');
    Route::post('/punchout', 'TimestampsController@punchOut')->name('timestamp/punchout');
});

require __DIR__.'/auth.php';
