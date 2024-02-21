<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Restaurant;
use Illuminate\Http\Request;

class RestaurantController extends Controller
{
    public function index() {
        $restaurants = Restaurant::with('categories')->get();
        
        return response()->json([
            'results' => $restaurants,
            'success' => true
        ]);
    }

    public function show(string $slug) {
        $restaurant = Restaurant::with('meals')->where('slug', $slug)->first();

        if ($restaurant) {
            return response()->json([
                'results' => $restaurant,
                'success' => true
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Nessun ristorante trovato'
            ]);
        }
    }
}
