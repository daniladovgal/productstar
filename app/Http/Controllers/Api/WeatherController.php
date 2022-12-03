<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;

class WeatherController extends Controller
{
    public function __invoke() {

        $opts = array(
            'http'=>array(
            'method'=>"GET",
            'header'=>"X-Yandex-API-Key:ce0f6f48-6f27-436f-9f7d-0f72b7137b4f"."\r\n"
            )
        );
        $context = stream_context_create($opts);
        $response=file_get_contents("https://api.weather.yandex.ru/v2/forecast/?lat=68.959609&lon=33.084048&lang=ru_RU",false,$context);

        $response = json_decode($response);

        $temp = $response->fact->temp;

        return ['temperature' => $temp];
    }
}
