<?php

use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Route;
use LaravelLegends\PtBrValidator\Rules\FormatoCpf;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('user')->group(function(){

    Route::get('all', [UserController::class,'all']);

    Route::get('show/{id}', [UserController::class,'show']);

    Route::post('create', [UserController::class,'create']);

    Route::post('update', [UserController::class,'update']);

    Route::post('delete', [UserController::class,'delete']);
});
