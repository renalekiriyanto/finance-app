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
        <x-navbar />

        <!-- Main Content -->
        <main class="max-w-6xl mx-auto px-4 py-6">
            @yield('content')
        </main>

        <x-bottom-navigation-mobile
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
