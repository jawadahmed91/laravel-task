<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProvinceController;
use App\Http\Controllers\DivisionController;
use App\Http\Controllers\DistrictController;
use App\Http\Controllers\TehsilController;
use App\Http\Controllers\UnionCouncilController;
use App\Http\Controllers\RequestDataController;
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
Route::get('/', [AuthController::class, 'showLoginForm'])->name('welcome');
Route::post('login', [AuthController::class, 'login'])->name('login');
Route::post('logout', [AuthController::class, 'logout'])->name('logout');

// Protected Routes
Route::middleware(['auth', 'admin'])->group(function () {
    Route::resource('users', UserController::class);
    Route::resource('provinces', ProvinceController::class);
    Route::resource('divisions', DivisionController::class);
    Route::resource('districts', DistrictController::class);
    Route::resource('tehsils', TehsilController::class);
    Route::resource('union-councils', UnionCouncilController::class);

    Route::get('/get-divisions/{province_id}', [RequestDataController::class, 'getDivisions'])->name('get-divisions');
    Route::get('/get-districts/{division_id}', [RequestDataController::class, 'getDistricts'])->name('get-districts');
    Route::get('/get-tehsils/{district_id}', [RequestDataController::class, 'getTehsils'])->name('get-tehsils');
    Route::get('/get-union-councils/{tehsil_id}', [RequestDataController::class, 'getUnionCouncils'])->name('get-union-councils');

});

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [WorkerController::class, 'dashboard'])->name('dashboard');
});

