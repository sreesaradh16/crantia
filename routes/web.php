<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\EmployeeController;
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



//login
Route::get('/', [AuthController::class, 'index'])->name('login');
Route::post('login', [AuthController::class, 'login'])->name('post_login');

Route::middleware(['auth'])->group(function () {

    // employee
    Route::resource('employee', EmployeeController::class)->names('employees');

    // department
    Route::resource('department', DepartmentController::class)->names('departments');

    //logout
    Route::get('logout', [AuthController::class, 'logout'])->name('logout');
});
