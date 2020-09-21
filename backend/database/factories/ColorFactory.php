<?php

namespace Database\Factories;

use App\Models\Color;
use Illuminate\Database\Eloquent\Factories\Factory;

class ColorFactory extends Factory
{
    protected $model = Color::class;

    /**
     * Definition of a Color Model
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'hex' => $this->faker->hexColor
        ];
    }
}
