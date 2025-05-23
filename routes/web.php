<?php

use Illuminate\Support\Facades\Route;

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




use App\Http\Controllers\StudentController;

Route::get('/', [StudentController::class, 'index']); // Show all students
Route::get('/add', [StudentController::class, 'create']); // Show add form
Route::post('/add', [StudentController::class, 'store']); // Add student
Route::get('/edit/{id}', [StudentController::class, 'edit']); // Edit form
Route::post('/edit/{id}', [StudentController::class, 'update']); // Update student
Route::post('/delete/{id}', [StudentController::class, 'destroy']); // Delete student
