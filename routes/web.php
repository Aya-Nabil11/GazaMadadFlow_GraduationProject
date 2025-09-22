<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CitizenController;
use App\Services\GoogleSheet;

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

Route::get('/citizens', [CitizenController::class, 'index'])->name('citizens.index');
Route::get('/citizens/create', [CitizenController::class, 'create'])->name('citizens.create');
Route::post('/citizens', [CitizenController::class, 'store'])->name('citizens.store');