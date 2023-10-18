<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Price>
 */
class PriceFactory extends Factory
{
   /**
    * Define the model's default state.
    *
    * @return array<string, mixed>
    */
   public function definition(): array
   {
      $vehicle_id = fake()->numberBetween(1, 10);
      $destination_id = fake()->numberBetween(1, 10);
      $duration = fake()->numberBetween(1, 7);
      $price = fake()->numberBetween(100000, 1000000);

      return compact('vehicle_id', 'destination_id', 'duration', 'price');
   }
}
