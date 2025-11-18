@section('title', 'Register')

<div class="max-w-md mx-auto mt-16 bg-white shadow-lg rounded-xl p-8">

    <h2 class="text-3xl font-bold text-center text-blue-700 mb-6">Register</h2>

    @if ($errorMessage)
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
            {{ $errorMessage }}
        </div>
    @endif

    @if ($successMessage)
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
            {{ $successMessage }}
        </div>
    @endif

    @if (!$registered)
        <form wire:submit.prevent="register" class="space-y-5">

            <div>
                <label class="block text-gray-700 font-medium mb-1">Name</label>
                <input type="text" wire:model="name"
                       class="w-full border-gray-300 rounded-lg p-2 focus:ring focus:ring-blue-200 focus:border-blue-400"
                       placeholder="Your Name" required>
            </div>

            <div>
                <label class="block text-gray-700 font-medium mb-1">Email</label>
                <input type="email" wire:model="email"
                       class="w-full border-gray-300 rounded-lg p-2 focus:ring focus:ring-blue-200 focus:border-blue-400"
                       placeholder="you@example.com" required>
            </div>

            <div>
                <label class="block text-gray-700 font-medium mb-1">Password</label>
                <input type="password" wire:model="password"
                       class="w-full border-gray-300 rounded-lg p-2 focus:ring focus:ring-blue-200 focus:border-blue-400"
                       placeholder="Password" required>
            </div>

            <div>
                <label class="block text-gray-700 font-medium mb-1">Confirm Password</label>
                <input type="password" wire:model="confirmPassword"
                       class="w-full border-gray-300 rounded-lg p-2 focus:ring focus:ring-blue-200 focus:border-blue-400"
                       placeholder="Confirm Password" required>
            </div>

            <button type="submit"
                    class="w-full bg-blue-600 text-white font-semibold py-2 rounded-lg shadow hover:bg-blue-700 transition">
                Register
            </button>
        </form>
    @else
        <p class="text-center text-gray-700 mt-4">
            Already have an account? <a href="{{ route('login') }}" class="text-blue-600 hover:underline">Login here</a>.
        </p>
    @endif

</div>
