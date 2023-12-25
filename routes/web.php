<?php

use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [StudentController::class, 'index'])->name('student.index');
Route::get('/search', [StudentController::class, 'search'])->name('student.search');
Route::get('/edit/{id}', [StudentController::class, 'edit'])->name('student.edit');
Route::get('/delete/{id}', [StudentController::class, 'destroy'])->name('student.destroy');
Route::put('/update/{id}', [StudentController::class, 'update'])->name('students.update');
