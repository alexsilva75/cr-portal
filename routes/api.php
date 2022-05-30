<?php

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::prefix('v1')->group(function () {
    Route::get('/ws-status', [App\Http\Controllers\WebSocketController::class, 'wsStatus']);
    Route::post('/send', [App\Http\Controllers\MailController::class, 'send'])->name('send');
    Route::get('/customers-chats', [App\Http\Controllers\ChatController::class, 'customersOpenChats'])->middleware('cors');
    Route::get('/chat/{id}', [App\Http\Controllers\ChatController::class, 'show']);

    Route::post('/auth',[App\Http\Controllers\Auth\APITokenController::class, 'authThirdPart']);

    Route::middleware('auth:sanctum')->group(function($router){
        Route::get('/token/create', [App\Http\Controllers\Auth\APITokenController::class, 'store']);
        //Route::get('notifications/{userId}', [App\Http\Controllers\Auth\NotificationController::class, 'index']);

    });



});
