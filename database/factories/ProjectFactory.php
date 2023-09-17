<?php

namespace Database\Factories;
use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Project>
 */
class ProjectFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $category  = Category::all()->random();
        return [
            'title' => $this->faker->sentence(2),
            'description' => $this->faker->text(),
            'image' => $this->faker->text(),
            'url' => $this->faker->text(),
            'category_id' => $category->id,
        ];
    }
}
