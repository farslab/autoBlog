<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence,
            'description' => $this->faker->paragraph,
            'content' => $this->faker->text,
            'tags'=>$this->faker->words(5,true),
            'category'=>$this->faker->randomElement(['Teknoloji','Tarih','Coğrafya','Sağlık','Güncel']),
            'meta_keywords' => $this->faker->words(5, true),
            'slug' => $this->faker->slug,
            'status' => $this->faker->randomElement(['published', 'draft']),
            'is_featured' => $this->faker->numberBetween(0, 1),
            'featured_image' => $this->faker->imageUrl(),
            'author' => $this->faker->name,
        ];
    }
}
