<?php

namespace Database\Factories;

use App\Models\Contact;
use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Factory as FakerFactory;


class ContactFactory extends Factory
{
    protected $faker;

    public function __construct(...$args)
    {
        parent::__construct(...$args);
        $this->faker = FakerFactory::create('ja_JP');
    }

    public function definition()
    {
        return [
            'first_name' => $this->faker->firstName,
            'last_name' => $this->faker->lastName,
            'email' => $this->faker->safeEmail,
            'gender' => $this->faker->randomElement([1,2,3]),
            'tel' => $this->faker->phoneNumber,
            'address' => $this->faker->address,
            'building' => $this->faker->optional()->secondaryAddress,
            'category_id' => $this->faker->numberBetween(1,5),
            'detail' => $this->faker->realText(100),
        ];
    }
}
