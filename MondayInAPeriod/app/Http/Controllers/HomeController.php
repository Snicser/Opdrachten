<?php

namespace App\Http\Controllers;

use App\Http\Requests\ValidateDateRequest;
use App\Services\DateService;
use Illuminate\Contracts\View\View;

class HomeController extends Controller
{
    public function index(): View
    {
        return view('welcome');
    }

    public function store(ValidateDateRequest $request, DateService $dateService): View
    {
        // Maybe parse to Carbon object in the request if possible
        $validated = $request->validated();

        $data = $dateService->calculateMondays($validated['start-date'], $validated['end-date']);

        // Normally you don't return a view but redirect with succes message, but we need the data to display
        return view('welcome', compact('data'));
    }
}
