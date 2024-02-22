<?php

namespace Database\Seeders;

use App\Models\Meal;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Functions\Helpers;
use App\Models\Restaurant;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class MealsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $file_path = __DIR__ . "/meals.csv";
        $data = Helpers::getCsvData($file_path);

        foreach ($data as $index => $row) {
            if ($index !== 0) {
                $meal = new Meal();
                $meal->restaurant_id =$row[4];
                $meal->price = $row[2];
                $meal->description = $row[3];
                $meal->name = $row[0];
                $meal->image = $row[1];
                $restaurant = Restaurant::where('user_id',$meal->restaurant_id )->first();
                // dd($restaurant);
                $meal->slug = Str::slug($meal->name . "-" . $restaurant->name );
               
                $meal->save();
            }
        }
    }
}
