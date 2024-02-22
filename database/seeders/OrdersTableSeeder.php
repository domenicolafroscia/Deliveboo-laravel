<?php

namespace Database\Seeders;

use App\Models\Meal;
use App\Models\Order;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

class OrdersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i = 1; $i < 9; $i++) {

            $tot = 0;
            $quantity = rand(1,9);


            $meal = Meal::where('restaurant_id', $i)->first();
            $meal_2 = Meal::where('id',$meal->id + 1)->first();

            for ($j=0; $j < $quantity; $j++) { 
                $tot += $meal->price;
            }

            $tot += $meal_2->price;
            $order = new Order();

            $order->customer_name = $faker->firstName() . ' ' . $faker->lastName();
            $order->customer_address = $faker->streetAddress();
            $order->customer_phone = $faker->phoneNumber();
            $order->status = $faker->boolean();
            $order->price_tot = $tot;
            $order->customer_note = $faker->realText($maxNbChars = 100, $indexSize = rand(1,2));
            $order->save();
            $order->meals()->attach($meal->id, ['quantity' => $quantity]);
            $order->meals()->attach($meal_2->id, ['quantity' => 1] );
            
        }
    }
}
