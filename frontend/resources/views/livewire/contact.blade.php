@section('title', 'Contact')

<div class="max-w-lg mx-auto mt-16 bg-white shadow-lg rounded-xl p-8">

    <h2 class="text-3xl font-bold text-center text-blue-700 mb-6">Contact Us</h2>

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

    <form wire:submit.prevent="submit" class="space-y-5">

        <div>
            <label class="block text-gray-700 font-medium mb-1">Name</label>
            <input type="text" wire:model="name"
                   class="w-full border-gray-300 rounded-lg p-2 focus:ring focus:ring-blue-200 focus:border-blue-400"
                   placeholder="Your Name">
        </div>

        <div>
            <label class="block text-gray-700 font-medium mb-1">Email</label>
            <input type="email" wire:model="email"
                   class="w-full border-gray-300 rounded-lg p-2 focus:ring focus:ring-blue-200 focus:border-blue-400"
                   placeholder="you@example.com">
        </div>

        <div>
            <label class="block text-gray-700 font-medium mb-1">Subject</label>
            <input type="text" wire:model="subject"
                   class="w-full border-gray-300 rounded-lg p-2 focus:ring focus:ring-blue-200 focus:border-blue-400"
                   placeholder="Subject">
        </div>

        <div>
            <label class="block text-gray-700 font-medium mb-1">Message</label>
            <textarea wire:model="message"
                      class="w-full border-gray-300 rounded-lg p-2 focus:ring focus:ring-blue-200 focus:border-blue-400"
                      placeholder="Your message..." rows="4"></textarea>
        </div>

        <button type="submit"
                class="w-full bg-blue-600 text-white font-semibold py-2 rounded-lg shadow hover:bg-blue-700 transition">
            Send Message
        </button>
    </form>

</div>
