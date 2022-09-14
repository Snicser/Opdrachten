<?php

namespace App\Http\Controllers;

use App\Http\Requests\FizzBuzzNumberRequest;
use App\Services\FizzBuzzService;
use Illuminate\Contracts\View\View;

class HomeController extends Controller
{
    public function index(FizzBuzzService $fizzBuzzService): View
    {
        $results = $fizzBuzzService->displayFizzBuzzNumbers();
        return view('welcome', compact('results'));
    }

    public function store(FizzBuzzNumberRequest $request, FizzBuzzService $fizzBuzzService): View
    {
        $validatedDate = $request->validated();

        $results = $fizzBuzzService->displayFizzBuzzNumbers($validatedDate['number_of_fizz_buzzes']);
        return view('welcome', compact('results'));
    }
}
