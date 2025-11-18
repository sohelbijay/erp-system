<?php

namespace App\Livewire\Auth;

use Livewire\Component;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;
use App\Helpers\LoggerHelper;

class Login extends Component
{
    public $email = '';
    public $password = '';
    public $errorMessage = '';
    public $loggedIn = false;

    public function login()
    {
        $this->errorMessage = null;

        try {
            // Call Gateway Login API
            $response = Http::post(env('GATEWAY_URL') . '/api/login', [
                'email' => $this->email,
                'password' => $this->password,
            ]);

            if (!$response->successful()) {
                $this->errorMessage = $response->json()['message'] ?? 'Invalid credentials';
                return;
            }

            $data = $response->json();

            // Save session WITHOUT $request
            session()->put('user', $data['user']);
            session()->put('token', $data['token']);

            // Log login info
            LoggerHelper::write('LOGIN_SUCCESS', [
                'email'   => $this->email,
                'user_id' => $data['user']['id'] ?? null,
                'user_name' => $data['user']['name'] ?? null,
            ]);

            // Mark logged-in state
            $this->loggedIn = true;

            return redirect()->to('/dashboard');

        } catch (\Exception $e) {

            LoggerHelper::write('LOGIN_ERROR', [
                'email' => $this->email,
                'error' => $e->getMessage(),
            ]);

            $this->errorMessage = "Something went wrong: " . $e->getMessage();
        }
    }

    public function logout()
    {
        $user = session('user', ['id' => null, 'email' => null]);

        // Write logout log
        LoggerHelper::write('LOGOUT', [
            'email'   => $user['email'] ?? null,
            'user_id' => $user['id'] ?? null,
        ]);

        session()->forget(['user', 'token']);
        session()->invalidate();
        session()->regenerateToken();

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
