<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreOrderRequest;
use App\Models\Meal;
use App\Models\Order;
use App\Models\Restaurant;
use Braintree\Gateway;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function generateToken(Request $request, Gateway $gateway)
    {
        $token = $gateway->clientToken()->generate();
        return response()->json([
            'success' => true,
            'token' => $token
        ]);
    }

    public function makePayment(Request $request, Gateway $gateway)
    {
        $results = $gateway->transaction()->sale([
            'amount' => $request->amount, //spesa totale fare controlli con id prodotti
            'paymentMethodNonce' => $request->token,
            'options' => [
                'submitForSettlement' => true
            ]
        ]);

        if($results->success) {
            return response()->json([
                'results' => true,
                'message' => 'Payment success'
            ]);
        } else {
            return response()->json([
                'results' => false,
                'message' => 'Payment denied'
            ]);
        }
    }

    // public function store(StoreOrderRequest $request) {
    //     $form_data = $request->validated();

    //                 // check id meals for price and restaurant
    //                 //   $collection = collect($response->json())
    //                 // $meals_id = $collection->cart->pluck('meal_id');
    //                 // $meals = Meal::whereIn('id', $meals_id)->get();
    //                 // $price_order_tot = 0;
    //                 // foreach($meals as $meal) {
    //                 //     $price_order_tot += $meal->price;
    //                 // }

    //                 // $restaurant = Restaurant::whereIn('id', $meals_id)->get();
    //                 // if(count($restaurant > 1)) {
    //                 //     return response()->json([
    //                 //         'success' => false,
    //                 //         'results' => 'Two different Restaurants'
    //                 //     ]);
    //                 // }

    //     $order = new Order();
    //     $order->fill($form_data);


    //     // $order->price_tot = $price_order_tot;
    //     $order->save();

    //     // foreach($form_data->cart as $item) {
    //     //     $order->meals()->attach($item->meals_id, ['quantity' => $item->quantity]);
    //     // } 

    //     return response()->json([
    //         'success' => true,
    //         'results' => $form_data
    //     ]);
    // }
}
