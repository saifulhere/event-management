<?php

use App\Http\Controllers\Api\V1\Events\JoinEventController;
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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });
Route::get('csrf-token', function () {
    return response()->json(['token' => csrf_token()]);
})->name('token');

Route::group(['prefix' => 'v1'], function(){
    Route::get('all-events', [JoinEventController::class, 'index']);
    Route::get('all-events/{slug}', [JoinEventController::class, 'showEvent']);
    Route::post('book-event', [JoinEventController::class, 'store']);
});
