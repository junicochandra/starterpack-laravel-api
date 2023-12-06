<?php

use App\Http\Controllers\AuthController;
use App\Jobs\SendEmailJob;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::group([ 'middleware' => 'api', 'prefix' => 'auth' ], function ($router) {
    Route::post('register', [AuthController::class, 'register']);
    Route::post('login', [AuthController::class, 'login']);
    Route::post('logout', [AuthController::class, 'logout']);
    Route::post('refresh', [AuthController::class, 'refresh']);
    Route::post('me', [AuthController::class, 'me']);
});

Route::post('send-email', function(Request $request) {
    $data['email'] = $request->email;
    $data['subject'] = $request->subject;
    $data['sendFrom'] = $request->sendFrom;
    $data['name'] = $request->name;
    $data['content'] = $request->content;
    
    dispatch(new SendEmailJob($data));
    return response()->json(['message' => 'Send success']);
});