<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Listing>
 */
class ListingFactory extends Factory {
    /**
    * Summary of definition
    * @return array{company: string, description: string, email: string, location: string, tags: string, title: string, website: string}
    */
    public function definition(): array {
        return [
            "title" => $this->faker->sentence(),
            "tags" => "#".$this->faker->jobTitle,
            'company' => $this->faker->name(),
            'location' => $this->faker->city,
            'email' => $this->faker->safeEmail,
            'website' => $this->faker->url,
            'description' => $this->faker->sentence(),
        ];
    }
}
