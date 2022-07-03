<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Article>
 */
class ArticleFactory extends Factory
{
    public function definition()
    {
        $title = fake()->sentence();

        $content = collect($this->faker->paragraphs(rand(5, 15)))
            ->map(function ($item) {
                return "<p>$item</p>";
            })
            ->join('');

        return [
            'title' => $title,
            'slug' => Str::slug($title),
            'summary' => fake()->paragraph,
            'content' => $content,
            'user_id' => 1,
            'category_id' => rand(1, 10)
        ];
    }
}
