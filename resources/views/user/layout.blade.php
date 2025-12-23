<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Pengaduan Masyarakat</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- PWA Meta Tags -->
    <meta name="theme-color" content="#8FA6C9">
    <meta name="description" content="Aplikasi Pengaduan Masyarakat - Untuk Infrastruktur & Pelayanan yang Lebih Baik">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="default">
    <meta name="apple-mobile-web-app-title" content="Pengaduan">
    <link rel="apple-touch-icon" href="{{ asset('images/icons/icon-192x192.png') }}">
    <link rel="manifest" href="{{ asset('manifest.json') }}">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-[#F5F7FB]" x-data="{ sidebarOpen: false }">

    <!-- Mobile Header -->
    <div
        class="lg:hidden fixed top-0 left-0 right-0 z-40 bg-[#C9D7EE] px-4 py-3 flex items-center justify-between shadow-md">
        <div class="flex items-center gap-3">
            <img src="{{ asset('images/logo.png') }}" class="w-10 h-10" alt="Logo">
            <h1 class="text-base font-bold">Pengaduan Masyarakat</h1>
        </div>
        <button @click="sidebarOpen = !sidebarOpen" class="p-2 rounded-lg hover:bg-white/50 transition">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <path x-show="!sidebarOpen" d="M4 6h16M4 12h16M4 18h16" />
                <path x-show="sidebarOpen" d="M6 18L18 6M6 6l12 12" />
            </svg>
        </button>
    </div>

    <!-- Overlay -->
    <div x-show="sidebarOpen" @click="sidebarOpen = false"
        class="lg:hidden fixed inset-0 bg-black/50 z-40 transition-opacity"
        x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0"
        x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in duration-200"
        x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0">
    </div>

    <div class="flex min-h-screen">

        <!-- SIDEBAR -->
        <aside
            class="fixed lg:static inset-y-0 left-0 z-50 w-72 bg-[#C9D7EE] rounded-tr-[40px] rounded-br-[40px] p-6 flex flex-col transform transition-transform duration-300 ease-in-out"
            :class="sidebarOpen ? 'translate-x-0' : '-translate-x-full lg:translate-x-0'">

            <div class="flex items-center gap-3 mb-10">
                <img src="{{ asset('images/logo.png') }}" class="w-12 h-12" alt="Logo">
                <h1 class="text-lg font-bold">Pengaduan<br>Masyarakat</h1>
            </div>

            <nav class="space-y-3 flex-1">
                <a href="{{ route('user.dashboard') }}" @click="sidebarOpen = false" class="flex items-center gap-3 px-4 py-3 rounded-xl hover:bg-white transition
               {{ request()->routeIs('user.dashboard') ? 'bg-white shadow' : '' }}">
                    <!-- Home Icon -->
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z" />
                    </svg>
                    Home
                </a>

                <a href="{{ route('user.pengaduan') }}" @click="sidebarOpen = false" class="flex items-center gap-3 px-4 py-3 rounded-xl hover:bg-white transition
               {{ request()->routeIs('user.pengaduan') ? 'bg-white shadow' : '' }}">
                    <!-- Form Icon -->
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path d="M9 12h6M9 16h6M5 4h14v16H5z" />
                    </svg>
                    Pengaduan
                </a>

                <a href="{{ route('user.riwayat') }}" @click="sidebarOpen = false" class="flex items-center gap-3 px-4 py-3 rounded-xl hover:bg-white transition
               {{ request()->routeIs('user.riwayat') ? 'bg-white shadow' : '' }}">
                    <!-- History Icon -->
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path d="M3 3v5h5M3 8a9 9 0 1 1 3 6" />
                    </svg>
                    Riwayat Pengaduan
                </a>

                <a href="{{ route('user.profile') }}" @click="sidebarOpen = false" class="flex items-center gap-3 px-4 py-3 rounded-xl hover:bg-white transition
               {{ request()->routeIs('user.profile') ? 'bg-white shadow' : '' }}">
                    <!-- User Icon -->
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2" />
                        <circle cx="12" cy="7" r="4" />
                    </svg>
                    Profile
                </a>
            </nav>

            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit"
                    class="flex items-center gap-3 px-4 py-3 text-red-600 hover:bg-white rounded-xl w-full">
                    <!-- Logout Icon -->
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4" />
                        <path d="M16 17l5-5-5-5" />
                        <path d="M21 12H9" />
                    </svg>
                    Log Out
                </button>
            </form>
        </aside>

        <!-- MAIN -->
        <main class="flex-1 p-4 sm:p-6 lg:p-10 pt-20 lg:pt-10">
            @yield('content')
        </main>

    </div>

    <!-- Service Worker Registration -->
    <script>
        if ('serviceWorker' in navigator) {
            window.addEventListener('load', () => {
                navigator.serviceWorker.register('/sw.js')
                    .then(reg => console.log('SW registered:', reg.scope))
                    .catch(err => console.log('SW registration failed:', err));
            });
        }
    </script>

</body>

</html>