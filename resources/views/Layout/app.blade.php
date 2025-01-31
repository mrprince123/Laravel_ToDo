<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', 'My Laravel Todo')</title>
    <script src="https://unpkg.com/@tailwindcss/browser@4"></script>
</head>

<body class="flex flex-col min-h-screen">
    <header class="bg-gray-100 text-black shadow-md">
        <div class="max-w-screen-xl mx-auto px-6 py-4 flex justify-between items-center">
            <h1 class="text-2xl font-semibold"><a href="/">Laravel Todo</a></h1>

            <!-- Hamburger Icon for mobile -->
            <div class="lg:hidden">
                <button id="hamburger-icon" class="text-2xl">
                    &#9776; <!-- Hamburger icon -->
                </button>
            </div>

            <!-- Navigation links -->
            <nav class="hidden lg:flex items-center space-x-6">
                <a href="/" class="text-lg hover:text-pink-300 transition-colors">Home</a>

                <!-- Show Login link if the user is not logged in -->
                @guest
                    <a href="/login" class="text-lg hover:text-pink-300 transition-colors">Login</a>
                @endguest

                <!-- Show user info and logout if the user is logged in -->
                @auth
                    <div class="flex items-center space-x-4">
                        <span class="text-lg font-medium">{{ Auth::user()->name }}</span>
                        <form action="{{ route('logout') }}" method="POST" class="inline">
                            @csrf
                            <button type="submit" class="text-lg hover:text-pink-300 transition-colors">Logout</button>
                        </form>
                    </div>
                @endauth
            </nav>

            <!-- Mobile Menu (hidden by default) -->
            <div id="mobile-menu" class="lg:hidden p-4 hidden absolute top-0 left-0 w-full bg-gray-100 mt-16">
                <a href="/" class="block text-lg hover:text-pink-300 transition-colors">Home</a>

                @guest
                    <a href="/login" class="block text-lg hover:text-pink-300 transition-colors">Login</a>
                @endguest

                @auth
                    <div class="space-x-4">
                        <span class="block text-lg font-medium">{{ Auth::user()->name }}</span>
                        <form action="{{ route('logout') }}" method="POST" class="inline">
                            @csrf
                            <button type="submit"
                                class="block text-lg hover:text-pink-300 transition-colors">Logout</button>
                        </form>
                    </div>
                @endauth
            </div>

        </div>
    </header>

    <main>
        @yield('content')
    </main>

    <footer class="bg-gray-100 text-black py-6 mt-10 shadow-md">
        <div class="max-w-screen-xl mx-auto text-center">
            <p class="text-lg font-medium">&copy; 2025 My Laravel Todo App. All rights reserved.</p>
        </div>
    </footer>

    <script>
        // Toggle the mobile menu visibility
        const hamburgerIcon = document.getElementById('hamburger-icon');
        const mobileMenu = document.getElementById('mobile-menu');

        hamburgerIcon.addEventListener('click', () => {
            mobileMenu.classList.toggle('hidden');
        });
    </script>
</body>

</html>
