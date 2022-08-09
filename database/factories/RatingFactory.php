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
        return [
            'author_id' => Author::all()->random()->id,
            'book_id'   => Book::all()->random()->id,
            'rating'    => $this->faker->randomDigit() + 1
        ];
    }
}
