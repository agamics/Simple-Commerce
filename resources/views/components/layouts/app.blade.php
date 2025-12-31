<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>{{ $title ?? env('APP_NAME') ?? 'SimpleCommerce' }}</title>
        <!-- Google Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700&display=swap"
            rel="stylesheet">
        <!-- Bootstrap Icons -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
        <!-- Tailwind CSS -->
        <script src="https://cdn.tailwindcss.com"></script>
        <script>
            tailwind.config = {
                darkMode: 'class',
                theme: {
                    extend: {
                        fontFamily: {
                            sans: ['"Plus Jakarta Sans"', 'sans-serif'],
                        },
                        colors: {
                            primary: '#f25922',
                            'primary-hover': '#d94a1d',
                            bg: '#f4f6f9',
                            dark: '#1e1e2d',
                            muted: '#6c757d',
                        }
                    }
                }
            }
        </script>
        <style>
            .product-card-hover:hover .product-img {
                transform: scale(1.1);
            }

            .hide-scrollbar::-webkit-scrollbar {
                display: none;
            }

            .hide-scrollbar {
                -ms-overflow-style: none;
                scrollbar-width: none;
            }
        </style>
    </head>

<body
    class="text-dark dark:text-gray-100 bg-gray-200 dark:bg-gray-900 font-sans p-4 min-h-screen flex justify-center transition-colors duration-300">

    <!-- Main Wrapper -->
    <div
        class="w-full max-w-[1600px] bg-[#f4f6f9] dark:bg-[#151521] rounded-[2.5rem] p-6 lg:p-8 shadow-xl min-h-[95vh] transition-colors duration-300">

        <!-- Top Navigation -->
        <nav class="flex flex-col lg:flex-row items-center justify-between mb-8 gap-4 lg:gap-0">
            <div class="flex items-center w-full lg:w-auto justify-between lg:justify-start">
                <a href="index.html" class="flex items-center gap-2 font-bold text-xl mr-12 text-dark dark:text-white">
                    <div
                        class="w-7 h-7 bg-primary text-white rounded-full flex items-center justify-center text-xs font-black">
                        <i class="bi bi-chat-quote-fill scale-75"></i>
                    </div>
                    SimpleCommerce
                </a>

                @include('lite.nav')
                <button class="lg:hidden text-2xl dark:text-white"><i class="bi bi-list"></i></button>
            </div>

            <div class="flex items-center gap-3 w-full lg:w-auto justify-end">
                <div
                    class="hidden lg:flex items-center bg-white dark:bg-gray-800 rounded-full px-4 py-2 w-80 shadow-sm">
                    <i class="bi bi-search text-gray-400 mr-3"></i>
                    <input type="text" placeholder="Search products..."
                        class="bg-transparent outline-none w-full text-sm placeholder-gray-400 dark:text-white">
                </div>
                <button id="themeToggle"
                    class="w-10 h-10 bg-white dark:bg-gray-800 dark:text-white rounded-full shadow-sm flex items-center justify-center border border-transparent hover:bg-gray-50 dark:hover:bg-gray-700 transition">
                    <i class="bi bi-moon text-lg"></i>
                </button>
                <livewire:cart-counter />
                @include('lite.user')
            </div>
        </nav>

        <!-- Header -->
        <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-8 gap-4">
            <div>
                <nav class="flex text-xs text-muted mb-2 gap-2">
                    <a href="index.html" class="hover:text-primary transition">Home</a>
                    <span>/</span>
                    <span class="text-dark dark:text-white font-semibold">Shop</span>
                </nav>
                <h1 class="text-3xl font-bold text-dark dark:text-white">Our Products</h1>
            </div>
            <div class="flex gap-4">
                <select
                    class="bg-white dark:bg-gray-800 text-sm px-6 py-3 rounded-full shadow-sm border-none outline-none dark:text-white">
                    <option>Sort by: Popularity</option>
                    <option>Price: Low to High</option>
                    <option>Price: High to Low</option>
                </select>
            </div>
        </div>

        {{ $slot }}

        <!-- Footer -->
        <footer
            class="mt-12 pt-6 border-t border-gray-100 dark:border-gray-800 flex flex-col md:flex-row justify-between items-center gap-4 text-xs text-muted">
            <div>&copy; 2025 <span class="font-bold text-dark dark:text-white">SimpleCommerce.</span> All rights
                reserved.
            </div>
            <div class="flex gap-6">
                <a href="#" class="hover:text-primary transition">Privacy Policy</a>
                <a href="#" class="hover:text-primary transition">Terms of Service</a>
                <a href="#" class="hover:text-primary transition">Help Center</a>
            </div>
        </footer>
    </div>
    <script>
        const modal = document.getElementById('loginModal');
        const modalPanel = document.getElementById('modalPanel');

        function openLoginModal() {
            modal.classList.remove('hidden');
            // Small delay to allow display:block to apply before opacity transition
            setTimeout(() => {
                modal.classList.remove('opacity-0');
                modalPanel.classList.remove('scale-95', 'opacity-0');
                modalPanel.classList.add('scale-100', 'opacity-100');
            }, 10);
            document.body.style.overflow = 'hidden'; // Prevent scrolling
        }

        function closeLoginModal() {
            modal.classList.add('opacity-0');
            modalPanel.classList.remove('scale-100', 'opacity-100');
            modalPanel.classList.add('scale-95', 'opacity-0');

            setTimeout(() => {
                modal.classList.add('hidden');
                document.body.style.overflow = ''; // Restore scrolling
            }, 300); // Match transition duration
        }

        // Close on escape key
        document.addEventListener('keydown', function (event) {
            if (event.key === 'Escape' && !modal.classList.contains('hidden')) {
                closeLoginModal();
            }
        });

        // Theme Toggler
        const themeToggleBtn = document.getElementById('themeToggle');
        const themeIcon = themeToggleBtn.querySelector('i');
        const htmlElement = document.documentElement;
        const storedTheme = localStorage.getItem('theme');
        const systemTheme = window.matchMedia('(prefers-color-scheme: dark)').matches ? 'dark' : 'light';
        const initialTheme = storedTheme || systemTheme;
        if (initialTheme === 'dark') {
            htmlElement.classList.add('dark');
            themeIcon.classList.replace('bi-moon', 'bi-sun');
        }
        themeToggleBtn.addEventListener('click', () => {
            if (htmlElement.classList.contains('dark')) {
                htmlElement.classList.remove('dark');
                localStorage.setItem('theme', 'light');
                themeIcon.classList.replace('bi-sun', 'bi-moon');
            } else {
                htmlElement.classList.add('dark');
                localStorage.setItem('theme', 'dark');
                themeIcon.classList.replace('bi-moon', 'bi-sun');
            }
        });
    </script>
    <!-- Toast Notification -->
    <div x-data="{ show: false, message: '' }"
        x-on:show-toast.window="show = true; message = $event.detail.message; setTimeout(() => show = false, 3000)"
        class="fixed bottom-5 right-5 z-50">
        <div x-show="show" x-transition:enter="transition ease-out duration-300"
            x-transition:enter-start="opacity-0 translate-y-2" x-transition:enter-end="opacity-100 translate-y-0"
            x-transition:leave="transition ease-in duration-200" x-transition:leave-start="opacity-100 translate-y-0"
            x-transition:leave-end="opacity-0 translate-y-2"
            class="bg-dark dark:bg-white text-white dark:text-dark px-6 py-3 rounded-xl shadow-lg flex items-center gap-3">
            <div class="w-8 h-8 bg-primary rounded-full flex items-center justify-center text-white shrink-0">
                <i class="bi bi-cart-check-fill text-sm"></i>
            </div>
            <span x-text="message" class="font-semibold text-sm"></span>
        </div>
    </div>
</body>

</html>