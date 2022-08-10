<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

use App\Models\Author;
use App\Models\Book;

class RatingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $book = Book::all()->random();

        return [
            'author_id' => $book->author_id,
            'book_id'   => $book->id,
            'rating'    => $this->faker->randomDigit() + 1
        ];
    }
}
