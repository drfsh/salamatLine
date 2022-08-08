<?php

namespace Database\Factories;

use App\Models\Product;
use App\Models\Subcategory;
use App\Models\Brand;
use App\Models\Country;

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
            'title' =>  $this->faker->name,
            'slug' => $this->faker->slug,
            'image' => '01.jpg',
            'price' => $this->faker->numberBetween($min = 500000, $max = 12000000),
            'brand_id' => $this->faker->randomElement(Brand::pluck('id')->toArray()),
            'country_id' => $this->faker->randomElement(Country::pluck('id')->toArray()),
        ];
    }
}
