<x-app-layout>
    @include('layouts.navigation')
<div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">

    <div class="bg-white shadow rounded-lg p-6">
        @if (session('status'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                {{ session('status') }}
            </div>
        @endif

                <div class="flex justify-between items-center mb-4">
            <h4 class="text-xl font-bold">Task</h4>
            <a href="{{ route('task-admin.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
                Add Task
            </a>
        </div>

        <div class="overflow-x-auto">
    <table class="min-w-full bg-white border border-gray-200 mx-auto">
        <thead class="bg-gray-100">
            <tr>
                <th class="px-4 py-2 border-r w-16 text-center">ID</th>
                <th class="px-4 py-2 border-r w-48 text-center">Title</th>
                <th class="px-4 py-2 border-r w-48 text-center">Description</th>
                <th class="px-4 py-2 border-r w-48 text-center">Status</th>
                <th class="px-4 py-2 border-r w-48 text-center">Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($tasks as $task)
                <tr class="hover:bg-gray-50">
                    <td class="px-4 py-2 border-r text-center">{{ $task->id }}</td>
                    <td class="px-4 py-2 border-r text-center">{{ $task->title }}</td>
                    <td class="px-4 py-2 border-r text-center">{{ $task->description }}</td>
                    <td class="px-4 py-2 border-r text-center">{{ ucfirst($task->status) }}</td>
                    <td class="px-4 py-2 border-r text-center space-x-2">
                        <a href="{{ url('task-admin/'.$task->id.'/edit') }}" class="bg-blue-500 text-white px-3 py-1 rounded hover:bg-blue-600">Edit</a>
                        <form action="{{ route('task-admin.destroy', $task->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600"
                                onclick="return confirm('Are you sure to delete this category?')">
                                Delete
                            </button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="text-center px-4 py-2">No tasks found</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>


        <div class="mt-4 flex justify-start">
    {{ $tasks->links() }}
</div>



    </div>

</div>
</x-app-layout>
