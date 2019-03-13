<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Facades\DishRepository;
use App\Repositories\Facades\TypeDishRepository;
use File;

class DishController extends Controller
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
            $dish = DishRepository::where('name', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $dish = DishRepository::latest()->paginate($perPage);
        }

        return view('admin.dish.index', compact('dish'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $typeDishes = TypeDishRepository::get()->pluck('name', 'id');

        return view('admin.dish.create', compact('typeDishes'));
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
            'price' => 'required|numeric|min:10000',
            'image' => 'required|image',
            'typeDish' => 'required',
        ]);
        $requestData = $request->except(['image', 'typeDish']);
        $requestData['type_dish_id'] = $request->typeDish;
        $dish = DishRepository::create($requestData);
        DishRepository::storeImage($dish, $request->image);

        return redirect('admin/dish')->with('flash_message', 'Dish added!');
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
        $dish = DishRepository::with('typeDish')->findOrFail($id);

        return view('admin.dish.show', compact('dish'));
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
        $dish = DishRepository::with('typeDish')->findOrFail($id);
        $typeDishes = TypeDishRepository::get()->pluck('name', 'id');

        return view('admin.dish.edit', compact('dish', 'typeDishes'));
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
            'price' => 'required|numeric|min:10000',
            'image' => 'image',
            'typeDish' => 'required',
        ]);
        $requestData = $request->except(['image', 'typeDish']);
        $requestData['type_dish_id'] = $request->typeDish;
        $dish = DishRepository::findOrFail($id);
        $dish->update($requestData);
        if ($request->image != null) {
            DishRepository::storeImage($dish, $request->image);
        }

        return redirect('admin/dish')->with('flash_message', 'Dish updated!');
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
        $dish = DishRepository::findOrFail($id);
        File::delete($dish->link_image);
        DishRepository::destroy($id);

        return redirect('admin/dish')->with('flash_danger', 'Dish deleted!');
    }
}
