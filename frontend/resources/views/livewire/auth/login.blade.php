@section('title', 'Login')

<div class="max-w-md mx-auto mt-16 bg-white shadow-lg rounded-xl p-8">

    @if ($loggedIn)
        <h2 class="text-2xl font-bold text-center text-green-600 mb-4">Welcome, Admin!</h2>
        <p class="text-center text-gray-700 mb-6">You are logged in (frontend simulation).</p>

        <button wire:click="logout"
                wire:loading.attr="disabled"
                class="w-full bg-red-600 text-white py-2 rounded-lg hover:bg-red-700 transition">
            Logout
        </button>

        <div wire:loading wire:target="logout" class="text-center mt-2 text-gray-600">
            Logging out, please wait...
        </div>

    @else
        <h2 class="text-3xl font-bold text-center text-blue-700 mb-6">Login</h2>

        @if ($errorMessage)
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
                {{ $errorMessage }}
            </div>
        @endif

        <form wire:submit.prevent="login" class="space-y-5">
            <div>
                <label class="block text-gray-700 font-medium mb-1">Email</label>
                <input type="email" wire:model.defer="email"
                       class="w-full border-gray-300 rounded-lg p-2 focus:ring focus:ring-blue-200 focus:border-blue-400"
                       placeholder="admin@example.com" required>
            </div>

            <div>
                <label class="block text-gray-700 font-medium mb-1">Password</label>
                <input type="password" wire:model.defer="password"
                       class="w-full border-gray-300 rounded-lg p-2 focus:ring focus:ring-blue-200 focus:border-blue-400"
                       placeholder="password" required>
            </div>

            <button type="submit"
                    wire:loading.attr="disabled"
                    wire:target="login"
                    class="w-full bg-blue-600 text-white font-semibold py-2 rounded-lg shadow hover:bg-blue-700 transition">
                Login
            </button>

            <div wire:loading wire:target="login" class="text-center mt-2 text-gray-600">
                Logging in, please wait...
            </div>
        </form>

        <p class="text-center text-gray-600 mt-6">
            Don’t have an account?
            <a href="{{ route('register') }}" class="text-blue-600 hover:underline font-medium">Register</a>
        </p>
    @endif

</div>
