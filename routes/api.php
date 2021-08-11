<?php

use App\Http\Controllers\auth\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

// /*
// |--------------------------------------------------------------------------
// | API Routes
// |--------------------------------------------------------------------------
// |
// | Here is where you can register API routes for your application. These
// | routes are loaded by the RouteServiceProvider within a group which
// | is assigned the "api" middleware group. Enjoy building your API!
// |
// */

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

route::group([
    'prefix' => 'auth'
], function () {
    route::post('login', [AuthController::class, 'login'])->name('login');
    route::post('login', [AuthController::class, 'register'])->name('register');
    route::group([
        'middleware' => 'auth:api'
    ], function () {
        route::get('logout', [AuthController::class, 'logout']);
        route::get('user', [AuthController::class, 'user']);
    });
});
