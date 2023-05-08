<?php

namespace Database\Factories;

use Carbon\Traits\Date;
use Illuminate\Database\Eloquent\Factories\Factory;

class NewsletterFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'grade_ids' => '1,2,3',
            'title' => $this->faker->jobTitle(),
            'body' => $this->faker->realText(),
            'comments' => null
        ];
    }
}
