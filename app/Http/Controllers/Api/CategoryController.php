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

    public function show($id) {
        $restaurants = Category::with('restaurants')->where('id', $id)->first();
        if($restaurants) {
            return response()->json([
                'results' => $restaurants,
                'success' => true
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'This category doesn\'t exists'
            ]);
        }
    }
}
