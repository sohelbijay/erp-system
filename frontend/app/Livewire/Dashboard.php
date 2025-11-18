<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;

class Dashboard extends Component
{
    public $user;

    public function mount()
    {
        $this->user = session('user', ['name' => 'Guest', 'email' => 'guest@example.com']);
    }

    public function render(Request $request)
    {

        //dd($this->user);

        return view('livewire.dashboard')
            ->extends('layouts.dashboardapp')->with(['user' => $this->user])
            ->section('content')
            ->with(['user' => $this->user]); // Pass user to Blade layout
    }
}
