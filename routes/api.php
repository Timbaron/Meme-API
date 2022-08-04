<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\MemeController;
use App\Models\Meme;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
    $user = User::where('id', $request->user()->id)->withCount('memes')->first();
    return response()->json([
        'user'=>$user,
        'memes' => $user['memes_count'],
        'status' => 'success',
    ], 200);

});

// Register Routes for the API
Route::post('login', [AuthController::class, 'login']);
Route::post('register', [AuthController::class, 'register']);
// get memes
Route::get('memes/clean', [MemeController::class, 'index']);
Route::get('memes/dark', [MemeController::class, 'dark']);

Route::middleware('auth:sanctum')->group(function () {
    Route::post('meme/upload', [MemeController::class, 'store']);
    Route::post('/logout', [AuthController::class, 'logout']);

});

