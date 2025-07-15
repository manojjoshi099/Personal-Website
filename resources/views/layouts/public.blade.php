<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Your Portfolio')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased bg-gray-50 text-gray-900">

    <header class="bg-white shadow-md sticky top-0 z-50">
        <nav class="container mx-auto px-4 py-4 flex justify-between items-center">
            {{-- Logo/Site Title --}}
            <a href="{{ route('home') }}"
                class="text-2xl font-extrabold text-blue-600 hover:text-blue-800 transition duration-300">
                Manoj Joshi <span class="text-purple-600"></span>
            </a>

            {{-- Desktop Navigation Links --}}
            <div class="hidden md:flex space-x-7 items-center">
                <a href="{{ route('home') }}"
                    class="nav-link {{ Request::routeIs('home') ? 'active-nav-link' : '' }}">Home</a>
                <a href="{{ route('about') }}"
                    class="nav-link {{ Request::routeIs('about') ? 'active-nav-link' : '' }}">About</a>
                <a href="{{ route('skills.index') }}"
                    class="nav-link {{ Request::routeIs('skills.index') ? 'active-nav-link' : '' }}">Skills</a>
                <a href="{{ route('projects.index') }}"
                    class="nav-link {{ Request::routeIs('projects.index') ? 'active-nav-link' : '' }}">Projects</a>
                <a href="{{ route('contact.index') }}"
                    class="nav-link {{ Request::routeIs('contact.index') ? 'active-nav-link' : '' }}">Contact</a>


                    @hasanyrole('admin')
                @guest
                    <a href="{{ route('login') }}"
                        class="nav-link {{ Request::routeIs('login') ? 'active-nav-link' : '' }}">Login</a>
                    <a href="{{ route('register') }}"
                        class="nav-link {{ Request::routeIs('register') ? 'active-nav-link' : '' }}">Register</a>
                @endguest
                @auth
                    <a href="{{ route('admin.dashboard') }}"
                        class="nav-link {{ Request::routeIs('admin.dashboard') ? 'active-nav-link' : '' }}">Dashboard</a>
                    <a href="{{ route('admin.dashboard') }}"
                        class="nav-link {{ Request::routeIs('admin.dashboard') ? 'active-nav-link' : '' }}">Admin Panel</a>
                    <form method="POST" action="{{ route('logout') }}" style="display:inline;">
                        @csrf
                        <button type="submit"
                            class="text-red-600 hover:text-red-800 transition duration-300 bg-transparent border-none cursor-pointer p-0 font-medium">Logout</button>
                    </form>
                @endauth
                @endhasanyrole

            </div>

            {{-- Mobile Menu Button --}}
            <div class="md:hidden">
                <button id="mobile-menu-button" class="text-gray-600 hover:text-indigo-600 focus:outline-none">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16"></path>
                    </svg>
                </button>
            </div>
        </nav>

        {{-- Mobile Menu (Hidden by default, toggled by JS) --}}
        <div id="mobile-menu" class="hidden md:hidden bg-white shadow-lg py-4">
            <div class="flex flex-col space-y-3 px-4">
                <a href="{{ route('home') }}"
                    class="mobile-nav-link {{ Request::routeIs('home') ? 'active-mobile-nav-link' : '' }}">Home</a>
                <a href="{{ route('about') }}"
                    class="mobile-nav-link {{ Request::routeIs('about') ? 'active-mobile-nav-link' : '' }}">About</a>
                <a href="{{ route('skills.index') }}"
                    class="mobile-nav-link {{ Request::routeIs('skills.index') ? 'active-mobile-nav-link' : '' }}">Skills</a>
                <a href="{{ route('projects.index') }}"
                    class="mobile-nav-link {{ Request::routeIs('projects.index') ? 'active-mobile-nav-link' : '' }}">Projects</a>
                <a href="{{ route('contact.index') }}"
                    class="mobile-nav-link {{ Request::routeIs('contact.index') ? 'active-mobile-nav-link' : '' }}">Contact</a>


                @hasanyrole('admin')

                @guest
                    <a href="{{ route('login') }}"
                        class="mobile-nav-link {{ Request::routeIs('login') ? 'active-mobile-nav-link' : '' }}">Login</a>
                    <a href="{{ route('register') }}"
                        class="mobile-nav-link {{ Request::routeIs('register') ? 'active-mobile-nav-link' : '' }}">Register</a>
                @endguest
                @auth
                    <a href="{{ route('admin.dashboard') }}"
                        class="mobile-nav-link {{ Request::routeIs('admin.dashboard') ? 'active-mobile-nav-link' : '' }}">Dashboard</a>
                    <a href="{{ route('admin.dashboard') }}"
                        class="mobile-nav-link {{ Request::routeIs('admin.dashboard') ? 'active-mobile-nav-link' : '' }}">Admin
                        Panel</a>
                    <form method="POST" action="{{ route('logout') }}" class="w-full">
                        @csrf
                        <button type="submit"
                            class="mobile-nav-link text-left w-full text-red-600 hover:text-red-800 transition duration-300">Logout</button>
                    </form>
                @endauth
                @endhasanyrole
            </div>
        </div>
    </header>


    {{-- Main content area --}}
    <main>
        @yield('content')
    </main>

    {{-- Your Custom Footer --}}
    {{-- Your Custom Footer (at the bottom of public.blade.php) --}}
    {{-- resources/views/layouts/public.blade.php --}}

    {{-- ... (Your existing header, navigation, and @yield('content') ) ... --}}

    <footer class="bg-gray-900 text-gray-300 py-10 mt-16 shadow-inner">
        <div class="container mx-auto px-4">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8 text-center md:text-left">

                {{-- Column 1: Brand/About --}}
                <div>
                    <h3 class="text-xl font-bold text-white mb-4">Manoj Kumar Joshi</h3>
                    <p class="text-sm leading-relaxed mb-4">
                        Passionate Web Developer crafting engaging digital experiences with Laravel, Vue.js, and modern
                        web technologies.
                    </p>
                    <p class="text-sm">
                        {{-- Optional: Add a quick motto or tagline --}}
                        Building the future, one line of code at a time.
                    </p>
                </div>

                {{-- Column 2: Quick Links --}}
                <div>
                    <h3 class="text-xl font-bold text-white mb-4">Quick Links</h3>
                    <ul class="space-y-2">
                        <li><a href="{{ route('home') }}" class="hover:text-white transition duration-300">Home</a>
                        </li>
                        <li><a href="{{ route('projects.index') }}"
                                class="hover:text-white transition duration-300">Projects</a></li>
                        <li><a href="{{ route('contact.index') }}"
                                class="hover:text-white transition duration-300">Contact</a></li>
                        {{-- Add more links as your portfolio grows, e.g., blog, services --}}
                        {{-- <li><a href="{{ route('about.index') }}" class="hover:text-white transition duration-300">About Me</a></li> --}}
                    </ul>
                </div>

                {{-- Column 3: Contact Info / Let's Connect --}}
                <div>
                    <h3 class="text-xl font-bold text-white mb-4">Get in Touch</h3>
                    <ul class="space-y-2">
                        <li class="flex items-center justify-center md:justify-start">
                            <i class="fas fa-envelope mr-3 text-blue-400"></i>
                            <a href="mailto:your.email@example.com"
                                class="hover:text-white transition duration-300">your.email@example.com</a>
                        </li>
                        <li class="flex items-center justify-center md:justify-start">
                            <i class="fas fa-phone mr-3 text-green-400"></i>
                            <span>+977 98XXXXXXXX</span> {{-- Replace with your phone number --}}
                        </li>
                        <li class="flex items-center justify-center md:justify-start">
                            <i class="fas fa-map-marker-alt mr-3 text-red-400"></i>
                            <span>Dhangadhi, Sudurpashchim Province, Nepal</span>
                        </li>
                    </ul>
                </div>

                {{-- Column 4: Social Media --}}
                <div>
                    <h3 class="text-xl font-bold text-white mb-4">Follow Me</h3>
                    @php
                        $aboutMe = App\Models\AboutMes::first(); // Fetch AboutMe data for social links
                    @endphp

                    @if ($aboutMe)
                        <div class="flex justify-center md:justify-start space-x-4">
                            @if ($aboutMe->linkedin_url)
                                <a href="{{ $aboutMe->linkedin_url }}" target="_blank"
                                    class="text-gray-400 hover:text-white transition duration-300 text-2xl"
                                    aria-label="LinkedIn">
                                    <i class="fab fa-linkedin"></i>
                                </a>
                            @endif
                            @if ($aboutMe->github_url)
                                <a href="{{ $aboutMe->github_url }}" target="_blank"
                                    class="text-gray-400 hover:text-white transition duration-300 text-2xl"
                                    aria-label="GitHub">
                                    <i class="fab fa-github"></i>
                                </a>
                            @endif
                            @if ($aboutMe->twitter_url)
                                <a href="{{ $aboutMe->twitter_url }}" target="_blank"
                                    class="text-gray-400 hover:text-white transition duration-300 text-2xl"
                                    aria-label="Twitter">
                                    <i class="fab fa-twitter"></i>
                                </a>
                            @endif
                            @if ($aboutMe->facebook_url)
                                <a href="{{ $aboutMe->facebook_url }}" target="_blank"
                                    class="text-gray-400 hover:text-white transition duration-300 text-2xl"
                                    aria-label="Facebook">
                                    <i class="fab fa-facebook"></i>
                                </a>d
                            @endif
                            @if ($aboutMe->instagram_url)
                                <a href="{{ $aboutMe->instagram_url }}" target="_blank"
                                    class="text-gray-400 hover:text-white transition duration-300 text-2xl"
                                    aria-label="Instagram">
                                    <i class="fab fa-instagram"></i>
                                </a>
                            @endif
                            @if ($aboutMe->youtube_url)
                                <a href="{{ $aboutMe->youtube_url }}" target="_blank"
                                    class="text-gray-400 hover:text-white transition duration-300 text-2xl"
                                    aria-label="YouTube">
                                    <i class="fab fa-youtube"></i>
                                </a>
                            @endif
                        </div>
                    @endif
                </div>

            </div>

            <div class="border-t border-gray-700 mt-8 pt-6 text-center text-gray-500 text-sm">
                <p>&copy; {{ date('Y') }} Manoj Kumar Joshi. All rights reserved.</p>
                <p class="mt-1">Built with <span class="text-red-500">&hearts;</span> using Laravel & Tailwind CSS
                </p>
            </div>
        </div>
    </footer>


    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const mobileMenuButton = document.getElementById('mobile-menu-button');
            const mobileMenu = document.getElementById('mobile-menu');

            mobileMenuButton.addEventListener('click', function() {
                mobileMenu.classList.toggle('hidden');
            });
        });
    </script>
</body>

</html>
