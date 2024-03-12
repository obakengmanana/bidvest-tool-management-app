<?php

namespace Database\Factories;

use App\Models\Tool;
use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

class ToolFactory extends Factory
{
    protected $model = Tool::class;

    public function definition()
    {
        return [
            'name' => $this->faker->word,
            'description' => $this->faker->sentence,
            'category_id' => Category::factory()->create()->id,
        ];
    }
}
