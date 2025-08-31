<nav class="bg-white border-b border-gray-100">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex justify-between h-16 items-center">
        
        <!-- Logo / Dashboard link -->
        <a href="{{ route('dashboard') }}" class="text-2xl font-bold text-gray-800 flex items-center space-x-2">
            <i class="fa-solid fa-house fa-lg"></i>
            <span>Task Management</span>
        </a>

        <!-- Navigation Links -->
        <div class="space-x-6 hidden sm:flex">
            <x-nav-link :href="route('task-user.index')" :active="request()->routeIs('task-user.*')">
                Task Management
            </x-nav-link>

        </div>

        <!-- User Dropdown -->
        <div class="hidden sm:flex sm:items-center">
            <x-dropdown align="right" width="48">
                <x-slot name="trigger">
                    <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm rounded-md text-gray-500 bg-white hover:text-gray-700">
                        <div>{{ Auth::user()->name }}</div>
                        <div class="ml-1">
                            <svg class="fill-current h-4 w-4" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                            </svg>
                        </div>
                    </button>
                </x-slot>

                <x-slot name="content">
                    <x-dropdown-link :href="route('profile.edit')">
                        Profile
                    </x-dropdown-link>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <x-dropdown-link :href="route('logout')"
                                onclick="event.preventDefault(); this.closest('form').submit();">
                            Log Out
                        </x-dropdown-link>
                    </form>
                </x-slot>
            </x-dropdown>
        </div>

    </div>
</nav>
