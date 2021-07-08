<?php

namespace Database\Factories;

use App\Models\Book;
use Illuminate\Database\Eloquent\Factories\Factory;

class BookFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Book::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'code'          =>  $this->faker->unique()->randomNumber(6, true),
            'title'         =>  $this->faker->sentence(3),
            'editorial'     =>  $this->faker->company(),
            'copies'        =>  $this->faker->randomNumber(2),
            'description'   =>  $this->faker->text()
        ];
    }
}

