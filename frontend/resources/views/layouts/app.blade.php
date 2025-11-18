<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ERP System - @yield('title', 'Home')</title>

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Google Font (optional) -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">

    @livewireStyles
    <style>
        body {
            font-family: 'Inter', sans-serif;
        }
    </style>
</head>
<body class="bg-gray-50 text-gray-900 flex flex-col min-h-screen">

    <!-- 🌐 Header -->
    <header class="bg-gradient-to-r from-blue-700 to-blue-500 text-white shadow-lg sticky top-0 z-50">
        <div class="container mx-auto flex justify-between items-center py-4 px-6">
            <!-- Logo -->
            <a href="/" class="text-2xl font-bold tracking-wide hover:opacity-90 transition">
                <span class="text-white">ERP</span><span class="text-yellow-300">System</span>
            </a>

            <!-- Navigation -->
            <nav>
                <ul class="flex items-center space-x-6 text-sm md:text-base">
                    <li><a href="/" class="hover:text-yellow-300 transition">Home</a></li>
                    <li><a href="{{ route('about') }}" class="hover:text-yellow-300 transition">About</a></li>
                    <li><a href="{{ route('contact') }}" class="hover:text-yellow-300 transition">Contact</a></li>

                    @guest
                        <li>
                            <a href="{{ route('login') }}" class="bg-white text-blue-700 font-semibold px-4 py-2 rounded-lg shadow hover:bg-gray-100 transition">
                                Login
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('register') }}" class="border border-white px-4 py-2 rounded-lg hover:bg-white hover:text-blue-700 transition">
                                Register
                            </a>
                        </li>
                    @else
                        <li><a href="/dashboard" class="hover:text-yellow-300 transition">Dashboard</a></li>
                        <li><a href="/profile" class="hover:text-yellow-300 transition">Profile</a></li>
                        <li>
                            <form method="POST" action="" class="inline">
                                @csrf
                                <button type="submit" class="hover:text-red-300 transition">Logout</button>
                            </form>
                        </li>
                    @endguest
                </ul>
            </nav>
        </div>
    </header>

    <!-- 🧭 Hero Section -->
    <section class="bg-gradient-to-r from-blue-600 to-blue-500 text-white py-20 shadow-inner">
        <div class="container mx-auto text-center px-6">
            <h2 class="text-4xl md:text-5xl font-extrabold mb-4 drop-shadow-lg">Welcome to ERP System</h2>
            <p class="text-lg md:text-xl mb-8 text-blue-100 max-w-2xl mx-auto">
                Manage your business efficiently — HR, Inventory, Accounts, and more — in one powerful platform.
            </p>
            <a href="{{ route('register') }}"
               class="bg-white text-blue-700 font-semibold px-6 py-3 rounded-lg shadow-lg hover:scale-105 hover:bg-gray-100 transition transform">
                Get Started →
            </a>
        </div>
    </section>

    <!-- 📦 Main Content -->
    <main class="flex-1 container mx-auto p-8">
        @yield('content')
    </main>

    <!-- 🦶 Footer -->
    <footer class="bg-gray-900 text-gray-300 text-center py-6 mt-auto">
        <p>&copy; {{ date('Y') }} <span class="font-semibold text-white">ERP System</span> — All rights reserved.</p>
        <p class="text-sm text-gray-400 mt-1">Designed with ❤️ using Laravel & Livewire</p>
    </footer>

    @livewireScripts
</body>
</html>
