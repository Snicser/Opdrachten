<?php

namespace App\Http\Controllers;

use App\Http\Requests\CollectNumbersRequest;
use App\Services\NumberService;
use Illuminate\Contracts\View\View;

class HomeController extends Controller
{
    public function index(): View
    {
        return view('welcome');
    }

    public function store(CollectNumbersRequest $request, NumberService $numberService): View
    {
        $validated = $request->validated();

        // Normally try catch and display if there was error in the service
        $response = $numberService->generateList($validated['numbers'], $validated['max-list-numbers']);

        // Normally also redirect back and not return a view
        return view('welcome', compact('response', 'validated'));
    }
}
