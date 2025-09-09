<!-- complete code -->

<x-app-layout>
    <x-slot name="header">
        <h2 class="text-lg font-semibold text-gray-800">Admin Dashboard</h2>
    </x-slot>

    <div class="flex min-h-screen mt-4">
        <!-- Sidebar -->
        <div class="flex flex-col w-48 p-4 space-y-2 bg-white border border-black">
            <a href="{{ route('admin.dashboard') }}" class="px-3 py-2 font-medium text-blue-700 rounded hover:bg-gray-200">Dashboard</a>
            <a href="{{ route('profile.edit') }}" class="px-3 py-2 font-medium text-blue-700 rounded hover:bg-gray-200">Profile update</a>
            <a href="{{ route('admin_show_user_form') }}" class="px-3 py-2 font-medium text-blue-700 rounded hover:bg-gray-200">Users</a>
        </div>

        <!-- Main content -->
        <div class="flex-1 p-4 ml-6 rounded bg-gray-50">
            <h2 class="mb-4 text-lg font-bold">User Information</h2>

            <table class="w-full border border-gray-300">
                <thead>
                    <tr class="bg-gray-200">
                        <th class="px-4 py-2 border">ID</th>
                        <th class="px-4 py-2 border">Name</th>
                        <th class="px-4 py-2 border">Email</th>
                        <th class="px-4 py-2 border">Business</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($users as $user)
                        <tr>
                            <td class="px-4 py-2 border">{{ $user->id }}</td>
                            <td class="px-4 py-2 border">{{ $user->name }}</td>
                            <td class="px-4 py-2 border">{{ $user->email }}</td>
                            <td class="px-4 py-2 border">
                                 @if($user->clients->count() > 0)
        @foreach($user->clients as $client)
            <a href="{{ route('admin.client.show', $client->id) }}" class="text-blue-600 hover:underline">
                See Business ({{ $client->company_name ?? 'No name' }})
                
            </a><br>
        @endforeach
    @else
        <span class="text-gray-500">No Business</span>
    @endif
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="px-4 py-2 text-center text-red-500 border">No users found</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>
