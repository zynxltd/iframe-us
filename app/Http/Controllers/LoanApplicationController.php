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
        // Validate incoming request
        $validated = $request->validate([
            'MinCommission' => 'nullable',
            'MaxCommission' => 'nullable',

            'AffID' => 'required|string|max:255',
            'OfferID' => 'required|integer',
            'Campaign' => 'nullable|string|max:255',
            'AffSub' => 'nullable|string|max:255',
            'AffSub2' => 'nullable|string|max:255',
            'AffSub3' => 'nullable|string|max:255',
            'AffSub4' => 'nullable|string|max:255',
            'AffSub5' => 'nullable|string|max:255',
            'CreationUrl' => 'required|string|max:255',
            'ReferrerUrl' => 'required|string|max:255',
            'IpAddress' => 'required|string',
            'UserAgent' => 'required|string',

            'LoanAmount' => 'required|min:0',
            'LoanTerm' => 'required|int|in:1,2,3,4,5,6',
            'LoanPurpose' => 'required|int|in:1,2,3,4,5,6,7,8,9',

            'Title' => 'required|int|in:1,2,3,4',
            'FirstName' => 'required|string|max:255',
            'LastName' => 'required|string|max:255',
            'DateOfBirth' => 'required|string',
            'MobilePhone' => 'required|string|max:20',
            'HomePhone' => 'required|string|max:20',
            'Email' => 'required|email|max:255',
            'MaritalStatus' => 'required|int|in:1,2,3,4,5,6,7',
            'Dependants' => 'required|int|in:1,2,3,4,5',
            'RecentLoanCount' => 'required|in:1,2,3,4,5',
            'AdultsLivingWith' => 'required|in:1,2,3,4,5',

            'ResidentialStatus' => 'required|int|in:1,2,3,4,5',
            'HouseNameNumber' => 'required|string|max:100',
            'StreetAddress' => 'required|string|max:255',
            'County' => 'required|string',
            'City' => 'required|string',
            'Postcode' => 'required|string|max:8',
            'AddressYears' => 'required|in:1,2,3,4,5,6,7,8,9,10,11',

            'EmploymentStatus' => 'required|int|in:1,2,3,4,5,6',
            'IncomeFrequency' => 'required|int|in:1,2,3,4',
            'EmployerName' => 'required|string|max:255',
            'JobTitle' => 'required|string|max:255',
            'EmploymentIndustry' => 'required|int|in:1,2,3,4,5,6',
//            'WorkPhone' => 'sometimes|string|max:255',
            'NextPayDate' => 'required|string|max:255',
            'FollowingPayDate' => 'required|string|max:255',
            'EmployerYears' => 'required|in:1,2,3,4,5,6,7,8,9,10,11',
            'NetMonthlyIncome' => 'required|numeric|min:0',

            'ExpenseMonthlyMortgageRent' => 'required|int|in:1,2,3,4',
            'ExpenseCouncil' => 'required|int|in:1,2,3,4',
            'ExpenseFood' => 'required|int|in:1,2,3,4',
            'ExpenseTransport' => 'required|int|in:1,2,3,4',
            'ExpenseCredit' => 'required|int|in:1,2,3,4',
            'ExpenseUtilities' => 'required|int|in:1,2,3,4',
            'ExpenseOther' => 'required|int|in:1,2,3,4',

            'BankDirectDeposit' => 'required|in:1,2',
            'BankCard' => 'required|int|in:1,2,3',
            'BankAccountNumber' => 'required|string',
            'BankSortCode' => 'required|string',
//            'BankYears' => 'in:1,2,3,4,5,6,7,8,9,10',

            'ConsentFinancial' => 'required',
            'MarketingSms' => 'nullable',
            'MarketingPhone' => 'nullable',
            'MarketingEmail' => 'nullable',
        ]);

        // Save the loan application
        $loanApplication = LoanApplication::create($validated)->toArray();



        try {
            // Send POST request to external portal (replace with actual endpoint)
            $response = Http::post('https://portal.test/api/submit', $loanApplication);
//            dd($response->successful());

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
     * @param string $applicationId
     * @return JsonResponse
     */
    public function status(string $applicationId): JsonResponse
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

