<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Facades\LocationRepository;

class LocationController extends Controller
{
    public function index(Request $request)
    {
        $perPage = 10;
        $location = LocationRepository::with('typeServices', 'status')->latest()->paginate($perPage);
        //$count = LocationRepository::count();

        return response()->json(['result' => $location]);
    }
}
