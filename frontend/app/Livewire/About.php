<?php

namespace App\Livewire;

use Livewire\Component;

class About extends Component
{
    public function render()
    {
        return view('livewire.about')
            ->extends('layouts.app')
            ->section('content')
            ->with(['title' => 'About Us']);
    }
}
