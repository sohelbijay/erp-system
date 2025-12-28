<?php
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomepageController;

use App\Livewire\Auth\Login;
use App\Livewire\Auth\Register;
use App\Livewire\Contact;
use App\Livewire\About;

use App\Livewire\Dashboard;

use App\Http\Controllers\ModuleController;



Route::get('/', [HomepageController::class, 'index']);

Route::get('/register', Register::class)->name('register');
Route::get('/contact', Contact::class)->name('contact');
Route::get('/about', About::class)->name('about');

Route::post('/logout', [Login::class, 'logout'])->name('logout');


Route::get('/modules', [ModuleController::class, 'index'])->name('modules.index');
Route::get('/modules/create', [ModuleController::class, 'create'])->name('modules.create');
Route::post('/modules/store', [ModuleController::class, 'store'])->name('modules.store');
Route::get('/modules/edit/{id}', [ModuleController::class, 'edit'])->name('modules.edit');
Route::post('/modules/update/{id}', [ModuleController::class, 'update'])->name('modules.update');
Route::delete('/modules/delete/{id}', [ModuleController::class, 'destroy'])->name('modules.delete');


Route::middleware(['web'])->group(function () {
    Route::get('/login', Login::class)->name('login');
    Route::middleware(['auth.check'])->group(function () {
        Route::get('/dashboard', Dashboard::class)->name('dashboard');
    });
});



