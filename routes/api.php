<?php

use App\Http\Controllers\API\V1\Auth\ForgotPasswordController;
use App\Http\Controllers\API\V1\Auth\LogoutController;
use App\Http\Controllers\API\V1\Auth\RegisterController;
use App\Http\Controllers\API\V1\Auth\ResetPasswordController;
use App\Http\Controllers\API\V1\Auth\VerificationController;
use App\Http\Controllers\API\V1\UserController;
use App\Http\Controllers\API\V1\ProductController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::prefix('v1')->group(function () {
    /*
     * Auth
     */
    Route::post('logout', [LogoutController::class, 'logout']);

    Route::post('register', [RegisterController::class, 'register']);

    Route::get('verify-email/{id}/{hash}', [VerificationController::class, 'verify'])
    ->name('verification.verify');

    Route::post('verify-email/resend', [VerificationController::class, 'resend'])
    ->name('verification.resend');

    Route::post('forgot-password', [ForgotPasswordController::class, 'sendResetLinkEmail'])
    ->name('password.email');

    Route::post('reset-password', [ResetPasswordController::class, 'reset'])
    ->name('password.reset');

    /*
     * User
     */
    Route::get('user', [UserController::class, 'show']);

    Route::patch('user', [UserController::class, 'update']);

    Route::delete('user', [UserController::class, 'destroy']);

    /*
     * Products
     */
    Route::get('products', [ProductController::class, 'index']);
    Route::post('store-product', [ProductController::class, 'store']);
    Route::post('update-product', [ProductController::class, 'update']);
    Route::post('delete-product', [ProductController::class, 'delete']);
    Route::post('get-single-product', [ProductController::class, 'show']);
    Route::get('get-all-products', [ProductController::class, 'getProductsJson']);
});

