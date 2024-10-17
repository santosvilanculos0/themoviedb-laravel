<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\View\View;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __invoke(Request $request): View
    {

        if ($request->filled('query')) {
            $query = $request->get('query');
            $apiUrl = "https://api.themoviedb.org/3/search/movie?query={$query}&include_adult=false&include_video=false&language=pt&api_key=" . config('services.tmdb.key');
        } else {
            $apiUrl = "https://api.themoviedb.org/3/discover/movie?include_adult=false&include_video=false&language=pt&page=1&sort_by=popularity.desc&api_key=" . config('services.tmdb.key');
        }

        if ($request->has('page')) {
            $apiUrl = $apiUrl . "&page=" . $request->get('page', 1);
        }

        $client = new Client([
            'accept' => 'application/json',
            'Authorization' => "Bearer " . config('services.tmdb.read_key')
        ]);


        try {
            // Make a GET request to the OpenWeather API
            $response = $client->get($apiUrl);

            // Get the response body as an array
            $data = json_decode($response->getBody(), true);

            // Handle the retrieved weather data as needed (e.g., pass it to a view)
            return view('home', ['data' => $data]);
        } catch (\Exception $e) {
            return view('error', ['error' => $e->getMessage()]);
        }

    }
}
