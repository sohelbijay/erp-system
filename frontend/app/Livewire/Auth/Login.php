<?php

namespace App\Livewire\Auth;

use Livewire\Component;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;

class Login extends Component
{
    public $email = '';
    public $password = '';
    public $errorMessage = '';
    public $loggedIn = false;

    public function login(Request $request)
    {
        $this->errorMessage = null;

        try {
            $response = Http::post(env('GATEWAY_URL') . '/api/login', [
                'email' => $this->email,
                'password' => $this->password,
            ]);

            if ($response->failed()) {
                $this->errorMessage = $response->json()['message'] ?? 'Invalid credentials';
                return;
            }

            $data = $response->json();

            // Save session
            $request->session()->put('user', $data['user']);
            $request->session()->put('token', $data['token']);

            $this->loggedIn = true;

            return redirect()->to('/dashboard');

        } catch (\Exception $e) {
            $this->errorMessage = "Something went wrong: " . $e->getMessage();
        }
    }

    public function logout(Request $request)
    {

        // Clear everything
        $request->session()->forget(['user', 'token']);
        $request->session()->flush();

        // Destroy session completely
        $request->session()->invalidate();
        $request->session()->regenerate();
        $request->session()->regenerateToken();

        return redirect()->route('login');
    }


    public function render()
    {
        return view('livewire.auth.login')
            ->extends('layouts.app')
            ->section('content')
            ->with(['title' => 'Login']);
    }
}
