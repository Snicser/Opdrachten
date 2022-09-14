<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreRideRequest;
use App\Http\Resources\UserCollection;
use App\Models\Ride;
use App\Models\User;
use Illuminate\Http\JsonResponse;

class CallCenterController extends Controller
{
    public function index(): UserCollection
    {
        return new UserCollection(User::all());
    }

    public function store(StoreRideRequest $request): JsonResponse
    {
        $validated = $request->validated();

        Ride::create($validated);

        return response()->json(['data' => 'Rit ingeboekt voor bewoner!']);
    }
}
