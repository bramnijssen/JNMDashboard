<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;

class WeatherController extends Controller
{
    public function index()
    {
        $response = Http::get('https://weerlive.nl/api/json-data-10min.php', [
            'key' => config('values.weerlive_api_key'),
            'locatie' => 'Maasbree',
        ])->json();

        return response()->json($response['liveweer'][0]);
    }
}
