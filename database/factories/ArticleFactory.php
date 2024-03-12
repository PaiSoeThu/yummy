<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

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
    public function definition(): array
    {
        $title = fake()->sentence();
        $des = fake()->paragraph(20);

        return [
            "title" => $title,
            "slug" => Str::slug($title),
            "description" => $des,
            "excerpt" => Str::words($des,30,'...'),
            // "user_id" => User::all()->random()->id
            // "category_id" => Category::all()->random()->id,
            "category_id" => rand(1,5),
            "user_id" => rand(1,11)
        ];
    }
}
