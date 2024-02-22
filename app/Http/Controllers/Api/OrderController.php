<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreOrderRequest;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function store(StoreOrderRequest $request) {
        $form_data = $request->validated();
        // $order = new Order();
        // $order->fill($form_data);
        // $order->save();
        // $order->meals()->attach($request->meals_id);

        return response()->json([
            'success' => true,
            'data' => $form_data
        ]);
    }
}
