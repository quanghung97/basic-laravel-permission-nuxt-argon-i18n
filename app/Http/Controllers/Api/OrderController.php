<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Facades\OrderRepository;
use App\Repositories\Facades\ConfirmationRepository;

class OrderController extends Controller
{
    public function index(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'address' => 'required',
            'phone' => 'required',
        ]);
        $order = OrderRepository::create($request->all());
        ConfirmationRepository::create(['order_id' => $order->id]);

        return response(['data' => $order, 'message' => 'success']);
    }
}
