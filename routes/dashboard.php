<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Dashboard\HomeController;

/*
|--------------------------------------------------------------------------
| Dashboard Routes
|--------------------------------------------------------------------------
|
| Here is where you can register dashboard routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group([
    'prefix' => '{locale}',    
    'where' => ['locale', '[a-zA-Z]{2}'],
    // 'middleware' => ['setlocale', 'language', 'default.language', 'verified']
], function () {

    Route::get('/dashboard', [HomeController::class, 'index'])
    ->name('dashboard.index');

});