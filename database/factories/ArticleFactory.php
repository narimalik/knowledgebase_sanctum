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
    public function definition(): array
    {
        return [
           "article_title"=>fake()->title,
           "article_sub_title"=>fake()->paragraph(1),
           "detail"=> fake()->paragraph(3),
           "added_by"=>1,
           "updated_by"=>1,
        ];
    }
}
