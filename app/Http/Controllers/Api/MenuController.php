<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Facades\MenuRepository;

class MenuController extends Controller
{
    public function index(Request $request)
    {
        $perPage = 10;
        $menu = MenuRepository::with('typeMenu', 'dishes')->latest()->paginate($perPage);
        foreach ($menu as $key => $value) {
            $value['collapse'] = true;
        }
        // dd($menu);

        return response()->json(['result' => $menu]);
    }
}
