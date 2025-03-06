<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\ClassController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\ScoreController;
use App\Http\Controllers\EnrollmentController;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth');
Route::get('/register', [AuthController::class, 'showRegisterForm']);
Route::post('/register', [AuthController::class, 'register']);
Route::middleware(['auth', 'admin'])->group(function () {
    Route::resource('students', StudentController::class);
    Route::resource('classes', ClassController::class);
    Route::resource('subjects', SubjectController::class);
    Route::resource('scores', ScoreController::class);
});

Route::middleware(['auth:sanctum', 'role:admin'])->group(function () {
    // Admin có quyền CRUD tất cả
    Route::apiResource('/students', StudentController::class);
    Route::apiResource('/classes', ClassController::class);
    Route::apiResource('/subjects', SubjectController::class);
    Route::apiResource('/scores', ScoreController::class);
    Route::apiResource('/enrollments', EnrollmentController::class);
});

Route::middleware(['auth:sanctum', 'role:student'])->group(function () {
    // Student chỉ có quyền CRUD Enrollment
    Route::apiResource('/enrollments', EnrollmentController::class)->only(['store', 'update', 'destroy']);
});
