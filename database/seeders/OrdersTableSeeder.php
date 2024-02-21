<?php

namespace Database\Seeders;

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
        for ($i = 0; $i < 10; $i++) {

            $order = new Order();
            $order->price_tot = mt_rand(1, 40);
            $order->customer_name = $faker->sentence(1);
            $order->customer_address = $faker->sentence(3);
            $order->customer_phone = $faker->phoneNumber();
            $order->status = $faker->boolean();
            
            $order->save();
        }
    }
}
