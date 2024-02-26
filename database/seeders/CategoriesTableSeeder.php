<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            ['name'=>'Pizzeria', 'image' =>'pizzeria.jpg'], 
            ['name' => 'Japanese',  'image' =>'japanese.jpg'],
            ['name' => 'Greek',  'image' =>'greek.jpg'],
            ['name' => 'Vegan',  'image' =>'vegan.jpg'],
            ['name' => 'Italian',  'image' =>'italian.jpg'],
            ['name' => 'Chinese',  'image' =>'chinese.jpg'],
            ['name' => 'Fast Food',  'image' =>'fast-food.jpg'],
            ['name' => 'Kebab',  'image' =>'kebab.jpg'],
         ];
       
        foreach ($categories as $category) {
            $newCategory = new Category();
            $newCategory->name = $category['name'];
            $newCategory->image = $category['image'];
            $newCategory->slug = Str::slug($newCategory->name);
           
            $newCategory->save();

        }

    }
}
