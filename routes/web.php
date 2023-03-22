<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;


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

Route::get('/', function () {
    return view('home');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/information', [App\Http\Controllers\InformationController::class, 'index'])->name('information');
Route::get('/tasks', [App\Http\Controllers\TasksController::class, 'index'])->name('tasks');
Route::post('/information/updatePassword', [App\Http\Controllers\InformationController::class, 'updatePassword'])->name('information.updatePassword');
Route::put('/information/updateName', [App\Http\Controllers\InformationController::class, 'updateName'])->name('information.updateName');
Route::put('/information/updatePhoto', [App\Http\Controllers\InformationController::class, 'updatePhoto'])->name('information.updatePhoto');

