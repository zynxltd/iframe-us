<?php



// routes/api.php
use App\Http\Controllers\LoanApplicationController;

Route::post('/loan-application', [LoanApplicationController::class, 'store']);
Route::get('/loan-application/status/{applicationId}', [LoanApplicationController::class, 'status']);

