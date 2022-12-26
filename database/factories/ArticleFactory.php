<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Article>
 */
class ArticleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'title' => $this->faker->sentence,
            'body' => $this->faker->paragraph,
            'user_id' => \App\Models\User::factory(),
            'category_id' => \App\Models\Category::factory(),
            'image' => $this->faker->imageUrl(640, 480, 'cats', true),
            'likes' => $this->faker->numberBetween(0, 100),
            'views' => $this->faker->numberBetween(0, 100),


        ];
    }
}
