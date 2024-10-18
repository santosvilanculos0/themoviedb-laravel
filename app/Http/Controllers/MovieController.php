<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\View\View;
use Illuminate\Http\Request;

class MovieController extends Controller
{
    public function show(string $id): View
    {

        $apiUrl = "https://api.themoviedb.org/3/movie/" . $id . "?language=pt&api_key=" . config('services.tmdb.key');


        $client = new Client([
            'accept' => 'application/json',
            'Authorization' => "Bearer " . config('services.tmdb.read_key')
        ]);


        try {
            // Make a GET request to the OpenWeather API
            $response = $client->get($apiUrl);

            // Get the response body as an array
            $data = json_decode($response->getBody(), true);

            return view('movies.show', ['data' => $data]);

        } catch (\Exception $e) {
            return view('error', ['error' => $e->getMessage()]);
        }
    }
}
