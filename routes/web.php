<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\FormController;

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
    return redirect()->route('login');
});

Route::get('login', [AuthController::class, 'index'])->name("login");

Route::post('login_admin', [AuthController::class, 'check_login']);
Route::post('logout', [AuthController::class, 'logout'])->name('logout');
Route::get('dashboard', [AuthController::class, 'dashboard'])->name("dashboard");

Route::middleware(['auth','check.privileges'])->group(function () {
    Route::get('form/list', [FormController::class, 'index'])->name('form-list');
    Route::get('form/add', [FormController::class, 'add'])->name('form-add');
    Route::post('form/store', [FormController::class, 'store'])->name('form-store');
    Route::get('form/edit/{id}', [FormController::class, 'add'])->name('form-add');
    Route::get('form/delete/{id}', [FormController::class, 'delete']);
 });
