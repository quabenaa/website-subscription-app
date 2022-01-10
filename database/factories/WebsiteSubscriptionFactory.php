<?php

namespace Database\Factories;

use App\Models\Website;
use Illuminate\Database\Eloquent\Factories\Factory;

class WebsiteSubscriptionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $websiteIds = Website::pluck('id')->toArray();
        $userIds = Website::pluck('id')->toArray();
        return [
            'website_id' => $this->faker->randomElement($websiteIds),
            'user_id' => $this->faker->randomElement($userIds),
        ];
    }
}
