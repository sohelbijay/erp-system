<?php

namespace App\Livewire\Auth;

use Livewire\Component;
use Illuminate\Support\Facades\Http;

class Register extends Component
{
    public $name = '';
    public $email = '';
    public $password = '';
    public $confirmPassword = '';
    public $errorMessage = '';
    public $successMessage = '';
    public $registered = false;

    public function register()
    {
        
        // Simple validation
        if ($this->password !== $this->confirmPassword) {
            $this->errorMessage = 'Passwords do not match.';
            $this->successMessage = '';
            return;
        }

        if (empty($this->name) || empty($this->email) || empty($this->password)) {
            $this->errorMessage = 'All fields are required.';
            $this->successMessage = '';
            return;
        }

        $response = Http::post(env('GATEWAY_URL') . '/api/register', [
            'name'     => $this->name,
            'email'    => $this->email,
            'password' => $this->password,
        ]);

        if ($response->successful()) {
            $this->successMessage = "✅ Registered successfully! You can now login. ";
            $this->reset(['name', 'email', 'password']);
        } else {
            $this->errorMessage = "❌ " . ($response->json()['message'] ?? 'Registration failed.');
        }
        
        // Clear form
        $this->name = '';
        $this->email = '';
        $this->password = '';
        $this->confirmPassword = '';
    }


    public function render()
    {
        return view('livewire.auth.register')
            ->extends('layouts.app')
            ->section('content')
            ->with(['title' => 'Register']);
    }
}
