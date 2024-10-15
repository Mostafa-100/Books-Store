<?php

namespace Database\Factories;

use App\Models\Author;
use App\Models\Publisher;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Book>
 */
class BookFactory extends Factory
{
  /**
   * Define the model's default state.
   *
   * @return array<string, mixed>
   */
  public function definition(): array
  {
    return [
      'title' => fake()->sentence(),
      'isbn' => fake()->uuid(),
      'numberOfPages' => fake()->numberBetween(10, 900),
      'publishDate' => fake()->date(),
      'dimensions' => fake()->numberBetween(10, 300) . 'x' . fake()->numberBetween(10, 300),
      'price' => fake()->randomFloat(2, 5, 100),
      'excerpt' => fake()->text(),
      'about' => fake()->text(),
      'publisher_id' => Publisher::all()->random()->id,
      'author_id' => Author::all()->random()->id,
      'coverUrl' => '9780593815212.1bce28fa3de72e7cffb54c1c62f732a6.png'
    ];
  }
}
