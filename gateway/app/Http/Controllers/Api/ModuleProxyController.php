<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ModuleProxyController extends Controller
{
    protected $authServiceUrl;

    public function __construct()
    {
        $this->authServiceUrl = env('AUTH_SERVICE_URL', 'http://auth.local');
    }

    public function index()
    {
        $response = Http::get($this->authServiceUrl.'/api/modules');
        return response()->json($response->json(), $response->status());
    }

    public function store(Request $request)
    {
        $response = Http::post($this->authServiceUrl.'/api/modules', $request->only(['name', 'description']));
        return response()->json($response->json(), $response->status());
    }

    public function update(Request $request, $id)
    {
        $response = Http::put($this->authServiceUrl."/api/modules/{$id}", $request->only(['name', 'description']));
        return response()->json($response->json(), $response->status());
    }

    public function destroy($id)
    {
        $response = Http::delete($this->authServiceUrl."/api/modules/{$id}");
        return response()->json($response->json(), $response->status());
    }
}
