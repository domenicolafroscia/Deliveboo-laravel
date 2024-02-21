<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Restaurant;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index() {
        $categories = Category::all();

        return response()->json([
            'results' => $categories,
            'success' => true
        ]);
    }

    public function show(string $slug) {
        $restaurants = Category::with('restaurants')->where('slug', $slug)->get();
        return response()->json([
            'results' => $restaurants,
            'success' => true
        ]);
    }
}
