<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\Api\AuthController as ApiAuthController;
use App\Http\Controllers\Api\UserController as ApiUserController;
use Illuminate\Http\Request;
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

Route::post('/users/import', [UserController::class, 'import']);
Route::post('/users/export', [UserController::class, 'export']);

Route::group(['middleware' => 'jwt'], function() {
    Route::post('login',     [ApiAuthController::class, 'login']);
    Route::get('user/info',  [ApiAuthController::class, 'me'   ]);
    Route::post('user/info', [ApiUserController::class, 'update_name']);
});

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
