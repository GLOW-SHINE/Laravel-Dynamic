<?php

use Illuminate\Support\Facades\Route;



/* Route::get('/', function () {
    return view('welcome');
}); */

use App\Http\Controllers\UserController;

Route::get('/',[UserController::class, 'showUsers']);
Route::get('/users', [UserController::class, 'showUsers'])->name('users.index');
Route::get('/users/{id}/edit', [UserController::class, 'edit'])->name('users.edit');
Route::delete('/users/{id}', [UserController::class, 'destroy'])->name('users.destroy');

// Students

use App\Http\Controllers\StudentController;

Route::get('/students', [StudentController::class, 'showStudent'])->name('students.index');
Route::get('/students/{id}/', [StudentController::class, 'edit'])->name('students.edit');
Route::delete('/students/{id}', [StudentController::class, 'destroy'])->name('students.destroy');



