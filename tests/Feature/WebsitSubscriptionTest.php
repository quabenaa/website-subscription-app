<?php

namespace Tests\Feature;

use App\Models\User;
use App\Models\Website;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class WebsitSubscriptionTest extends TestCase
{
    use RefreshDatabase;

    public function testsUserCanSubscribeToAWebsite()
    {
        $website = Website::factory()->create();
        $user = User::factory()->create();
        $payload = [
            'user_id' => $user->id,
            'website_id' => $website->id
        ];

        $this->json('POST', '/api/websites/subscriptions', $payload)
            ->assertStatus(200)
            ->assertJson([
                'message' => 'User has successfully subscribe to '.$website->name,
                'payload' =>
                [
                    'user_id' => $user->id,
                    'website_id' => $website->id
                ]
            ]);
    }
}
