<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;

class WeatherController extends Controller
{
    public function index()
    {
        // 請更換成你的 API 金鑰
        $apiKey = env('API_KEY');
        $baseUrl = env('BASE_URL');
        
        $client = new Client();
        
        try {
            $response = $client->get($baseUrl, [
                'query' => [
                    'Authorization' => $apiKey,
                ],
            ]);
            $data = json_decode($response->getBody(), true);
            // 根據 API 回傳的資料格式進行處理
            return view('weather', ['weatherData' => $data]);
        } catch (\Exception $e) {
            return view('weather', ['error' => $e->getMessage()]);
        }

    }
}


