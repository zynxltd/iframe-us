<?php

// app/Models/LoanApplication.php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LoanApplication extends Model
{
    use HasFactory;

    protected $fillable = [
        'LeadID',
        'Tier',
        'LeadStatus',
        'ResponseLogID',
        'Price',
        'LeadQuality',
        'LeadScore',
        'LeadFraudScore',
        'Redirection',
        'AffID',
        'OfferID',
        'Campaign',
        'AffSub',
        'AffSub2',
        'AffSub3',
        'AffSub4',
        'AffSub5',
        'CreationUrl',
        'ReferrerUrl',
        'IpAddress',
        'UserAgent',
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
        'MaritalStatus',
        'RecentLoanCount',
        'AdultsLivingWith',
        'ResidentialStatus',
        'HouseNameNumber',
        'StreetAddress',
        'County',
        'City',
        'Postcode',
        'AddressYears',
        'EmploymentStatus',
        'IncomeFrequency',
        'EmployerName',
        'JobTitle',
        'EmployerIndustry',
        'WorkPhone',
        'NextPayDate',
        'FollowingPayDate',
        'EmployerYears',
        'NetMonthlyIncome',
        'ExpenseMonthlyMortgageRent',
        'ExpenseCouncil',
        'ExpenseFood',
        'ExpenseTransport',
        'ExpenseCredit',
        'ExpenseUtilities',
        'ExpenseOther',
        'BankDirectDeposit',
        'BankCard',
        'BankAccountNumber',
        'BankSortCode',
        'BankYears',
        'ConsentFinancial',
        'MarketingSms',
        'MarketingEmail',
        'MarketingPhone',
    ];


    // Optional: If you want to manipulate status before saving, you can do that here
}
