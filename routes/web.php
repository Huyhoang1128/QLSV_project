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
Route::middleware('auth:sanctum')->group(function () {
    Route::get('/students', [StudentController::class, 'index']);
    Route::post('/students', [StudentController::class, 'store']);
    Route::get('/students/{id}', [StudentController::class, 'show']);
    Route::put('/students/{id}', [StudentController::class, 'update']);
    Route::delete('/students/{id}', [StudentController::class, 'destroy']);
    Route::get('/enrollments', [EnrollmentController::class, 'index']); // Danh sách đăng ký
    Route::post('/enrollments', [EnrollmentController::class, 'store']); // Đăng ký môn học
    Route::put('/enrollments/{id}', [EnrollmentController::class, 'update']);
    Route::delete('/enrollments/{id}', [EnrollmentController::class, 'destroy']); // Hủy đăng ký
});
