<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Facades\LocationRepository;
use App\Repositories\Facades\ConfirmationRepository;
use App\Repositories\Facades\MenuRepository;

class ConfirmationController extends Controller
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
            $confirmation = ConfirmationRepository::with('order')->where('name', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $confirmation = ConfirmationRepository::with('order')->latest()->paginate($perPage);
        }

        return view('admin.confirmation.index', compact('confirmation'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $locations = LocationRepository::where('status_id', 1)->get()->pluck('name', 'id');
        $menus = MenuRepository::get()->pluck('name', 'id');

        return view('admin.confirmation.create', compact('locations', 'menus'));
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
        $confirmation = ConfirmationRepository::with('menu', 'order')->findOrFail($id);

        return view('admin.confirmation.show', compact('confirmation'));
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
    }
}
