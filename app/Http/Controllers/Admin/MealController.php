<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreMealRequest;
use App\Http\Requests\UpdateMealRequest;
use App\Models\Meal;
use App\Models\Restaurant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class MealController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       /*  $restaurant = Restaurant::where('user_id', Auth::user()->id)->first();
        $meals = Meal::where('restaurant_id', $restaurant->id)->get();
        return view('admin.meals.index', compact('meals', 'restaurant')); */
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.meals.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreMealRequest $request)
    {
        $form_data = $request->validated();

        //Check if the name of the meal already exist in this restaurant
      /*   $form_data_name = $form_data["name"];

        $meals_name = Meal::where('name',$form_data_name)->get();
       
        foreach ($meals_name as $meal_name) {
            if (Auth::user()->id == $meal_name['restaurant_id'] ) {
               
               return redirect()->route('admin.meals.create')->with('message',"The name already exists in your menù, please choose another one!");
           }          
        }   */
        // Save the meal into db
        $meal = new Meal();
        $restaurant = Restaurant::where('user_id',Auth::user()->id)->first();

        $meal->slug = Str::slug($form_data["name"] . "-" . $restaurant->name);
        $meal->fill($form_data);

        if($request->hasFile('image')) {
            $path = Storage::put('meal_images', $request->image);
            $meal->image = $path;
        }

        $restaurant = Restaurant::where('user_id', Auth::user()->id)->first();
        $meal->restaurant_id = $restaurant->id;

        $meal->save();

        return redirect()->route('admin.restaurants.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Meal $meal)
    {   
        /* $meal= Meal::findOrFail($id); */
        
        $this->checkUser($meal);

        return view('admin.meals.show', compact('meal'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Meal $meal)
    {
        /* $meal= Meal::findOrFail($id); */
        $this->checkUser($meal);
        return view('admin.meals.edit', compact('meal'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateMealRequest $request, Meal $meal)
    {
        $form_data = $request->validated(); 
         //Check if the name of the meal already exist in this restaurant
          
        /* dd($form_data["name"]); */

        /* $meal = Meal::where('name',$form_data["name"])->where('restaurant_id',Auth::user()->id)->first(); */
        
        /* if($form_data["name"] == $meal->name){

        } */
         /* if($meal_id['name'] == $meal['name']){
            
         }  */

        /* if (!($meal['id'] === $meal_id->id)) { */
          /*   $meals_name = Meal::where('name',$form_data_name)->get();
           if($meals_name){
             foreach ($meals_name as $meal_name) {
                if ((Auth::user()->id == $meal_name['restaurant_id']) && ($meal_name['name'] == $meal['name']) && ($meal['id'] != $meal_name['id'])) {
                   
                   return redirect()->route('admin.meals.edit',['meal'=>$meal->slug])->with('message',"The name already exists in your menù, please choose another one!");
               }          
            }
            } */
            
       /*  } */
         
         $this->checkUser($meal);

        if($request->hasFile('image')) {
            if($meal->image) {
                Storage::delete($meal->image);
            }

            $path = Storage::put('meal_images', $request->image);
            $form_data['image'] = $path;
        }

        $restaurant = Restaurant::where('user_id',$meal->restaurant_id )->first();
        $meal->slug = Str::slug($form_data["name"] . "-" . $restaurant->name);
        $meal->update($form_data);
        


        return redirect()->route('admin.meals.show', compact('meal'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Meal $meal)
    {
        /* $meal = Meal::findOrFail($id); */
        $meal->delete();

        return redirect()->route('admin.restaurants.index');
    }

    private function checkUser(Meal $meal) {
        $restaurant = Auth::user()->restaurant;
        if($meal->restaurant_id !== $restaurant->id) {
            abort(404);
        } 
    }
}
