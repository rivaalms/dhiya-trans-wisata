<?php

namespace Database\Factories;

use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Vehicle>
 */
class VehicleFactory extends Factory
{
   /**
    * Define the model's default state.
    *
    * @return array<string, mixed>
    */
   public function definition(): array
   {
      $controller = new Controller;
      $uuid = fake()->uuid();
      $name = fake()->words(3, true);
      $slug = $controller->generateSlug($name);
      $capacity = fake()->randomNumber(2);
      $price = fake()->numberBetween(50000, 1000000);

      return compact('uuid', 'name', 'slug', 'capacity', 'price');
   }
}
