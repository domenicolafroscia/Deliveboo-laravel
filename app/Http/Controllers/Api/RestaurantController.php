<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Restaurant;
use Illuminate\Http\Request;

class RestaurantController extends Controller
{
    public function index(Request $request)
    {
        $restaurantsQuery = Restaurant::with('categories');
        if ($request->has('category_id')) {
            $category_ids = $request->category_id;
            $restaurantsQuery->whereHas('categories', fn($query) => $query->whereIn('id', $category_ids));
        }
        $restaurants = $restaurantsQuery->paginate(10);

        return response()->json([
            'results' => $restaurants,
            'success' => true
        ]);
    }

    public function show(string $slug)
    {
        $restaurant = Restaurant::with('meals')->where('slug', $slug)->first();

        if ($restaurant) {
            return response()->json([
                'results' => $restaurant,
                'success' => true
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'No restaurant found'
            ]);
        }
    }
}
