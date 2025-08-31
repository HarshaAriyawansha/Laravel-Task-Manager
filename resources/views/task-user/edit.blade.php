<x-app-layout>
<div class="max-w-4xl mx-auto py-8 sm:px-6 lg:px-8">

    <!-- Card -->
    <div class="bg-white shadow rounded-lg p-6">

        <!-- Header -->
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-2xl font-semibold text-gray-800">Edit Brand</h2>
            <a href="{{ route('task-user/index') }}" class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded">
                Back
            </a>
        </div>

        <!-- Form -->
        <form action="{{ route('task-user', $task->id) }}" method="POST" class="space-y-4">
    @csrf
    @method('PUT')


            <!-- Title -->
            <div>
                <label for="title" class="block text-gray-700 font-medium mb-2">Title</label>
                <input type="text" name="title" id="title" value="{{ $task->title }}" 
                    class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
                    @error('title')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Description -->
            <div>
                <label for="description" class="block text-gray-700 font-medium mb-2">Description</label>
                <input type="text" name="description" id="description" value="{{ $task->description }}" 
                    class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
                    @error('description')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Status -->
            <div>
                <label for="status" class="block text-gray-700 font-medium mb-2">Status</label>
                <select name="status" id="status" 
                    class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
                     <option value="pending" {{ strtolower($task->status) == 'pending' ? 'selected' : '' }}>Pending</option>
<option value="done" {{ strtolower($task->status) == 'done' ? 'selected' : '' }}>Done</option>

                </select>
                @error('status')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Submit Button -->
            <div>
                <button type="submit" 
                    class="bg-blue-500 hover:bg-blue-600 text-white px-6 py-2 rounded-lg font-semibold">
                    Update
                </button>
            </div>
        </form>

    </div>
</div>
</x-app-layout>
