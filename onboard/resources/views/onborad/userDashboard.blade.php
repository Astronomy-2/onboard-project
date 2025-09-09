<x-app-layout>
    <x-slot name="header">
    </x-slot>

    <div class="flex min-h-screen mt-4">
        <!-- Sidebar -->
        <div class="flex flex-col w-48 p-4 space-y-2 bg-white border border-black">
            <a href="{{ route('user.dashboard') }}" class="px-3 py-2 font-medium text-blue-700 rounded hover:bg-gray-200">Home</a>
            <a href="{{ route('profile.edit') }}" class="px-3 py-2 font-medium text-blue-700 rounded hover:bg-gray-200">Profile update</a>
            <a href="{{ route('user.form') }}" class="px-3 py-2 font-medium text-blue-700 rounded hover:bg-gray-200">Form</a>

           {{-- See Business Form link --}}
        @isset($client)
    @if($client->id)
        <a href="{{ route('client.show', $client->id) }}" class="px-3 py-2 font-medium text-blue-700 rounded hover:bg-gray-200">
            See Business Form
        </a>
    @else
        <span class="px-3 py-2 text-red-500">Client ID not found</span>
    @endif
        @endisset
        </div>

        <!-- Main content area -->
        <div class="flex-1 p-4 ml-6 rounded bg-gray-50">
            <p>Welcome to your dashboard!</p>

        </div>
    </div>
</x-app-layout>
