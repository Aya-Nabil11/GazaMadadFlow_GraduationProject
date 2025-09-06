<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CitizenController;

Route::get('/index', function () {
    return view('index'); 
});

Route::post('/citizens', [CitizenController::class, 'store'])->name('citizens.store');
