<?php

namespace App\Livewire;

use Livewire\Component;

class Contact extends Component
{
    public $name = '';
    public $email = '';
    public $subject = '';
    public $message = '';
    public $successMessage = '';
    public $errorMessage = '';

    public function submit()
    {
        // Simple validation
        if (!$this->name || !$this->email || !$this->subject || !$this->message) {
            $this->errorMessage = 'All fields are required.';
            $this->successMessage = '';
            return;
        }

        if (!filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
            $this->errorMessage = 'Please enter a valid email.';
            $this->successMessage = '';
            return;
        }

        // ✅ Mock submission (no DB or real email)
        $this->successMessage = 'Thank you, ' . $this->name . '! Your message has been sent successfully.';
        $this->errorMessage = '';

        // Clear form
        $this->name = '';
        $this->email = '';
        $this->subject = '';
        $this->message = '';
    }

    public function render()
    {
        return view('livewire.contact')
            ->extends('layouts.app')
            ->section('content')
            ->with(['title' => 'Contact']);
    }
}
