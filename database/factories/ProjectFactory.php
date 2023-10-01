<?php

namespace Database\Factories;
use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;


class ProjectFactory extends Factory
{
   
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
