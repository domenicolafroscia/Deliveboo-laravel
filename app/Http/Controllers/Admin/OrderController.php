<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Meal;
use App\Models\Order;
use App\Models\Restaurant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function index() {
        // $restaurant = Restaurant::where('user_id', Auth::user()->id)->first();
        // $meals = Meal::where('restaurant_id', $restaurant->id)->get();
        // $meal_id_arr = [];
        // foreach($meals as $meal) {
        //     array_push($meal_id_arr, $meal->id);
        // }

        // $meal_orders = DB::table('meal_order')->whereIn('meal_id', $meal_id_arr)->get();
        // $order_id_arr = [];
        // foreach($meal_orders as $meal_order) {
        //     array_push($order_id_arr, $meal_order->order_id);
        // }

        $restaurant = Auth::user()->restaurant;
        $meal_id_arr = $restaurant->meals->pluck('id');
        
        $order_id_arr = DB::table('meal_order')->whereIn('meal_id', $meal_id_arr)->pluck('order_id');

        $orders = Order::whereIn('id', $order_id_arr)->get();

        
        return view('admin.orders.index', compact('orders'));
    }

     /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show( int $id)
    {

        $order = Order::findOrFail($id);
        $user = Auth::user();
        return view('admin.orders.show', compact('order', 'user'));
        
        //$meals = Meal::all();
        //$user = Auth::user();
        //return view('admin.orders.show', compact('order', 'user', 'meals'));
    }
}
