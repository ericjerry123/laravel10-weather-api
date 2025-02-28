<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class WeatherController extends Controller
{
    const API_URL = 'http://api.openweathermap.org/data/2.5/weather';

    private string $API_KEY;

    public function __construct()
    {
        $this->API_KEY = config('services.openweather.api_key');
    }

    public function getWeather(Request $request)
    {
        $city = $request->query('city');

        $response = Http::get(self::API_URL, [
            'q' => $city,
            'appid' => $this->API_KEY,
            'units' => 'metric',
        ]);

        if ($response->status() === 404) {
            return response()->json([
                'error' => '找不到城市',
            ], 404);
        }

        $weatherData = $response->json();

        return response()->json([
            'city' => $request->query('city'),
            'temperature' => $weatherData['main']['temp'],
            'description' => $weatherData['weather'][0]['description'],
        ]);
    }
}
