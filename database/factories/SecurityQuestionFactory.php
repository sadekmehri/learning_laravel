<?php

namespace Database\Factories;

use App\Models\SecurityQuestion;
use Illuminate\Database\Eloquent\Factories\Factory;

class SecurityQuestionFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = SecurityQuestion::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nom_question' => $this->faker->sentence($nbWords = 5, $variableNbWords = true)
        ];
    }
}
