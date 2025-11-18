<!DOCTYPE html>
<html lang="en" x-data="{ sidebarOpen: false }">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ERP System - @yield('title', 'Dashboard')</title>

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>

    @livewireStyles
    <style>
        body { font-family: 'Inter', sans-serif; }
    </style>
</head>
<body class="bg-gray-100 min-h-screen flex flex-col">

@php
    $user = session('user', ['name' => 'Guest', 'email' => 'guest@example.com']);
@endphp

<div class="flex flex-1 min-h-screen">

    <!-- Sidebar -->
    <aside :class="sidebarOpen ? 'translate-x-0' : '-translate-x-full'" 
           class="fixed z-30 inset-y-0 left-0 w-64 bg-white shadow-lg transform md:translate-x-0 transition-transform duration-300 ease-in-out flex flex-col">
        <div class="p-6 text-center font-bold text-2xl border-b border-gray-200 text-blue-700">
            ERP System
        </div>

        <nav class="flex-1 p-4 space-y-2">
            <a href="/dashboard" class="block py-2 px-4 rounded hover:bg-blue-50 transition {{ request()->is('dashboard') ? 'bg-blue-100 font-semibold' : '' }}">
                Dashboard
            </a>
            <a href="/hr" class="block py-2 px-4 rounded hover:bg-blue-50 transition {{ request()->is('hr*') ? 'bg-blue-100 font-semibold' : '' }}">
                HR Module
            </a>
            <a href="/inventory" class="block py-2 px-4 rounded hover:bg-blue-50 transition {{ request()->is('inventory*') ? 'bg-blue-100 font-semibold' : '' }}">
                Inventory
            </a>
            <a href="/accounts" class="block py-2 px-4 rounded hover:bg-blue-50 transition {{ request()->is('accounts*') ? 'bg-blue-100 font-semibold' : '' }}">
                Accounts
            </a>
        </nav>
    </aside>

    <!-- Overlay for mobile -->
    <div x-show="sidebarOpen" @click="sidebarOpen = false" class="fixed inset-0 bg-black bg-opacity-50 z-20 md:hidden"></div>

    <!-- Main Content -->
    <div class="flex-1 flex flex-col md:ml-64">

        <!-- Top Header -->
        <header class="bg-gradient-to-r from-blue-700 to-blue-500 text-white shadow-lg sticky top-0 z-50">
            <div class="container mx-auto flex justify-between items-center py-4 px-6">
                <div class="flex items-center space-x-4">
                    <!-- Mobile Hamburger -->
                    <button @click="sidebarOpen = !sidebarOpen" class="md:hidden p-2 rounded bg-blue-600 hover:bg-blue-700 transition">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M4 6h16M4 12h16M4 18h16"/>
                        </svg>
                    </button>

                    <!-- Top Module Links -->
                    <nav class="hidden md:flex space-x-6 font-semibold text-white">
                        <a href="/dashboard" class="{{ request()->is('dashboard') ? 'text-yellow-300' : 'hover:text-yellow-300' }}">Dashboard</a>
                        <a href="/hr" class="{{ request()->is('hr*') ? 'text-yellow-300' : 'hover:text-yellow-300' }}">HR</a>
                        <a href="/inventory" class="{{ request()->is('inventory*') ? 'text-yellow-300' : 'hover:text-yellow-300' }}">Inventory</a>
                        <a href="/accounts" class="{{ request()->is('accounts*') ? 'text-yellow-300' : 'hover:text-yellow-300' }}">Accounts</a>
                    </nav>
                </div>

                <!-- User Dropdown -->
                <div class="relative" x-data="{ open: false }">
                    <button @click="open = !open" class="flex items-center space-x-2 bg-white text-blue-700 font-semibold px-4 py-2 rounded shadow hover:bg-gray-100 transition">
                        <span>{{ $user['name'] }}</span>
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M19 9l-7 7-7-7"/>
                        </svg>
                    </button>

                    <div x-show="open" @click.away="open = false" x-transition
                         class="absolute right-0 mt-2 w-52 bg-white shadow-lg rounded border border-gray-200 z-50">
                        <div class="px-4 py-2 border-b text-gray-700">
                            <p class="font-semibold">{{ $user['name'] }}</p>
                            <p class="text-sm text-gray-500">{{ $user['email'] }}</p>
                        </div>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="w-full text-left px-4 py-2 border-b text-gray-700 hover:bg-red-500 hover:text-white transition">
                                Logout
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </header>

        <!-- Page Header -->
        <div class="bg-gray-50 p-6 border-b border-gray-200">
            <h1 class="text-2xl font-bold text-gray-800">@yield('header', 'Dashboard')</h1>
            <p class="text-gray-500">@yield('subheader')</p>
        </div>

        <!-- Main Dashboard Content -->
        <main class="flex-1 p-8 bg-gray-50">
            @yield('content')
        </main>

        <!-- Footer -->
        <footer class="bg-gray-900 text-gray-300 text-center py-6 mt-auto">
            <p>&copy; {{ date('Y') }} <span class="font-semibold text-white">ERP System</span> — All rights reserved.</p>
            <p class="text-sm text-gray-400 mt-1">Designed with ❤️ using Laravel & Livewire</p>
        </footer>
    </div>
</div>

@livewireScripts
</body>
</html>
