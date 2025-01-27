<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Styles -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Additional Styles -->
    @stack('styles')
</head>
<body class="font-sans antialiased bg-gray-100">
    <div class="min-h-screen bg-gray-50">
        <header class="bg-white shadow">
            <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                <nav class="flex justify-between items-center">
                    <!-- Navigation Links -->
                    <div class="flex items-center space-x-4">
                        <a href="{{ route('home') }}" class="text-lg font-semibold text-gray-900">Beranda</a>
                        <a href="{{ route('auctions.index') }}" class="text-lg font-semibold text-gray-900">Lelang</a>
                        <a href="{{ route('help.faq') }}" class="text-lg font-semibold text-gray-900">FAQ</a>

                    </div>

                    <!-- Authentication Links -->
                    <div class="flex items-center space-x-4">
                        @guest
                            <a href="{{ route('login') }}" class="text-lg font-semibold text-gray-900">Masuk</a>
                            <a href="{{ route('register') }}" class="text-lg font-semibold text-gray-900">Daftar</a>
                        @else
                            <a href="{{ route('profile') }}" class="text-lg font-semibold text-gray-900">Profil</a>
                        @endguest
                    </div>
                </nav>
            </div>
        </header>

        <!-- Page Content -->
        <main class="py-4">
            @yield('content')
        </main>

        <footer class="bg-white shadow mt-8">
            <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8 text-center">
                <p class="text-gray-500">&copy; {{ date('Y') }} Aplikasi Anda. Semua hak dilindungi.</p>
            </div>
        </footer>
    </div>

    <!-- Additional Scripts -->
    @stack('scripts')
</body>
</html>
