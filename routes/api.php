<?php

use App\Http\Controllers\CompanyController;
use App\Http\Controllers\UserController;
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

//Route::resource('user', UserController::class);

Route::middleware('api')->group(function () {
    Route::controller(UserController::class)->group(function() {
        Route::get('/users/{role?}', 'getUsers');
        Route::post('/users/new', 'newUser');
        Route::get('/user/{id}', 'getUser');
        Route::post('/user/update', 'updateUser');
        Route::post('/user/delete', 'deleteUser');
    });

    Route::controller(CompanyController::class)->group(function() {
        Route::post('/company/new', 'newCompany');
    });
});

//Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//    return $request->user();
//});
