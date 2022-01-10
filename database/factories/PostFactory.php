<?php

namespace Database\Factories;

use App\Models\Website;
use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $websiteIds = Website::pluck('id')->toArray();
        return [
            'title'=>$this->faker->sentence(4),
            'description'=> $this->faker->paragraph(),
            'body' => $this->faker->text(),
            'website_id' => $this->faker->randomElement($websiteIds),
        ];
    }
}
