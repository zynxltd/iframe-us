<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;

class FormController extends Controller
{

    public function index(Request $request)
    {
//        dd($request->all());
        // Get any data you need (this is just an example)
        $trackingParams = [
            'AffID' => request()->query('AffID') ?? 'Default',
            'OfferID' => request()->query('OfferID') ?? 1,
            'AffSub' => request()->query('AffSub') ?? '',
            'AffSub2' => request()->query('AffSub2') ?? '',
            'AffSub3' => request()->query('AffSub3') ?? '',
            'AffSub4' => request()->query('AffSub4') ?? '',
            'AffSub5' => request()->query('AffSub5') ?? '',
//            'Campaign' => '', // Add other necessary data here
        ];

//        dd($trackingParams);

        // Pass data to the Inertia page
        return Inertia::render('Form', [
            'trackingParams' => $trackingParams,
        ]);

    }
    public function create()
    {
        return Inertia::render('Form');
    }

    public function store(Request $request): \Illuminate\Http\RedirectResponse
    {
        $validated = $request->validate([
            'full_name' => 'required|string|max:255',
            'email' => 'required|email',
            'amount' => 'required|numeric|min:100',
            'term' => 'required|integer|min:1',
        ]);

        // Store or process the application here

        return redirect()->route('form')->with('success', 'Application submitted!');
    }
}
