<?php

namespace Tests\Unit;

use App\Models\Sms;
use App\Models\User;
use Faker\Factory;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Support\Facades\App;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;

class SmsTest extends TestCase
{

    /**
     * A basic unit test example.
     */
    public function test_add_sms()
    {

        $user = User::factory()->create();

        $data = [
            'message' => fake()->text(),
            'number' => fake()->phoneNumber(),
            'user_id' => 1

        ];

        $this->actingAs($user, 'api')->post(route('api.sms.send'), $data)
            ->assertStatus(200);
    }
}
