<x-app-layout>
<div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">

    <!-- Status Message -->
    @if (session('status'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-6">
            {{ session('status') }}
        </div>
    @endif

    <!-- Card -->
    <div class="bg-white shadow rounded-lg p-6">

        <!-- Header -->
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-2xl font-semibold text-gray-800">Create User</h2>
            <a href="{{ url('users') }}" class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded">
                Back
            </a>
        </div>

        <!-- Form -->
        <form action="{{ url('users') }}" method="POST" class="space-y-4">
            @csrf

            <!-- Name -->
            <div>
                <label for="name" class="block text-gray-700 font-medium mb-2">Name</label>
                <input type="text" name="name" id="name" placeholder="Enter Name"
                    value="{{ old('name') }}"
                    class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
                @error('name')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Email -->
            <div>
                <label for="email" class="block text-gray-700 font-medium mb-2">Email</label>
                <input type="email" name="email" id="email" placeholder="Enter Email"
                    value="{{ old('email') }}"
                    class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
                @error('email')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Password -->
            <div>
                <label for="password" class="block text-gray-700 font-medium mb-2">Password</label>
                <input type="password" name="password" id="password" placeholder="Enter Password"
                    class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
                @error('password')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Confirm Password -->
            <div>
                <label for="password_confirmation" class="block text-gray-700 font-medium mb-2">Confirm Password</label>
                <input type="password" name="password_confirmation" id="password_confirmation" placeholder="Re-enter Password"
                    class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            <!-- User Type -->
            <div>
                <label for="usertype" class="block text-gray-700 font-medium mb-2">User Type</label>
                <select name="usertype" id="usertype"
                    class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <option value="">-- Select User Type --</option>
                    <option value="admin" {{ old('usertype') == 'admin' ? 'selected' : '' }}>Admin</option>
                    <option value="user" {{ old('usertype') == 'user' ? 'selected' : '' }}>User</option>
                </select>
                @error('usertype')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Submit Button -->
            <div class="flex justify-end">
                <button type="submit"
                    class="bg-blue-500 hover:bg-blue-600 text-white px-6 py-2 rounded-lg font-semibold">
                    Save
                </button>
            </div>
        </form>

    </div>
</div>
</x-app-layout>
