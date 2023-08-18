<?php

use App\Http\Controllers\Api\ApiClassroomController;
use App\Http\Controllers\Api\ApiSchoolController;
use App\Http\Controllers\Api\ApiStudentController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Route::apiResource('api/school', ApiSchoolController::class);
Route::apiResource('school_api', ApiSchoolController::class)->only('index', 'update', 'store', 'destroy', 'show');
Route::apiResource('classroom_api', ApiClassroomController::class)->only('index', 'store', 'destroy', 'show');
Route::apiResource('student_api', ApiStudentController::class)->only('index', 'update', 'store', 'destroy', 'show');
