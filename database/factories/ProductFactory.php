<?php

namespace Database\Factories;
use  App\Models\product;
use  App\Models\category;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $category= category::inRandomOrder()->limit(1)->first(['id']);
        $status=['active','draft'];
        $name=$this->faker->name();
        return [
        'name' => $name,
        'slug'=>Str::slug($name),
        'category_id' => $category? $category->id:null,
        'description' => $this->faker->words(200,true),
        'quantity'=>$this->faker->randomFloat(2,50,2000),
        'price'=>$this->faker->randomFloat(0,0,30),
        'img_path'=>$this->faker->imageUrl(),
        'status'=>$status[rand(0,1)],
        ];
    }
}
