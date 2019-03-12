<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Facades\PermissionRepository;

class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $keyword = $request->get('search');
        $perPage = 10;

        if (!empty($keyword)) {
            $permission = PermissionRepository::where('name', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $permission = PermissionRepository::latest()->paginate($perPage);
        }

        return view('admin.permission.index', compact('permission'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.permission.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        $request->validate([
          'name' => 'required',
        ]);
        $requestData = $request->all();

        PermissionRepository::create($requestData);

        return redirect('admin/permission')->with('flash_message', 'Permission added!');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $permission = PermissionRepository::findOrFail($id);

        return view('admin.permission.show', compact('permission'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $permission = PermissionRepository::findOrFail($id);

        return view('admin.permission.edit', compact('permission'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int                      $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, $id)
    {
        $request->validate([
          'name' => 'required',
        ]);
        $requestData = $request->all();

        $permission = PermissionRepository::findOrFail($id);
        $permission->update($requestData);

        return redirect('admin/permission')->with('flash_message', 'Permission updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        PermissionRepository::destroy($id);

        return redirect('admin/permission')->with('flash_danger', 'Permission deleted!');
    }
}
