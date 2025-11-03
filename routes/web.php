<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CitizenController;

Route::get('/', function () {
    return view('index'); 
});

Route::post('/citizens', [CitizenController::class, 'store'])->name('citizens.store');

Route::get('/run-sync/{token}', function ($token) {
    // Protect with a secret token so no one else can trigger it
    if ($token !== env('SYNC_SECRET')) {
        abort(403, 'Unauthorized');
    }

    Artisan::call('sheet:sync');

    return response()->json([
        'status' => 'success',
        'time' => now()->toDateTimeString(),
    ]);
});