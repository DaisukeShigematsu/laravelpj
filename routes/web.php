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


require __DIR__.'/auth.php';
