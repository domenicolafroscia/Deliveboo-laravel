<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Functions\Helpers;
use App\Models\Category;
use App\Models\Restaurant;
use Illuminate\Support\Facades\DB;

class RestaurantsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $file_path = __DIR__ . "/restaurants.csv";
        $data = Helpers::getCsvData($file_path);

        foreach ($data as $index => $row) {
           if($index !== 0) {
                $restaurant = new Restaurant();
                $restaurant->name = $row[0];
                $restaurant->email = $row[1];
                $restaurant->phone = $row[2];
                $restaurant->address = $row[3];
                $restaurant->p_iva = $row[4];
                $restaurant->image = $row[5];
                $restaurant->user_id = $row[6];
                //dd($restaurant);

                $restaurant->save();
                $restaurant->categories()->attach($row[7]);
                
           }
        } 
        
    }
}
