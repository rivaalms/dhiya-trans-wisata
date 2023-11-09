<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Image>
 */
class ImageFactory extends Factory
{
   /**
    * Define the model's default state.
    *
    * @return array<string, mixed>
    */
   public function definition(): array
   {
      $uuid = fake()->uuid();
      // $vehicle_id = fake()->numberBetween(1, 10);
      $path = /* fake()->imageUrl(); */ null;
      $is_cover = false;
      return compact('uuid', 'path', 'is_cover');
   }
}
