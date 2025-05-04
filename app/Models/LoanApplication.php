<?php

// app/Models/LoanApplication.php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LoanApplication extends Model
{
    use HasFactory;

    protected $fillable = [
        'LoanAmount',
        'LoanTerm',
        'LoanPurpose',
        'Title',
        'FirstName',
        'LastName',
        'DateOfBirth',
        'MobilePhone',
        'HomePhone',
        'Email',
        'Dependants',
        'EmploymentStatus',
        'EmployerName',
        'JobTitle',
        'EmployerIndustry',
        'EmployerYears',
        'NextPayDate',
        'FollowingPayDate',
        'HouseNameNumber',
        'StreetAddress',
        'County',
        'City',
        'Postcode',
        'AddressYears',
        'ExpenseTransport',
        'ExpenseFood',
        'ExpenseCredit',
        'ExpenseCouncil',
        'ExpenseOther',
        'BankCard',
        'BankAccountNumber',
        'BankSortCode',
        'ConsentMarketing',
        'status', // Assuming a 'status' column to store the application status
    ];

    // Optional: If you want to manipulate status before saving, you can do that here
}
