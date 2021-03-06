<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;
use Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    public function configure()
    {
        return $this->afterCreating(function (Product $article) {
            $article->addMediaFromUrl(
                'https://cdn.pixabay.com/photo/2012/04/02/15/18/stegosaurus-24752_960_720.png'
            )
                ->toMediaCollection('thumbnail');
        });
    }

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $name = fake()->regexify('[A-Za-z0-9]{13}');

        return [
            'name' => $name,
            'slug' => Str::slug($name),
            'description' => '',
            'price' => rand(1, 5000),
            'category_id' => rand(1, 10),
            'published_at' => rand(0, 1) === 1 ? now() : null,
            'expires_at' => rand(0, 1) === 1 ? now()->addDays(rand(1, 30)) : null
        ];
    }
}
