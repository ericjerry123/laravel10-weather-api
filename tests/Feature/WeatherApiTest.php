<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class WeatherApiTest extends TestCase
{

    /** @test */
    public function test_get_weather_data_for_valid_city(): void
    {
        $response = $this->getJson('/api/weather?city=Taipei');

        $response->assertStatus(200)
            ->assertJsonStructure([
                'city',
                'temperature',
                'description',
            ]);
    }
}
