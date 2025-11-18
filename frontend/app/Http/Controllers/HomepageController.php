<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomepageController extends Controller
{
    public function index()
    {
        // Blade page will include Livewire component
        return view('home');
    }
}
