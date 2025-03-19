<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Services') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-2">
                <form action="{{ route('services.index') }}" method="GET" class="flex items-center mb-4">
                    <input type="search" name="search" value="{{ $search }}" placeholder="Search" class="border-2 border-gray-300 rounded-md p-2 w-full">
                    <button type="submit" class="bg-purple-400 border p-2 rounded-md">Search</button>
                </form>

                <table class="w-full min-w-full divide-y divide-gray-200">
                    <thead>
                        <tr>
                            <th class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Name
                            </th>
                            <th class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Description
                            </th>
                            <th class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Price
                            </th>
                            <th class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Actions
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($services as $service)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                    {{ $service->name }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                    {{ $service->description }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                    {{ $service->price }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 flex items-center gap-2">
                                    <a href="{{ route('services.edit', $service->id) }}" class="bg-blue-500 text-white p-2 rounded-md">Edit</a>
                                    <form action="{{ route('services.destroy', $service->id) }}" method="POST" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="bg-red-500 text-white p-2 rounded-md"
                                        onclick="return confirm('Are you sure you want to delete this service?')"
                                        >Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $services->links() }}
            </div>
        </div>
    </div>
</x-app-layout>
