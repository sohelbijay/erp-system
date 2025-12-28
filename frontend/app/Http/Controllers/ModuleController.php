<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ModuleController extends Controller
{
    private $base;

    public function __construct()
    {
        $this->base = env('GATEWAY_URL') . '/api/auth-modules';
    }

    public function index()
    {
        $response = Http::get($this->base);

        $modules = $response->successful() ? $response->json()['modules'] : [];

        return view('modules.index', compact('modules'));
    }

    public function create()
    {
        return view('modules.create');
    }

    public function store(Request $request)
    {
        $request->validate(['name' => 'required']);

        $payload = [
            'name' => $request->name,
            'description' => $request->description,
        ];

        $response = Http::post($this->base, $payload);

        if ($response->successful()) {
            return redirect()->route('modules.index')->with('success', 'Module created!');
        }

        return back()->with('error', 'API Error: ' . $response->body());
    }

    public function edit($id)
    {
        $response = Http::get("$this->base/$id");

        if (!$response->successful()) {
            return redirect()->route('modules.index')->with('error', 'Module not found');
        }

        $module = $response->json()['module'];

        return view('modules.edit', compact('module'));
    }

    public function update(Request $request, $id)
    {
        $request->validate(['name' => 'required']);

        $payload = [
            'name' => $request->name,
            'description' => $request->description,
        ];

        $response = Http::put("$this->base/$id", $payload);

        if ($response->successful()) {
            return redirect()->route('modules.index')->with('success', 'Module updated!');
        }

        return back()->with('error', 'API Error: ' . $response->body());
    }

    public function destroy($id)
    {
        $response = Http::delete("$this->base/$id");

        if ($response->successful()) {
            return redirect()->route('modules.index')->with('success', 'Module deleted');
        }

        return redirect()->route('modules.index')->with('error', 'Delete failed');
    }
}
