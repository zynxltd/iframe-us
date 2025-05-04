<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;

class FormController extends Controller
{
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
