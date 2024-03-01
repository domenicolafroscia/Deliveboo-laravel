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
    public function index(Request $request)
    {
        $restaurant = Auth::user()->restaurant;
        if ($restaurant) {
            $meal_id_arr = $restaurant->meals->pluck('id');

            $order_id_arr = DB::table('meal_order')->whereIn('meal_id', $meal_id_arr)->pluck('order_id');

            $ordersQuery = Order::whereIn('id', $order_id_arr);

            if(isset($request->start_date)) {
                 $ordersQuery->whereDate('created_at', '>=', $request->start_date);
             }

             if(isset($request->end_date)) {
                 $ordersQuery->whereDate('created_at', '<=', $request->end_date);
             }

            if($request->select_order == 'asc') {
                $ordersQuery->orderBy('created_at', 'asc');
            } else if ($request->select_order == 'desc') {
                $ordersQuery->orderBy('created_at', 'desc');
            }

            $orders = $ordersQuery->get();
            return view('admin.orders.index', compact('orders'));
        } else {
            return redirect()->route('admin.restaurants.create');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(int $id)
    {
        $order = Order::findOrFail($id);

        $this->verifyOrderMeals($order);
        $user = Auth::user();
        return view('admin.orders.show', compact('order', 'user'));
    }

    private function verifyOrderMeals(Order $order)
    {
        $userRestaurantId = Auth::user()->restaurant->id;
        $meals = $order->meals;

        foreach ($meals as $meal) {
            if ($meal->restaurant_id !== $userRestaurantId) {
                abort(404);
            };
        }
    }
    // private function checkUser(Meal $meal) {
    //     $restaurant = Auth::user()->restaurant;
    //     if($meal->restaurant_id !== $restaurant->id) {
    //         abort(404);
    //     } 
}
