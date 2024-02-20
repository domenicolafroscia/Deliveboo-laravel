<?php

namespace Database\Seeders;

use App\Models\Meal;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Functions\Helpers;

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
                $meal->name = $row[0];
                $meal->price = $row[1];
                $meal->description = $row[2];
                $meal->restaurant_id = $row[3];
               
                $meal->save();
            }
        }
    }
}