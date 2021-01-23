<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\UserapiController;
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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
// route for crud api user
Route::get('userapis', [UserapiController::class, 'index']);
Route::get('userapi/{id}', [UserapiController::class, 'show']);
Route::post('userapi', [UserapiController::class, 'store']);
Route::put('userapi/{id}', [UserapiController::class, 'update']);
Route::delete('userapi/{id}', [UserapiController::class, 'destroy']);

