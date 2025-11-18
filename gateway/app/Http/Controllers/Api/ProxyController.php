<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ProxyController extends Controller
{
    public function register(Request $request)
    {
        $authServiceUrl = env('AUTH_SERVICE_URL') . '/api/register';

        $response = Http::post($authServiceUrl, $request->all());

        return response()->json($response->json(), $response->status());
    }


    public function login(Request $request)
    {

        $authServiceUrl = env('AUTH_SERVICE_URL') . '/api/login';

        $response = Http::post($authServiceUrl, $request->all());

        return response()->json($response->json(), $response->status());
    }
}
