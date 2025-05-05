<?php


use Illuminate\Support\Facades\Route;

// routes/api.php
use App\Http\Controllers\LoanApplicationController;

Route::post('/submit', [LoanApplicationController::class, 'store']);
Route::get('/status/{applicationId}', [LoanApplicationController::class, 'status']);

