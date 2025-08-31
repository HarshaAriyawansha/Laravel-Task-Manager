<x-app-layout>
<div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">

    <!-- Status Message -->
    @if (session('status'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-6">
            {{ session('status') }}
        </div>
    @endif

    <div class="bg-white shadow rounded-lg p-6">

        <div class="flex justify-between items-center mb-6">
            <h2 class="text-2xl font-semibold text-gray-800">Create Brand</h2>
            <a href="{{ url('task-user') }}" class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded">
                Back
            </a>
        </div>

        <form action="{{ url('task-user') }}" method="POST" class="space-y-4">
            @csrf

            <div>
                <label for="title" class="block text-gray-700 font-medium mb-2">Title </label>
                <input type="text" name="title" id="title" placeholder="Enter Title" 
                    class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
                    @error('title')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="description" class="block text-gray-700 font-medium mb-2">Description</label>
                <input type="text" name="description" id="description" placeholder="Enter Description" 
                    class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
                    @error('description')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <button type="submit" 
                    class="bg-blue-500 hover:bg-blue-600 text-white px-6 py-2 rounded-lg font-semibold">
                    Save
                </button>
            </div>
        </form>

    </div>
</div>
</x-app-layout>
