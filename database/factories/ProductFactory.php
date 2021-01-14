<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Product::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name'=>$this->faker->name,
            'description'=> $this->faker->sentence,
            'is_wireless'=> $this->faker->boolean,
            'photo_url'=>"https://cdn.shopify.com/s/files/1/0024/9803/5810/products/405456-Product-0-I_1024x1024.jpg",
            'price'=> $this->faker->randomDigit,

        ];
    }
}
