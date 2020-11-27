<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\UsersLogsController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [UsersController::class, 'index']);                 // list all users
Route::get('/users', [UsersController::class, 'list']);             // list all users
Route::get('/users/{id}', [UsersController::class, 'listAll']);     // list all user atributtes
Route::post('/users', [UsersController::class, 'insert']);          // insert new user
Route::put('/users/{id}', [UsersController::class, 'update']);      // update user
Route::delete('/users/{id}', [UsersController::class, 'delete']);   // delete user

Route::get('/logs/{start}/{limit}', [UsersLogsController::class, 'listAll']);              // list all logs
Route::get('/logs/{id}/{start}/{limit}', [UsersLogsController::class, 'listUserLogs']);    // list all user logs