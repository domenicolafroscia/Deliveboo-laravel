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
        for ($i = 1; $i < 10; $i++) {

            $order = new Order();
            $order->price_tot = mt_rand(1, 40);
            $order->customer_name = $faker->sentence(1);
            $order->customer_address = $faker->sentence(3);
            $order->customer_phone = $faker->phoneNumber();
            $order->status = $faker->boolean();
            $meal_id = Meal::where('restaurant_id', $i)->first();
            $order->save();
            $order->meals()->attach($meal_id, ['quantity' => rand(1,3)]);
        }
    }
}
