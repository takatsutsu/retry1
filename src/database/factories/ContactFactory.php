<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Contact;

class ContactFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            //
            'first_name' => $this->faker->lastName(),
            'last_name' => $this->faker->firstName(),
            'gender' => $this->faker->randomElement(['1', '2', '3']),
            'email' => $this->faker->safeEmail(),
            'address' => $this->faker->address(),
            'category_id' =>  $this->faker->randomElement(['1', '2', '3', '4', '5' ]),
            'detail' =>  $this->faker->realText(20)

        ];
    }
}
