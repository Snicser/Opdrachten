<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\RideCollection;
use App\Models\Ride;

class TaxiCompanyController extends Controller
{
    public function show($id): RideCollection
    {
        $data = Ride::where('taxi_company_id', $id)->get();
        return new RideCollection($data);
    }
}
