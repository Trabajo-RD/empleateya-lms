<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PaymentController;

/*
|--------------------------------------------------------------------------
| Payment Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/**
 * Route to show payment details
 */
Route::get('{course}/checkout', [PaymentController::class, 'checkout'])->name('checkout');

/**
 * Route for processing paypal payment
 */
Route::get('{course}/pay/paypal', [PaymentController::class, 'payWithPayPal'])->name('paypal');

/**
 * Route for check status of the payment
 */
Route::get('{course}/pay/paypal/approved', [PaymentController::class, 'payWithPayPalApproved'])->name('paypal.payment.approved');
