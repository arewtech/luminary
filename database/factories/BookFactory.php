<?php

namespace Database\Factories;

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
        $title = $title = str($this->faker->word())->title();
        return [
            "book_code" => "B" . $this->faker->unique()->numberBetween(1000, 9999),
            "title" => $title,
            "author" => $this->faker->name(),
            "slug" => str($title)->slug(),
            "publication_date" => $this->faker->date(),
            "status" => $this->faker->randomElement(['available', 'unavailable', 'lost']),
            "description" => $this->faker->paragraph(6),
            "cover" => $this->faker->imageUrl(640, 480, 'books', true),
        ];
    }
}
