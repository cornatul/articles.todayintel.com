<?php

namespace Database\Factories;

use App\Models\User;
use Cornatul\Articles\Models\Article;
use Illuminate\Database\Eloquent\Factories\Factory;

class ArticlesFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Article::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->name,
            'content' => $this->faker->text,
        ];
    }
}
