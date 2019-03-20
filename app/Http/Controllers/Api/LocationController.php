<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Facades\TypeServiceRepository;

class LocationController extends Controller
{
    /**
     * get list locations have type: wedding and outside wedding
     *
     * @param Request $request
     *
     * @return json
     */
    public function index(Request $request)
    {
        $perPage = 10;
        $location = TypeServiceRepository::findOrFail(1)->locations()
        ->with('status', 'typeServices')->paginate($perPage);

        return response()->json(['result' => $location]);
    }

    /**
     * get list locations have type: outside wedding service
     *
     * @param Request $request
     *
     * @return json
     */
    public function outsideWedding(Request $request)
    {
        $perPage = 10;
        $outside = TypeServiceRepository::findOrFail(8)->locations()->with('status')->paginate($perPage);

        return response()->json(['result' => $outside]);
    }

    /**
     * get list locations have type: friendship workshop
     *
     * @param Request $request
     *
     * @return json
     */
    public function friendshipWorkshop(Request $request)
    {
        $perPage = 10;
        $workshop = TypeServiceRepository::findOrFail(6)->locations()->with('status')->paginate($perPage);

        return response()->json(['result' => $workshop]);
    }

    /**
     * get list locations have type: customer gratitude
     *
     * @param Request $request
     *
     * @return json
     */
    public function customerGratitude(Request $request)
    {
        $perPage = 10;
        $customerGratitude = TypeServiceRepository::findOrFail(4)->locations()->with('status')->paginate($perPage);

        return response()->json(['result' => $customerGratitude]);
    }

    /**
     * get list locations have type: birthday
     *
     * @param Request $request
     *
     * @return json
     */
    public function birthday(Request $request)
    {
        $perPage = 10;
        $birthday = TypeServiceRepository::findOrFail(2)->locations()->with('status')->paginate($perPage);

        return response()->json(['result' => $birthday]);
    }

    /**
     * get list locations have type: music and fashion
     *
     * @param Request $request
     *
     * @return json
     */
    public function musicFashion(Request $request)
    {
        $perPage = 10;
        $musicFashion = TypeServiceRepository::findOrFail(3)->locations()->with('status')->paginate($perPage);

        return response()->json(['result' => $musicFashion]);
    }

    /**
     * get list locations have type: outside - catering
     *
     * @param Request $request
     *
     * @return json
     */
    public function outsideCatering(Request $request)
    {
        $perPage = 10;
        $outsideCatering = TypeServiceRepository::findOrFail(7)->locations()->with('status')->paginate($perPage);

        return response()->json(['result' => $outsideCatering]);
    }
}
