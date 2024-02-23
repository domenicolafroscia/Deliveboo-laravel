<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreRestaurantRequest;
use App\Http\Requests\UpdateRestaurantRequest;
use App\Models\Category;
use App\Models\Meal;
use App\Models\Restaurant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class RestaurantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::user()->restaurant) {
            $restaurant = Auth::user()->restaurant;
            $meals = $restaurant->meals;
            return view('admin.restaurants.index', compact('restaurant', 'meals'));
        } else {
            return redirect()->route('admin.restaurants.create');
        }      
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(Auth::user()->restaurant) {
            return redirect()->route('admin.restaurants.index');
        }
        $categories = Category::all();
        return view('admin.restaurants.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRestaurantRequest $request)
    {
        $form_data = $request->validated();
        $new_restaurant = new Restaurant();
        $new_restaurant->fill($form_data);
        $new_restaurant->user_id = Auth::user()->id;

        if ($request->hasFile('image')) {
            $path = Storage::put('restaurant_images', $request->image);
            $new_restaurant->image = $path;
        }

        $new_restaurant->save();

        if ($request->has('categories')) {
            $new_restaurant->categories()->attach($request->categories);
        }

        return redirect()->route('admin.restaurants.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        return abort(404);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        $categories = Category::all();
        $restaurant = Auth::user()->restaurant;
        return view('admin.restaurants.edit', compact('restaurant', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRestaurantRequest $request, Restaurant $restaurant)
    {
        $form_data = $request->validated(); 

        if($request->hasFile('image')) {
            if($restaurant->image) {
                Storage::delete($restaurant->image);
            }

            $path = Storage::put('restaurant_images', $request->image);
            $form_data['image'] = $path;
        }

        $restaurant->update($form_data);

        if ($request->has('categories')) {
            $restaurant->categories()->sync($form_data['categories']);
        } else {
            $restaurant->categories()->sync([]);
        }

        return redirect()->route('admin.restaurants.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return abort(404);
    }
}
