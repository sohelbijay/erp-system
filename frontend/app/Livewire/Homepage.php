<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Http;

class Homepage extends Component
{
    public $welcomeMessage = 'Welcome to ERP System!';
    public $latestUsers = [];
    public $latestInventory = [];

    public function mount()
    {
        // Fetch last 5 users from HR microservice
        $this->latestUsers = []; //Http::get('http://hr-service/api/users/latest')->json() ?? [];

        // Fetch last 5 inventory items
        $this->latestInventory = []; //Http::get('http://inventory-service/api/items/latest')->json() ?? [];
    }

    public function render()
    {
        return view('livewire.homepage');
    }
}
