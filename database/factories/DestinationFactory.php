<?php

namespace Database\Factories;

use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Destination>
 */
class DestinationFactory extends Factory
{
   /**
    * Define the model's default state.
    *
    * @return array<string, mixed>
    */
   public function definition(): array
   {
      $controller = new Controller;
      $name = fake()->city();
      $slug = $controller->generateSlug($name);

      return compact('name', 'slug');
   }
}
