<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Models\LoanApplication;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class LoanApplicationController extends Controller
{
    /**
     * Store a new loan application and send it to the external portal.
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function store(Request $request)
    {
        dd($request->all());
        // Validate incoming request
        $validated = $request->validate([
            'Source.LoanAmount' => 'required|numeric',

            'Loan.LoanAmount' => 'required|numeric',
            'Loan.LoanTerm' => 'required|numeric',
            'Loan.LoanPurpose' => 'required|numeric',

            'Applicant.Title' => 'required|numeric',
            'Applicant.FirstName' => 'required|string',
            'Applicant.LastName' => 'required|string',
            'Applicant.DateOfBirth' => 'required|string',
            'Applicant.MobilePhone' => 'required|string',
            'Applicant.HomePhone' => 'nullable|string',
            'Applicant.Email' => 'required|email',
            'Applicant.Dependants' => 'required|numeric',

            'Employer.EmploymentStatus' => 'required|numeric',
            'Employer.EmployerName' => 'required|string',
            'Employer.JobTitle' => 'required|string',
            'Employer.NetMonthlyIncome' => 'required|numeric',
            'Employer.EmployerIndustry' => 'required|numeric',
            'Employer.EmployerYears' => 'required|numeric',
            'Employer.NextPayDate' => 'required|date',
            'Employer.FollowingPayDate' => 'required|date',
            'Employer.IncomeFrequency' => 'required|numeric',

            'Residence.HouseNameNumber' => 'required|string',
            'Residence.StreetAddress' => 'required|string',
            'Residence.County' => 'required|string',
            'Residence.City' => 'required|string',
            'Residence.Postcode' => 'required|string',
            'Residence.AddressYears' => 'required|numeric',
            'Residence.ResidentialStatus' => 'required|numeric',

            'Expense.MortgageRentExpense' => 'required|numeric',
            'Expense.ExpenseTransport' => 'required|numeric',
            'Expense.UtilitiesExpense' => 'required|numeric',
            'Expense.ExpenseFood' => 'required|numeric',
            'Expense.ExpenseCredit' => 'required|numeric',
            'Expense.ExpenseCouncil' => 'required|numeric',
            'Expense.ExpenseOther' => 'required|numeric',

            'Bank.BankCard' => 'required|numeric',
            'Bank.BankAccountNumber' => 'required|string',
            'Bank.BankSortCode' => 'required|string',
            'Consent.MarketingSms' => 'boolean',
            'Consent.MarketingEmail' => 'boolean',
            'Consent.MarketingPhone' => 'boolean',
        ]);

        // Save the loan application
        $loanApplication = LoanApplication::create($validated);

        // Prepare data to send to the portal
        $portalData = [
            'MinCommission' => null,
            'MaxCommission' => null,

            'Source' => [
                'VendorID' => 'TESTER1',
                'OfferID' => 2,
                'Campaign' => 'SpringPromo',
                'AffSub' => $validated['AffSub'] ?? 'sub1',
                'AffSub2' => $validated['AffSub2'] ?? 'sub2',
                'AffSub3' => $validated['AffSub3'] ?? 'sub3',
                'AffSub4' => $validated['AffSub4'] ?? 'sub4',
                'AffSub5' => $validated['AffSub5'] ?? 'sub5',
                'CreationUrl' => $validated['CreationUrl'] ?? request()->fullUrl(),
                'ReferrerUrl' => $validated['ReferrerUrl'] ?? request()->headers->get('referer'),
                'IpAddress' => $validated['IpAddress'] ?? request()->ip(),
                'UserAgent' => $validated['UserAgent'] ?? request()->userAgent(),
            ],

            'Loan' => [
                'LoanAmount' => $validated['LoanAmount'],
                'LoanTerms' => $validated['LoanTerm'],
                'LoanPurpose' => $validated['LoanPurpose'],
            ],

            'Applicant' => [
                'Title' => $validated['Title'],
                'FirstName' => $validated['FirstName'],
                'LastName' => $validated['LastName'],
                'Email' => $validated['Email'],
                'MobilePhone' => $validated['MobilePhone'],
                'HomePhone' => $validated['HomePhone'],
                'WorkPhone' => $validated['WorkPhone'] ?? null,
                'DateOfBirth' => $validated['DateOfBirth'],
                'MaritalStatus' => $validated['MaritalStatus'] ?? 1,
                'Dependants' => $validated['Dependants'] ?? null,
                'RecentLoanCount' =>  1,
                'AdultsLivingWith' =>  1,
            ],

            'Residence' => [
                'ResidentialStatus' => $validated['ResidentialStatus'],
                'AddressNameOrNumber' => $validated['HouseNameNumber'],
                'AddressStreet' => $validated['StreetAddress'],
                'AddressCounty' => $validated['County'],
                'AddressTown' => $validated['City'],
                'AddressPostcode' => $validated['Postcode'],
                'AddressYears' => $validated['AddressYears'],
            ],

            'Employment' => [
                'EmploymentStatus' => $validated['EmploymentStatus'],
                'IncomeFrequency' => $validated['IncomeFrequency'],
                'JobTitle' => $validated['JobTitle'],
                'EmployerName' => $validated['EmployerName'],
                'EmploymentIndustry' => $validated['EmployerIndustry'],
//                'WorkPhone' => $validated['WorkPhone'],
                'NextPayDate' => $validated['NextPayDate'],
                'FollowingPayDate' => $validated['FollowingPayDate'],
                'NetMonthlyIncome' => $validated['NetMonthlyIncome'],
                'YearsAtEmployer' => $validated['EmployerYears'],
            ],

            'Expense' => [
                'MortgageRentExpense' => $validated['MortgageRentExpense'],
                'TaxExpense' => $validated['ExpenseCouncil'],
                'FoodExpense' => $validated['ExpenseFood'],
                'TransportExpense' => $validated['ExpenseTransport'],
                'LoanExpense' => $validated['ExpenseCredit'],
                'UtilitiesExpense' => $validated['UtilitiesExpense'],
                'OtherExpense' => $validated['ExpenseOther'],
            ],

            'Bank' => [
                'BankDirectDeposit' => $validated['BankDirectDeposit'] ?? 1,
                'BankCardType' => $validated['BankCard'],
                'BankSortCode' => $validated['BankSortCode'],
                'BankAccountNumber' => $validated['BankAccountNumber'],
                'BankYears' => $validated['BankYears'] ?? 1,
            ],

            'Consent' => [
                'MarketingSms' => $validated['ConsentMarketing'],
                'MarketingPhone' => $validated['ConsentMarketing'],
                'MarketingEmail' => $validated['ConsentMarketing'],
            ]
        ];

        try {
            // Send POST request to external portal (replace with actual endpoint)
            $response = Http::post('https://portal.test/api/submit', $portalData);

            // Check if the request was successful
            if ($response->successful()) {
                // Return the response from the portal along with the application ID
                return response()->json([
                    'status' => $response->json(['Status']),
                    'applicationId' => $response->json(['LeadID']),
                    'portalResponse' => $response->json(), // The response from the portal
                ], 201);
            } else {
                // Handle portal failure, e.g., return an error response
                return response()->json([
                    'status' => 'error',
                    'message' => 'Failed to send application to portal.',
                ], $response->status());
            }
        } catch (\Exception $e) {
            // Handle any exception that occurs during the request to the portal
            return response()->json([
                'status' => 'error',
                'message' => 'An error occurred while communicating with the portal.',
                'error' => $e->getMessage(),
            ], 500);
        }
    }


    /**
     * Get the status of a loan application by polling the external portal.
     *
     * @param int $applicationId
     * @return JsonResponse
     */
    public function status(string $applicationId)
    {
        // Initialize a timeout value in seconds
        $timeout = 10;  // Timeout after 10 seconds
        $pollInterval = 3;  // Poll every 3 seconds
        $elapsedTime = 0;

        // Start polling the portal for status
        while ($elapsedTime < $timeout) {
            try {
                // Send GET request to check the status of the loan application from the portal
                $response = Http::get("https://portal.test/api/app/status/{$applicationId}");

                // If the response is successful
                if ($response->successful()) {
                    // Assuming the portal returns the application status in a field called 'applicationStatus'
                    $applicationStatus = $response->json(['Status']) ?? null;

                    // If the status is not 'pending', return the status
                    if ($applicationStatus && $applicationStatus !== 'processing') {
                        return response()->json([
                            'Status' => $response['Status'],
                            'RedirectURL' => $response['RedirectURL'] ?? '',
                        ]);
                    }
                }

            } catch (\Exception $e) {
                // Handle exception if any error occurs during the request
                return response()->json([
                    'status' => 'error',
                    'message' => 'Error while checking application status from the portal.',
                    'error' => $e->getMessage(),
                ], 500);
            }

            // Wait for the poll interval before checking again
            sleep($pollInterval);
            $elapsedTime += $pollInterval;
        }

        // If the status is still pending after the timeout, reject the application
        return response()->json([
            'status' => 'error',
            'applicationStatus' => 'rejected',  // Default to 'rejected' after timeout
        ]);
    }
}

