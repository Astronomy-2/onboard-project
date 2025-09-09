<x-app-layout>
    <x-slot name="header">
        <h2 class="text-lg font-semibold text-gray-800">All User Forms</h2>
    </x-slot>

    <div class="flex min-h-screen mt-4">
        <!-- Sidebar -->
        <div class="flex flex-col w-48 p-4 space-y-2 bg-white border border-black">
            <a href="{{ route('admin.dashboard') }}" class="px-3 py-2 font-medium text-blue-700 rounded hover:bg-gray-200">Dashboard</a>
            <a href="{{ route('admin.clients') }}" class="px-3 py-2 font-medium text-blue-700 rounded hover:bg-gray-200">User Forms</a>
        </div>

        <!-- Main content -->
        <div class="flex-1 p-4 ml-6 rounded bg-gray-50">
            <h2 class="mb-4 text-lg font-bold">Client Forms</h2>

            <table class="w-full border border-gray-300">
                <thead>
                    <tr class="bg-gray-200">
                        <th class="px-4 py-2 border">ID</th>
                        <th class="px-4 py-2 border">User</th>
                        <th class="px-4 py-2 border">Company</th>
                        <th class="px-4 py-2 border">Email</th>
                        <th class="px-4 py-2 border">Action</th>
                    </tr>
                </thead>
                <tbody>

                        <tr>
                            <td class="px-4 py-2 border"></td>
                            <td class="px-4 py-2 border"> </td>
                            <td class="px-4 py-2 border"></td>
                            <td class="px-4 py-2 border"></td>
                            <td class="px-4 py-2 border">
                                <a href=" class="text-blue-600 hover:underline">View Form</a>
                            </td>
                        </tr>

                        <tr>
                            <td colspan="5" class="px-4 py-2 text-center text-red-500 border">No client forms found</td>
                        </tr>

                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>
