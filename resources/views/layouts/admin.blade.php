<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        .form-input:focus {
            outline: none;
            border-color: #2563eb;
            box-shadow: 0 0 0 2px rgba(37, 99, 235, 0.2);
        }
        .custom-shadow {
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
        }
        .edit-form input,
        .edit-form textarea,
        .edit-form select {
            width: 100%;
            padding: 0.625rem;
            border: 1px solid #d1d5db;
            border-radius: 0.5rem;
            background-color: #f9fafb;
        }
        .edit-form input:focus,
        .edit-form textarea:focus,
        .edit-form select:focus {
            outline: none;
            border-color: #0891b2;
            box-shadow: 0 0 0 2px rgba(8, 145, 178, 0.2);
        }
        .btn-primary {
            background-color: #0891b2;
            color: white;
            padding: 0.625rem 1.25rem;
            border-radius: 0.5rem;
            font-weight: 500;
            font-size: 0.875rem;
        }
        .btn-primary:hover {
            background-color: #0e7490;
        }
    </style>
    <script src="{{ asset('js/app.js') }}" defer></script>
</head>
<body class="bg-gray-100">
    <div id="app">
        <nav class="bg-white shadow-md fixed w-full z-50">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex justify-between h-16">
                    <div class="flex">
                        <div class="flex-shrink-0 flex items-center">
                            <a href="{{ url('/') }}" class="flex items-center">
                                <span class="text-xl font-bold text-cyan-600">Admin</span>
                                <span class="text-xl font-bold text-gray-600 ml-1">Panel</span>
                            </a>
                        </div>
                        <div class="hidden sm:ml-6 sm:flex sm:space-x-8">
                            <a href="{{ route('admin.dashboard') }}"
                               class="border-transparent text-gray-500 hover:border-cyan-600 hover:text-cyan-600 inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium">
                                Dashboard
                            </a>
                            <a href="{{ route('admin.items.index') }}"
                               class="border-transparent text-gray-500 hover:border-cyan-600 hover:text-cyan-600 inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium">
                                Items
                            </a>
                            <a href="{{ route('admin.users.index') }}"
                               class="border-transparent text-gray-500 hover:border-cyan-600 hover:text-cyan-600 inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium">
                                Users
                            </a>
                        </div>
                    </div>
                    <div class="hidden sm:ml-6 sm:flex sm:items-center">
                        @guest
                            <a href="{{ route('login') }}" class="text-gray-500 hover:text-cyan-600 px-3 py-2 rounded-md text-sm font-medium">
                                {{ __('Login') }}
                            </a>
                            @if (Route::has('register'))
                                <a href="{{ route('register') }}" class="ml-4 text-white bg-cyan-600 hover:bg-cyan-700 px-4 py-2 rounded-md text-sm font-medium">
                                    {{ __('Register') }}
                                </a>
                            @endif
                        @else
                            <div class="ml-3 relative">
                                <div>
                                    <button type="button" class="flex text-sm rounded-full focus:outline-none" id="user-menu-button">
                                        <span class="text-gray-700">{{ Auth::user()->name }}</span>
                                        <svg class="ml-2 h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                        </svg>
                                    </button>
                                </div>
                                <div class="hidden origin-top-right absolute right-0 mt-2 w-48 rounded-md shadow-lg py-1 bg-white ring-1 ring-black ring-opacity-5" id="user-dropdown">
                                    <a href="{{ route('logout') }}"
                                       onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                                       class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                        {{ __('Logout') }}
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                                        @csrf
                                    </form>
                                </div>
                            </div>
                        @endguest
                    </div>
                </div>
            </div>
        </nav>

        <main class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
            @yield('content')
        </main>
    </div>

    <script>
        const userMenuButton = document.getElementById('user-menu-button');
        const userDropdown = document.getElementById('user-dropdown');

        if (userMenuButton && userDropdown) {
            userMenuButton.addEventListener('click', () => {
                userDropdown.classList.toggle('hidden');
            });

            document.addEventListener('click', (event) => {
                if (!userMenuButton.contains(event.target) && !userDropdown.contains(event.target)) {
                    userDropdown.classList.add('hidden');
                }
            });
        }
    </script>
</body>
</html>
