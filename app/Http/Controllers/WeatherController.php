<?php

namespace App\Http\Controllers;

use App\Http\Requests\SendEmailWeatherRequest;
use App\Mail\WeatherInfo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Mail;

class WeatherController extends Controller
{
    public function show()
    {
        return view('weather');
    }
    public function result(SendEmailWeatherRequest $request)
    {
        $res = Http::withHeaders([
                'X-Yandex-API-Key' => env('YANDEX_WEATHER_KEY')]
        )->get(env('YANDEX_WEATHER_URL')."?".
            http_build_query([
                'lat' => env('YANDEX_WEATHER_LAT'),
                'lon' => env('YANDEX_WEATHER_LON'),
                'lang' => 'ru_RU'
            ]));

        Mail::to($request->email)->send(new WeatherInfo($request->name, $res->json()));
        Mail::to('razumkov@e1.ru')->send(new WeatherInfo($request->name, $res->json()));

        return view('weather_result', [
            'weather' => $res->json()
        ]);
    }
}
