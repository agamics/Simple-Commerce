@if(auth()->check())
    <div class="relative group ml-2 z-50">
        <button
            class="w-10 h-10 rounded-full border-2 border-white shadow-sm focus:outline-none transition-transform active:scale-95">
            <img src="https://ui-avatars.com/api/?name=Jane+Doe&background=random&rounded=true" alt="Profile"
                class="w-full h-full rounded-full">
        </button>

        <!-- Dropdown Menu -->
        <div
            class="absolute right-0 mt-2 w-48 bg-white dark:bg-gray-800 rounded-2xl shadow-xl border border-gray-100 dark:border-gray-700 opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-300 transform origin-top-right group-hover:translate-y-0 translate-y-2">
            <div class="p-2 space-y-1">
                <a href="#"
                    class="flex items-center gap-3 px-4 py-2.5 text-sm text-dark dark:text-gray-200 hover:bg-gray-50 dark:hover:bg-gray-700 rounded-xl transition-colors">
                    <i class="bi bi-person text-primary"></i>
                    Profile
                </a>
                <hr class="border-gray-100 dark:border-gray-700 my-1">
                <a href="{{ route('logout') }}"
                    class="flex items-center gap-3 px-4 py-2.5 text-sm text-red-500 hover:bg-red-50 dark:hover:bg-red-900/20 rounded-xl transition-colors">
                    <i class="bi bi-box-arrow-right"></i>
                    Logout
                </a>
            </div>
        </div>
    </div>
@else
    <a id="themeToggle"
        class="w-10 h-10 bg-white dark:bg-gray-800 dark:text-white rounded-full shadow-sm flex items-center justify-center border border-transparent hover:bg-gray-50 dark:hover:bg-gray-700 transition"
        href="{{ route('login') }}">
        <i class="bi bi-person text-lg"></i>
    </a>
@endif