<?php

namespace App\Http\Controllers;

use App\Http\Requests\SendEmailWeatherRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class WeatherController extends Controller
{
    public function show()
    {
        $res = Http::withHeaders([
            'X-Yandex-API-Key' => env('YANDEX_WEATHER_KEY')]
        )->get(env('YANDEX_WEATHER_URL')."?".http_build_query([
                'lat' => env('YANDEX_WEATHER_LAT'),
                'lon' => env('YANDEX_WEATHER_LON'),
                'lang' => 'ru_RU'
            ]));
        dd($res);
        return view('weather');
    }
    public function result(SendEmailWeatherRequest $request)
    {
        return view('weather_result');
    }
}
