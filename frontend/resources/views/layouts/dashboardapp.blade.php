<!DOCTYPE html>
<html lang="en" x-data="{ sidebarOpen: true, userMenu: false }">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Dashboard') — ERP System</title>

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">

    <!-- Alpine.js -->
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>

    @livewireStyles

<style>
    body { font-family: "Inter", sans-serif; }

    .sidebar-collapsed { width: 70px !important; }
    .sidebar-expanded { width: 240px !important; }
    .sidebar-transition { transition: width 0.25s ease; }

    /* Hover expand */
    aside.sidebar-collapsed:hover {
        width: 240px !important;
    }
</style>
</head>

<body class="bg-gray-100 min-h-screen flex flex-col">

@php
    $user = session('user', ['name' => 'User', 'email' => 'user@example.com']);
@endphp

<div class="flex min-h-screen">

    <!-- ============= SIDEBAR ============= -->
    <aside :class="sidebarOpen ? 'sidebar-expanded' : 'sidebar-collapsed'"
           class="sidebar-transition fixed md:relative z-30 inset-y-0 left-0 bg-white shadow-xl border-r border-gray-200 flex flex-col">

        <!-- Logo -->
        <div class="h-16 flex items-center justify-center border-b border-gray-200">
            <span class="font-bold text-xl text-blue-700" x-show="sidebarOpen">
                <a href="/dashboard" class="">
                    MICRO ERP
                </a>
            </span>

            <svg x-show="!sidebarOpen" class="w-8 h-8 text-blue-700" fill="none" stroke="currentColor"
                 stroke-width="2" viewBox="0 0 24 24">
                 <path stroke-linecap="round" stroke-linejoin="round" d="M3 7h18M3 12h18M3 17h18"/>
            </svg>
        </div>

        <!-- Menu -->
        <nav class="flex-1 p-3 space-y-1">

            <!-- Dashboard -->
            <a href="/dashboard"
               class="flex items-center gap-3 py-2 px-3 rounded-md
                      hover:bg-blue-50 transition
                      {{ request()->is('dashboard') ? 'bg-blue-100 font-semibold' : '' }}">
                <svg class="w-6 h-6 text-blue-700" fill="none" stroke="currentColor" stroke-width="2"
                     viewBox="0 0 24 24">
                     <path stroke-linecap="round" stroke-linejoin="round"
                           d="M3 12l2-2m0 0l7-7 7 7m-9 2v7a1 1 0 001 1h4a1 1 0 001-1v-7"/>
                </svg>
                <span x-show="sidebarOpen">Dashboard</span>
            </a>

            <!-- HR -->
            <a href="/hr"
               class="flex items-center gap-3 py-2 px-3 rounded-md
                      hover:bg-blue-50 transition
                      {{ request()->is('hr*') ? 'bg-blue-100 font-semibold' : '' }}">
                <svg class="w-6 h-6 text-blue-700" fill="none" stroke="currentColor" stroke-width="2"
                     viewBox="0 0 24 24">
                     <path stroke-linecap="round" stroke-linejoin="round"
                           d="M17 20h5v-2a4 4 0 00-5-4m-6 6h6m-6 0v-2a4 4 0 015-4m-5 6H3m0 0v-2a4 4 0 015-4"/>
                </svg>
                <span x-show="sidebarOpen">HR Module</span>
            </a>

            <!-- Inventory -->
            <a href="/inventory"
               class="flex items-center gap-3 py-2 px-3 rounded-md
                      hover:bg-blue-50 transition
                      {{ request()->is('inventory*') ? 'bg-blue-100 font-semibold' : '' }}">
                <svg class="w-6 h-6 text-blue-700" fill="none" stroke="currentColor" stroke-width="2"
                     viewBox="0 0 24 24">
                     <path stroke-linecap="round" stroke-linejoin="round"
                           d="M20 13V7a2 2 0 00-2-2h-3l-2-2H7L5 5H3a2 2 0 00-2 2v6"/>
                </svg>
                <span x-show="sidebarOpen">Inventory</span>
            </a>

            <!-- Accounts -->
            <a href="/accounts"
               class="flex items-center gap-3 py-2 px-3 rounded-md
                      hover:bg-blue-50 transition
                      {{ request()->is('accounts*') ? 'bg-blue-100 font-semibold' : '' }}">
                <svg class="w-6 h-6 text-blue-700" fill="none" stroke="currentColor" stroke-width="2"
                     viewBox="0 0 24 24">
                     <path stroke-linecap="round" stroke-linejoin="round"
                           d="M12 8c-1.657 0-3 1.343-3 3v1h6v-1c0-1.657-1.343-3-3-3z"/>
                     <path stroke-linecap="round" stroke-linejoin="round"
                           d="M6 20h12v-2a4 4 0 00-4-4H10a4 4 0 00-4 4v2z"/>
                </svg>
                <span x-show="sidebarOpen">Accounts</span>
            </a>
        </nav>
    </aside>

    <!-- ============= MAIN CONTENT AREA ============= -->
    <div class="flex-1 flex flex-col">

        <!-- Top Header -->
        <header class="bg-gradient-to-r from-blue-700 to-blue-500 text-white shadow-lg sticky top-0 z-40">
            <div class="flex justify-between items-center px-6 h-16">

                <!-- Desktop Sidebar Toggle -->
                <button @click="sidebarOpen = !sidebarOpen"
                        class="hidden md:flex items-center justify-center w-10 h-10 bg-white/10 hover:bg-white/20 rounded-lg transition">
                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" stroke-width="2"
                         viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round"
                              d="M4 6h16M4 12h16M4 18h16"/>
                    </svg>
                </button>

                <!-- Page Title -->
                
                <!-- Top Module Links -->
                <nav class="hidden md:flex space-x-6 font-semibold text-white">
                    <a href="/dashboard" class="{{ request()->is('dashboard') ? 'text-yellow-300' : 'hover:text-yellow-300' }}">Dashboard</a>
                    <a href="/hr" class="{{ request()->is('hr*') ? 'text-yellow-300' : 'hover:text-yellow-300' }}">HR</a>
                    <a href="/inventory" class="{{ request()->is('inventory*') ? 'text-yellow-300' : 'hover:text-yellow-300' }}">Inventory</a>
                    <a href="/accounts" class="{{ request()->is('accounts*') ? 'text-yellow-300' : 'hover:text-yellow-300' }}">Accounts</a>
                </nav>

                <!-- User Menu -->
                <div class="relative" @click.away="userMenu = false">
                    <button @click="userMenu = !userMenu"
                            class="flex items-center gap-2 bg-white text-blue-700 font-semibold px-4 py-2 rounded-md shadow">
                        <span>{{ $user['name'] }}</span>
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2"
                             viewBox="0 0 24 24">
                             <path stroke-linecap="round" stroke-linejoin="round"
                                   d="M19 9l-7 7-7-7"/>
                        </svg>
                    </button>

                    <!-- Dropdown -->
                    <div x-show="userMenu" x-transition
                         class="absolute right-0 mt-2 w-52 bg-white shadow-lg rounded border">
                        <div class="p-3 border-b text-gray-700">
                            <p class="font-semibold">{{ $user['name'] }}</p>
                            <p class="text-sm text-gray-500">{{ $user['email'] }}</p>
                        </div>

                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit"
                                    class="w-full text-left px-4 py-2 text-red-600 hover:bg-red-100 transition">
                                Logout
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </header>

        <!-- Content -->
        <main class="p-6">
            @yield('content')
        </main>

        <!-- Footer -->
        <footer class="bg-gradient-to-r from-blue-700 to-blue-500 text-white shadow-lg text-center py-4">
            <p>&copy; {{ date('Y') }} MICRO ERP — All rights reserved.</p>
        </footer>
    </div>
</div>

@livewireScripts
</body>
</html>
