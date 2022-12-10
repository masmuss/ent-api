<?php

use App\Http\Controllers\Api\Auth\{LoginController, LogoutController, RegisterController};
use App\Http\Controllers\Api\{DepartmentApiController, DivisionApiController, FinanceApiController, GenerationApiController, MailingApiController, MemberApiController, UserApiController};
use App\Http\Controllers\LogController;
use Illuminate\Support\Facades\Log;
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


Route::post('auth/register', RegisterController::class);
Route::post('auth/login', LoginController::class);

Route::middleware('auth:sanctum')->group(function () {
	Route::post('auth/logout', LogoutController::class);
	Route::get('user', [UserApiController::class, 'index']);
});

Route::apiResources([
	// collections
	'departments' => DepartmentApiController::class,
	'generations' => GenerationApiController::class,
	'divisions' => DivisionApiController::class,
	'members' => MemberApiController::class,

	// finance
	'finance' => FinanceApiController::class,

	// mailing
	'mailings' => MailingApiController::class,
]);

Route::get('finance/report/{month}/{year}', [FinanceApiController::class, 'getReport']);

Route::get('/logs', [LogController::class, 'index']);
