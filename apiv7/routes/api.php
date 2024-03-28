<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AmbulanceController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\OrderController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});




//user controller
Route::post('/registerv6', [AuthController::class, 'register']);
Route::post('/loginv6', 'App\Http\Controllers\AuthController@login')->name('login');
Route::middleware('auth:sanctum')->post('/logoutv6', [AuthController::class, 'logout']);
Route::middleware('auth:sanctum')->post('/update-passwordv6', [AuthController::class, 'updatePassword']);
Route::middleware('auth:sanctum')->get('/user/name', 'App\Http\Controllers\AuthController@getLoggedUserName');



//admin
Route::post('/registerv7', [AdminController::class, 'register']);
Route::post('/loginv7', 'App\Http\Controllers\AdminController@login')->name('login');
Route::middleware('auth:sanctum')->post('/logoutv7', [AdminController::class, 'logout']);
Route::middleware('auth:sanctum')->post('/update-passwordv7', [AdminController::class, 'updatePassword']);
Route::middleware('auth:sanctum')->get('/user/namev7', 'App\Http\Controllers\AdminController@getLoggedUserName');

Route::get('/usersv7', [AdminController::class, 'getUsersOrderedByIdDesc']);
Route::put('/users/{id}', [AdminController::class, 'editUser']);
Route::delete('/users/{id}', [AdminController::class, 'deleteUser']);
Route::get('/users/{id}', [AdminController::class, 'getUserById']);




//others routes
Route::apiResource('/ambulances', AmbulanceController::class);
Route::get('/ambulancesByroute', [AmbulanceController::class, 'searchBroute']);
Route::apiResource('/clientsOrders',OrderController::class);
Route::get('/confirmed-orders', [OrderController::class, 'confirmedOrders']);
Route::get('/ordersv2', [OrderController::class, 'driverOrders']);

