<?php

use App\Http\Controllers\Api\DepartmentApiController;
use App\Http\Controllers\Api\DivisionApiController;
use App\Http\Controllers\Api\GenerationApiController;
use App\Http\Controllers\Api\MemberApiController;
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

Route::resource('departments', DepartmentApiController::class);
Route::resource('generations', GenerationApiController::class);
Route::resource('divisions', DivisionApiController::class);
Route::resource('members', MemberApiController::class);
