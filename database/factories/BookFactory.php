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
        // $titleBook = [
        //     'The Hobbit',
        //     'The Lord of the Rings',
        //     'The Silmarillion',
        //     'The Children of Húrin',
        //     'The Fall of Gondolin',
        //     'Unfinished Tales',
        //     'The History of Middle-earth',
        //     'The Adventures of Tom Bombadil',
        //     'Bilbo\'s Last Song',
        //     'The Road Goes Ever On',
        //     'The Father Christmas Letters',
        //     'The Letters of J. R. R. Tolkien',
        // ];
        // foreach ($titleBook as $title) {
        //     $title = $this->faker->randomElement($titleBook);
        // }
        return [
            "book_code" => "B" . $this->faker->unique()->numberBetween(1000, 9999),
            // "title" => $title,
            "author" => $this->faker->name(),
            // "slug" => str($title)->slug(),
            "publication_date" => $this->faker->date(),
            "status" => 'available',
            // "status" => $this->faker->randomElement(['available', 'unavailable', 'lost']),
            "description" => $this->faker->paragraph(3),
            "cover" => $this->faker->imageUrl(640, 480, 'books', true),
        ];
    }
}
