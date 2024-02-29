<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\OrderRequest;
use App\Mail\CustomerMail;
use App\Mail\RestaurantMail;
use App\Models\Meal;
use App\Models\Order;
use App\Models\Restaurant;
use Braintree\Gateway;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

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

    public function makePayment(OrderRequest $request, Gateway $gateway)
    {
           $amount = 0;
        foreach($request->cart as $meal) {
            for($i = 0; $i < $meal["quantity"]; $i++) {
                $amount += Meal::find($meal["id"])->price;
            }
        }

        if($request->amount != $amount) {
            return response()->json([
                'results' => false,
                'message' => 'Error for amount'
            ]);
        }  
 
        $results = $gateway->transaction()->sale([
            'amount' => $request->amount, 
            'paymentMethodNonce' => $request->token,
            'options' => [
                'submitForSettlement' => true
            ]
        ]);

        if($results->success) {
            $order = new Order();
            $order->price_tot = $request->amount;
            $order->customer_name = $request->customer_name;
            $order->customer_address = $request->customer_address;
            $order->customer_phone = $request->customer_phone;
            $order->status = 1;

            $order->save();

            foreach($request->cart as $meal) {
                $order->meals()->attach($meal["id"], ['quantity' => $meal["quantity"]]);
                } 
            

            // Customer mail
            $_meal_id = $order->meals()->first()->id;
            $restaurant = Restaurant::where('id', $_meal_id)->first();
            Mail::send(new CustomerMail($order, $restaurant));

            //Restaurant mail
            Mail::send(new RestaurantMail($order, $restaurant));

            return response()->json([
                'results' => true,
                'message' => 'Payment success',
                'cart' => $request->cart 
                ]);

        } else {
            return response()->json([
                'results' => false,
                'message' => 'Payment denied'
            ]);
        }
    }

  


    //     
    //     $order->fill($form_data);


    //     // $order->price_tot = $price_order_tot;
    //     

    //     // foreach($form_data->cart as $item) {
    //     //     $order->meals()->attach($item->meals_id, ['quantity' => $item->quantity]);
    //     // } 

    //     return response()->json([
    //         'success' => true,
    //         'results' => $form_data
    //     ]);
    // }
}
