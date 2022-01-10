<?php

namespace Tests\Feature;

use App\Models\Website;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CreatePostTest extends TestCase
{
    use RefreshDatabase;

    public function testsPostAreCreatedCorrectly()
    {
        $website = Website::factory()->create();
        $payload = [
            'title' => 'Title',
            'description' => 'Description',
            'body'=>'Post Body',
            'website_id' => $website->id
        ];

        $this->json('POST', '/api/posts', $payload)
            ->assertStatus(200)
            ->assertJson(['id' => 1,
                'title' => 'Title',
                'description' => 'Description',
                'body'=>'Post Body',
                'website_id' => $website->id
            ]);
    }
}
