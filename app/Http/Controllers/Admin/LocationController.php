<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Facades\StatusRepository;
use App\Repositories\Facades\LocationRepository;
use App\Repositories\Facades\TypeServiceRepository;
use File;

class LocationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $keyword = $request->get('search');
        $perPage = 10;

        if (!empty($keyword)) {
            $location = LocationRepository::where('name', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $location = LocationRepository::latest()->paginate($perPage);
        }

        return view('admin.location.index', compact('location'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $typeServices = TypeServiceRepository::get()->pluck('name', 'name');
        $statuses = StatusRepository::get()->pluck('name', 'id');

        return view('admin.location.create', compact('typeServices', 'statuses'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'address' => 'required',
            'min_people' => 'required|numeric|min:1',
            'max_people' => 'required|numeric|gt:min_people',
            'image' => 'required|image',
            'typeServices' => 'required',
            'status' => 'required',
        ]);
        $requestData = $request->except(['image', 'typeServices']);
        $requestData['status_id'] = $request->status;
        $location = LocationRepository::create($requestData);
        $location->assignService($request->typeServices);
        LocationRepository::storeImage($location, $request->image);

        return redirect('admin/location')->with('flash_message', 'Location added!');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $location = LocationRepository::with('typeServices')->findOrFail($id);
        $typeServices = $location->typeServices->pluck('name')->toArray();
        $status = $location->status;

        return view('admin.location.show', compact('location', 'typeServices', 'status'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $location = LocationRepository::with('status')->findOrFail($id);
        $typeServices = TypeServiceRepository::get()->pluck('name', 'name');
        $statuses = StatusRepository::get()->pluck('name', 'id');

        return view('admin.location.edit', compact('location', 'typeServices', 'statuses'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int                      $id
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'address' => 'required',
            'min_people' => 'required|numeric|min:1',
            'max_people' => 'required|numeric|gt:min_people',
            'image' => 'image',
            'typeServices' => 'required',
            'status' => 'required',
        ]);
        $requestData = $request->except(['image', 'typeServices']);
        $requestData['status_id'] = $request->status;
        $location = LocationRepository::with('typeServices')->findOrFail($id);
        $location->update($requestData);
        $location->syncService($request->typeServices);
        if ($request->image != null) {
            LocationRepository::storeImage($location, $request->image);
        }

        return redirect('admin/location')->with('flash_message', 'Location updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $location = LocationRepository::findOrFail($id);
        File::delete($location->link_image);
        LocationRepository::destroy($id);

        return redirect('admin/location')->with('flash_danger', 'Location deleted!');
    }
}
