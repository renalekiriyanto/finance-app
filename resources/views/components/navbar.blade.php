<div>
    <!-- Navbar -->
    <nav class="bg-indigo-600 text-white shadow-lg">
        <div class="max-w-6xl mx-auto px-4">
            <div class="flex justify-between h-16 items-center">
                <div class="flex items-center">
                    <span class="text-xl font-bold">{{env('APP_NAME')}}</span>
                </div>
                <div class="hidden md:flex items-center space-x-4">
                    <a href="#" class="px-3 py-2 rounded-md text-sm font-medium bg-indigo-700">Dashboard</a>
                    <a href="#" class="px-3 py-2 rounded-md text-sm font-medium hover:bg-indigo-700">Income</a>
                    <a href="#" class="px-3 py-2 rounded-md text-sm font-medium hover:bg-indigo-700">Expenses</a>
                    <a href="#" class="px-3 py-2 rounded-md text-sm font-medium hover:bg-indigo-700">Reports</a>
                    <a href="{{route('settings')}}" class="px-3 py-2 rounded-md text-sm font-medium hover:bg-indigo-700">Settings</a>
                    @auth
                        <form action="{{ route('logout') }}" method="post">
                            @csrf
                            <button type="submit"
                                class="px-3 py-2 rounded-md text-sm font-medium bg-red-600 hover:bg-red-700">Logout</button>
                        </form>
                    @endauth
                </div>
                <div class="md:hidden">
                    <button id="mobile-menu-button" class="p-2 rounded-md hover:bg-indigo-700 focus:outline-none">
                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 6h16M4 12h16M4 18h16" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>

        <!-- Mobile menu -->
        <div id="mobile-menu" class="hidden md:hidden bg-indigo-600">
            <div class="px-2 pt-2 pb-3 space-y-1 sm:px-3">
                <a href="#" class="block px-3 py-2 rounded-md text-base font-medium bg-indigo-700">Dashboard</a>
                <a href="#"
                    class="block px-3 py-2 rounded-md text-base font-medium hover:bg-indigo-700">Income</a>
                <a href="#"
                    class="block px-3 py-2 rounded-md text-base font-medium hover:bg-indigo-700">Expenses</a>
                <a href="#"
                    class="block px-3 py-2 rounded-md text-base font-medium hover:bg-indigo-700">Reports</a>
                <a href="#"
                    class="block px-3 py-2 rounded-md text-base font-medium hover:bg-indigo-700">Settings</a>
                @auth
                    <a href="#"
                        class="block px-3 py-2 rounded-md text-base font-medium bg-red-600 hover:bg-red-700">Logout</a>
                @endauth
            </div>
        </div>
    </nav>
</div>
