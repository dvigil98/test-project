<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\TaskController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return redirect('/login');
});

// login
Route::match(['get', 'post'], '/login', [LoginController::class, 'login'])->name('login');

Route::middleware(['auth'])->group(function () {

    Route::get('/logout', [LoginController::class, 'logout']);

    // dashboard
    Route::get('/dashboard', [DashboardController::class, 'dashboard']);

    // projects
    Route::get('/projects', [ProjectController::class, 'index']);
    Route::get('/projects/create', [ProjectController::class, 'create']);
    Route::post('/projects', [ProjectController::class, 'store']);
    Route::get('/projects/{id}/edit', [ProjectController::class, 'edit']);
    Route::put('/projects/{id}', [ProjectController::class, 'update']);
    Route::delete('/projects/{id}', [ProjectController::class, 'destroy']);
    Route::get('/projects/{id}', [ProjectController::class, 'show']);

    // tasks
    Route::get('/projects/{id}/tasks', [TaskController::class, 'index']);
    Route::post('/tasks', [TaskController::class, 'store']);
    Route::delete('/tasks/{id}', [TaskController::class, 'destroy']);
    Route::get('/tasks/{id}', [TaskController::class, 'show']);
    Route::put('/tasks/update', [TaskController::class, 'update']);
});
