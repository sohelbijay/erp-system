<?php
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomepageController;

use App\Livewire\Auth\Login;
use App\Livewire\Auth\Register;
use App\Livewire\Contact;
use App\Livewire\About;

use App\Livewire\Dashboard;

Route::get('/', [HomepageController::class, 'index']);

Route::get('/register', Register::class)->name('register');
Route::get('/contact', Contact::class)->name('contact');
Route::get('/about', About::class)->name('about');

Route::post('/logout', [Login::class, 'logout'])->name('logout');


Route::middleware(['web'])->group(function () {
    Route::get('/login', Login::class)->name('login');
    Route::middleware(['auth.check'])->group(function () {
        Route::get('/dashboard', Dashboard::class)->name('dashboard');
    });
});



