<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\UserController;

/*
|--------------------------------------------------------------------------
| Web Admin Routes
|--------------------------------------------------------------------------
|
| Here is where you can register admin routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('', [HomeController::class, 'index'])->middleware('can:LMS Ver Dashboard')->name('home');

Route::resource('roles', RoleController::class)->names('roles');

//Route::resource('users', UserController::class)->names('users'); // Create all (7) routes for CRUD

Route::resource('users', UserController::class)->only(['index', 'edit', 'update'])->names('users');
