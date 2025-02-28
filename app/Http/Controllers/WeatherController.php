<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WeatherController extends Controller
{
    public function getWeather(Request $request)
    {
        return response()->json([
            'city' => $request->query('city'),
            'temperature' => 25, // 假資料
            'description' => 'Sunny', // 假資料
        ]);
    }
}
