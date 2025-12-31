<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>{{ $title ?? env('APP_NAME') }}</title>
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
    </head>

<body
    class="text-dark dark:text-gray-100 bg-gray-200 dark:bg-gray-900 font-sans p-4 min-h-screen flex items-center justify-center transition-colors duration-300">

    <div
        class="w-full max-w-md bg-[#f4f6f9] dark:bg-[#151521] rounded-[2.5rem] p-8 md:p-12 shadow-2xl transition-colors duration-300">

        <!-- Logo Section -->
        <div class="text-center mb-10">
            <div
                class="inline-flex items-center justify-center w-20 h-20 bg-primary text-white rounded-[2rem] shadow-xl shadow-primary/20 mb-6">
                <i class="bi bi-chat-quote-fill text-3xl"></i>
            </div>
            <p class="text-muted text-sm px-4"> <span class="text-primary font-bold">SimpleCommerce</span>.</p>
        </div>

        <!-- Login Form -->
        <form action="{{ route('login.process') }}" method="POST" class="space-y-6">@csrf @method('POST')
            <div>
                <label class="block text-[10px] font-bold text-muted uppercase tracking-widest mb-2 ml-4">Email
                    Address</label>
                <div class="relative group">
                    <span
                        class="absolute left-6 top-1/2 -translate-y-1/2 text-muted group-focus-within:text-primary transition-colors">
                        <i class="bi bi-envelope"></i>
                    </span>
                    <input type="email" placeholder="name@example.com" name="email"
                        class="w-full bg-white dark:bg-gray-800 border-2 border-transparent focus:border-primary/20 rounded-full pl-14 pr-6 py-4 text-sm outline-none dark:text-white shadow-sm transition-all">
                </div>
            </div>

            <div>
                <label
                    class="block text-[10px] font-bold text-muted uppercase tracking-widest mb-2 ml-4">Password</label>
                <div class="relative group">
                    <span
                        class="absolute left-6 top-1/2 -translate-y-1/2 text-muted group-focus-within:text-primary transition-colors">
                        <i class="bi bi-lock"></i>
                    </span>
                    <input type="password" placeholder="••••••••" name="password"
                        class="w-full bg-white dark:bg-gray-800 border-2 border-transparent focus:border-primary/20 rounded-full pl-14 pr-6 py-4 text-sm outline-none dark:text-white shadow-sm transition-all">
                </div>
            </div>

            <div class="flex items-center justify-between px-2">
                <label class="flex items-center gap-3 cursor-pointer group">
                </label>
                <a href="#" class="text-xs font-bold text-primary hover:text-primary-hover transition-colors">Forgot
                    Password?</a>
            </div>

            <button type="submit"
                class="w-full bg-primary text-white py-4 rounded-full font-bold text-lg shadow-lg shadow-primary/20 hover:scale-[1.02] transition-transform">
                Sign In
            </button>
        </form>

        <div class="text-center mt-10">
            <p class="text-xs text-muted">Don't have an account? <a href="index.html"
                    class="text-primary font-bold hover:underline">Create Account</a></p>
        </div>
    </div>

</body>

</html>