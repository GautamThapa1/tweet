<!DOCTYPE html>
<html lang="en" data-theme="lofi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ isset($title) ? $title . ' — Chirper' : 'Chirper' }}</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600,700" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="min-h-screen bg-base-200 font-sans antialiased">

    <div class="max-w-2xl mx-auto flex flex-col min-h-screen border-x border-base-300 bg-base-100">

        <!-- Navbar -->
        <nav class="sticky top-0 z-50 border-b border-base-300 bg-base-100/80 backdrop-blur-md">
            <div class="px-4 h-14 flex items-center justify-between">
                <a href="/" class="flex items-center gap-2 text-lg font-bold tracking-tight">
                    <span>🐦</span> Chirper
                </a>
                <div class="flex items-center gap-2">
                    @auth
                        <span class="text-sm">{{ auth()->user()->name }}</span>
                        <form method="POST" action="/logout" class="inline">
                            @csrf
                            <button type="submit" class="btn btn-ghost btn-sm">Logout</button>
                        </form>
                    @else
                        <a href="/login" class="btn btn-ghost btn-sm">Sign In</a>
                        <a href="{{ route('register') }}" class="btn btn-primary btn-sm">Sign Up</a>
                    @endauth
                </div>
            </div>
        </nav>

        <!-- Success Toast -->
        @if (session('success'))
            <div id="toast" class="toast toast-top toast-center z-50">
                <div class="alert alert-success shadow-lg">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    <span>{{ session('success') }}</span>
                </div>
            </div>
            <script>
                setTimeout(() => {
                    const toast = document.getElementById('toast');
                    if (toast) {
                        toast.style.transition = 'opacity 0.5s ease';
                        toast.style.opacity = '0';
                        setTimeout(() => toast.remove(), 500);
                    }
                }, 3000);
            </script>
        @endif

        <!-- Main Content -->
        <main class="flex-1">
            {{ $slot }}
        </main>

        <!-- Footer -->
        <footer class="border-t border-base-300 py-8 text-center">
            <p class="text-xs text-base-content/40">© {{ date('Y') }} Chirper — Built with Laravel</p>
        </footer>

    </div>

</body>
</html>