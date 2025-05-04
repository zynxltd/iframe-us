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
            'LoanAmount' => 'required|numeric',
            'LoanTerm' => 'required|numeric',
            'LoanPurpose' => 'required|string',
            'Title' => 'required|string',
            'FirstName' => 'required|string',
            'LastName' => 'required|string',
            'DateOfBirth' => 'required|date',
            'MobilePhone' => 'required|string',
            'HomePhone' => 'nullable|string',
            'Email' => 'required|email',
            'Dependants' => 'required|numeric',
            'EmploymentStatus' => 'required|string',
            'EmployerName' => 'required|string',
            'JobTitle' => 'required|string',
            'EmployerIndustry' => 'required|string',
            'EmployerYears' => 'required|numeric',
            'NextPayDate' => 'required|date',
            'FollowingPayDate' => 'required|date',
            'HouseNameNumber' => 'required|string',
            'StreetAddress' => 'required|string',
            'County' => 'required|string',
            'City' => 'required|string',
            'Postcode' => 'required|string',
            'AddressYears' => 'required|numeric',
            'ExpenseTransport' => 'required|numeric',
            'ExpenseFood' => 'required|numeric',
            'ExpenseCredit' => 'required|numeric',
            'ExpenseCouncil' => 'required|numeric',
            'ExpenseOther' => 'required|numeric',
            'BankCard' => 'required|string',
            'BankAccountNumber' => 'required|string',
            'BankSortCode' => 'required|string',
            'ConsentMarketing' => 'required|boolean',
        ]);

        // Save the loan application
        $loanApplication = LoanApplication::create($validated);

        // Prepare data to send to the portal
        $portalData = [
            'LoanAmount' => $validated['LoanAmount'],
            'LoanTerm' => $validated['LoanTerm'],
            'LoanPurpose' => $validated['LoanPurpose'],
            'Title' => $validated['Title'],
            'FirstName' => $validated['FirstName'],
            'LastName' => $validated['LastName'],
            'DateOfBirth' => $validated['DateOfBirth'],
            'MobilePhone' => $validated['MobilePhone'],
            'HomePhone' => $validated['HomePhone'],
            'Email' => $validated['Email'],
            // Add any other fields you want to send to the portal
        ];

        try {
            // Send POST request to external portal (replace with actual endpoint)
            $response = Http::post('http://portal.test/api/loan-application', $portalData);

            // Check if the request was successful
            if ($response->successful()) {
                // Return the response from the portal along with the application ID
                return response()->json([
                    'status' => 'success',
                    'applicationId' => $loanApplication->id,
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
    public function status(int $applicationId)
    {
        // Initialize a timeout value in seconds
        $timeout = 10;  // Timeout after 10 seconds
        $pollInterval = 3;  // Poll every 3 seconds
        $elapsedTime = 0;

        // Start polling the portal for status
        while ($elapsedTime < $timeout) {
            try {
                // Send GET request to check the status of the loan application from the portal
                $response = Http::get("http://portal.test/api/loan-application/status/{$applicationId}");

                // If the response is successful
                if ($response->successful()) {
                    // Assuming the portal returns the application status in a field called 'applicationStatus'
                    $applicationStatus = $response->json()['applicationStatus'] ?? null;

                    // If the status is not 'pending', return the status
                    if ($applicationStatus && $applicationStatus !== 'pending') {
                        return response()->json([
                            'status' => 'success',
                            'applicationStatus' => $applicationStatus,
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

