<?php

use App\Http\Controllers\LoanApplicationController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('Welcome');
})->name('home');

Route::get('dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/form', function () {
    return Inertia::render('Form');
})->name('form');

Route::post('/loan-application', [LoanApplicationController::class, 'store']);
Route::get('/loan-application/status/{applicationId}', [LoanApplicationController::class, 'status']);



require __DIR__.'/settings.php';
require __DIR__.'/auth.php';
