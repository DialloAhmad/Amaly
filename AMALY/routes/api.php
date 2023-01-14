<?php

use App\Http\Controllers\Api\APIOngController;
use App\Http\Controllers\Api\APIDonController;
use App\Http\Controllers\Api\APICasController;
use App\Http\Controllers\Api\APIRetourcasController;
use App\Http\Controllers\Api\VerificationController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\ApiAuthController;
use App\Http\Controllers\UserphoneController;

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
    Auth::routes(['verify' => true]);
Route::group(['middleware' => ['cors']], function () {
    Route::post('/login', [ApiAuthController::class, 'login'])->name('login.api')->middleware('guest:api');
    Route::post('/register', [ApiAuthController::class, 'register'])->name('register.api')->middleware('guest:api');
    

    Route::middleware('auth:api')->group(function () {
        // our routes to be protected will go in here
        Route::apiResource('userphones',UserphoneController::class);
        Route::post('userphones/{userphones}/UpdateImage',  [UserphoneController::class, 'UpdateImage'])->name('userphone.UpdateImage');
        Route::post('userphones/{userphones}/updatePassword',  [UserphoneController::class, 'updatePassword'])->name('userphone.updatePassword');
        Route::post('/logout', [ApiAuthController::class, 'logout'])->name('logout.api');
        Route::get('/me', [ApiAuthController::class, 'me'])->name('me.api');
        Route::post('/dons', [APIDonController::class, 'store'])->name('storeDons.api');
        Route::get('/dons', [APIDonController::class, 'index'])->name('indexDons.api');
        Route::get('/donsPerso', [APIDonController::class, 'show'])->name('DonsPerso.api');
        //routes pour retourner données ONG
        Route::apiResource('users',APIOngController::class);
        //route pour retourner les cas 
        Route::apiResource('cas',APICasController::class);
        //route pour retourner les retourcas 
        Route::apiResource('retour_cas',APIRetourcasController::class);

        Route::get('/email/resend', [VerificationController::class, 'resend'])->name('verification.resend')->middleware('auth:api');
        Route::get('/email/verify/{id}/{hash}', [VerificationController::class, 'verify'])->name('verification.verify');


       
    });
});




