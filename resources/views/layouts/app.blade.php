<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MyFinance - Personal Finance Manager</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Tambahkan Alpine JS -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha384-k6RqeWeci5ZR/Lv4MR0sA0FfDOMr8h3in8vX0/bhwHtUtKeA/y92Z60p6jG+15XZ" crossorigin="anonymous">
    <style>
        body {
            font-family: 'Inter', sans-serif;
        }
        /* Pastikan SVG ditampilkan dengan benar */
        svg {
            display: inline-block;
            vertical-align: middle;
        }
    </style>
</head>

<body class="bg-gray-50">
    <div class="min-h-screen">
        <!-- Navbar -->
        <nav class="bg-indigo-600 text-white shadow-lg">
            <div class="max-w-6xl mx-auto px-4">
                <div class="flex justify-between h-16 items-center">
                    <div class="flex items-center">
                        <span class="text-xl font-bold">MyFinance</span>
                    </div>
                    <div class="hidden md:flex items-center space-x-4">
                        <a href="#" class="px-3 py-2 rounded-md text-sm font-medium bg-indigo-700">Dashboard</a>
                        <a href="#"
                            class="px-3 py-2 rounded-md text-sm font-medium hover:bg-indigo-700">Income</a>
                        <a href="#"
                            class="px-3 py-2 rounded-md text-sm font-medium hover:bg-indigo-700">Expenses</a>
                        <a href="#"
                            class="px-3 py-2 rounded-md text-sm font-medium hover:bg-indigo-700">Reports</a>
                        @auth
                            <form action="{{route('logout')}}" method="post">
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
                    <a href="#"
                        class="block px-3 py-2 rounded-md text-base font-medium bg-indigo-700">Dashboard</a>
                    <a href="#"
                        class="block px-3 py-2 rounded-md text-base font-medium hover:bg-indigo-700">Income</a>
                    <a href="#"
                        class="block px-3 py-2 rounded-md text-base font-medium hover:bg-indigo-700">Expenses</a>
                    <a href="#"
                        class="block px-3 py-2 rounded-md text-base font-medium hover:bg-indigo-700">Reports</a>
                </div>
            </div>
        </nav>

        <!-- Main Content -->
        <main class="max-w-6xl mx-auto px-4 py-6">
            @yield('content')
        </main>

        <!-- Bottom Navigation for Mobile -->
        <div class="fixed bottom-0 left-0 right-0 bg-white shadow-lg md:hidden">
            <div class="flex justify-around py-3">
                <a href="#" class="flex flex-col items-center">
                    <svg class="h-6 w-6 text-indigo-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                    </svg>
                    <span class="text-xs mt-1">Dashboard</span>
                </a>
                <a href="#" class="flex flex-col items-center">
                    <svg class="h-6 w-6 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    <span class="text-xs mt-1">Income</span>
                </a>
                <a href="#" class="flex flex-col items-center">
                    <svg class="h-6 w-6 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z" />
                    </svg>
                    <span class="text-xs mt-1">Expenses</span>
                </a>
                <a href="#" class="flex flex-col items-center">
                    <svg class="h-6 w-6 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                    </svg>
                    <span class="text-xs mt-1">Reports</span>
                </a>
            </div>
        </div>
    </div>

    <script>
        // Mobile menu toggle
        document.getElementById('mobile-menu-button').addEventListener('click', function() {
            const menu = document.getElementById('mobile-menu');
            menu.classList.toggle('hidden');
        });
    </script>
</body>

</html>
