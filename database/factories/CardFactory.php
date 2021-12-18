<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Helper\Helper;

class CardFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()    
    {
        $number = $this->faker->randomNumber(8, true) . $this->faker->randomNumber(8, true);
        $cvv = $this->faker->randomNumber(3, true);

        return [
            'number' => Helper::set_number_format($number),
            'cvv' => $cvv,
            'type' => Helper::check_card_type($number[0]),
            'owner' => $this->faker->name,
            'expiration_date' => $this->faker->dateTimeBetween('+1 week', '+3 years'),
            'is_valid' => Helper::is_valid(str_replace(' ', '', $number))
        ];
    }
}
