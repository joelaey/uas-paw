<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Admin Panel - Pengaduan Masyarakat</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- PWA Meta Tags -->
    <meta name="theme-color" content="#8FA6C9">
    <meta name="description" content="Admin Panel - Aplikasi Pengaduan Masyarakat">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="default">
    <meta name="apple-mobile-web-app-title" content="Admin Pengaduan">
    <link rel="apple-touch-icon" href="{{ asset('images/icons/icon-192x192.png') }}">
    <link rel="manifest" href="{{ asset('manifest.json') }}">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-100 font-sans" x-data="{ sidebarOpen: false }">

    <!-- Mobile Header -->
    <div
        class="lg:hidden fixed top-0 left-0 right-0 z-40 bg-[#8FA6C9] text-white px-4 py-3 flex items-center justify-between shadow-md">
        <div class="flex items-center gap-3">
            <img src="{{ asset('images/logo.png') }}" class="w-8 h-8 rounded-full" alt="Logo">
            <span class="font-bold">Admin Panel</span>
        </div>
        <button @click="sidebarOpen = !sidebarOpen" class="p-2 rounded-lg hover:bg-white/20 transition">
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

        <!-- ================= SIDEBAR ================= -->
        <aside
            class="fixed lg:static inset-y-0 left-0 z-50 w-64 bg-[#8FA6C9] text-white flex flex-col transform transition-transform duration-300 ease-in-out"
            :class="sidebarOpen ? 'translate-x-0' : '-translate-x-full lg:translate-x-0'">

            <!-- Logo -->
            <div class="flex items-center gap-3 px-6 py-5 border-b border-white/20">
                <img src="{{ asset('images/logo.png') }}" class="w-10 h-10 rounded-full" alt="Logo">
                <div>
                    <p class="font-bold leading-tight">Admin Panel</p>
                    <p class="text-sm opacity-80">Pengaduan</p>
                </div>
            </div>

            <!-- Menu -->
            <nav class="flex-1 px-4 py-6 space-y-2">

                <!-- Dashboard -->
                <a href="{{ url('/admin/dashboard') }}" @click="sidebarOpen = false"
                    class="flex items-center gap-3 px-4 py-3 rounded-xl hover:bg-white/20 transition {{ request()->is('admin/dashboard') ? 'bg-white/20' : '' }}">
                    <!-- icon -->
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path d="M3 12l9-9 9 9" />
                        <path d="M9 21V9h6v12" />
                    </svg>
                    <span>Dashboard</span>
                </a>

                <!-- Pengaduan -->
                <a href="{{ url('/admin/pengaduan') }}" @click="sidebarOpen = false"
                    class="flex items-center gap-3 px-4 py-3 rounded-xl hover:bg-white/20 transition {{ request()->is('admin/pengaduan*') ? 'bg-white/20' : '' }}">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path d="M21 15a2 2 0 01-2 2H7l-4 4V5a2 2 0 012-2h14a2 2 0 012 2z" />
                    </svg>
                    <span>Pengaduan</span>
                </a>

                <!-- Users -->
                <a href="{{ url('/admin/users') }}" @click="sidebarOpen = false"
                    class="flex items-center gap-3 px-4 py-3 rounded-xl hover:bg-white/20 transition {{ request()->is('admin/users*') ? 'bg-white/20' : '' }}">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path d="M17 21v-2a4 4 0 00-4-4H5a4 4 0 00-4 4v2" />
                        <circle cx="9" cy="7" r="4" />
                        <path d="M23 21v-2a4 4 0 00-3-3.87" />
                        <path d="M16 3.13a4 4 0 010 7.75" />
                    </svg>
                    <span>Kelola Users</span>
                </a>

                <!-- Profile -->
                <a href="{{ url('/admin/profile') }}" @click="sidebarOpen = false"
                    class="flex items-center gap-3 px-4 py-3 rounded-xl hover:bg-white/20 transition {{ request()->is('admin/profile*') ? 'bg-white/20' : '' }}">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <circle cx="12" cy="7" r="4" />
                        <path d="M5.5 21a6.5 6.5 0 0113 0" />
                    </svg>
                    <span>Profile</span>
                </a>

            </nav>

            <!-- Logout -->
            <div class="px-4 py-4 border-t border-white/20">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit"
                        class="flex items-center gap-3 px-4 py-3 rounded-xl hover:bg-red-500 transition w-full">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path d="M9 21H5a2 2 0 01-2-2V5a2 2 0 012-2h4" />
                            <path d="M16 17l5-5-5-5" />
                            <path d="M21 12H9" />
                        </svg>
                        <span>Logout</span>
                    </button>
                </form>
            </div>
        </aside>

        <!-- ================= MAIN CONTENT ================= -->
        <main class="flex-1 p-4 sm:p-6 lg:p-8 pt-20 lg:pt-8">

            <!-- Header -->
            <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 mb-8">
                <div>
                    <h1 class="text-xl sm:text-2xl font-bold">@yield('title')</h1>
                    <p class="text-gray-500 text-sm">
                        {{ now()->format('H:i') }} - {{ now()->translatedFormat('d F Y') }}
                    </p>
                </div>

                <div class="flex items-center gap-4">
                    <!-- Search -->
                    <div class="relative hidden sm:block">
                        <input type="text" placeholder="Search..."
                            class="pl-10 pr-4 py-2 rounded-full border shadow-sm focus:outline-none w-full sm:w-auto">
                        <svg class="w-5 h-5 absolute left-3 top-2.5 text-gray-400" fill="none" stroke="currentColor"
                            stroke-width="2" viewBox="0 0 24 24">
                            <circle cx="11" cy="11" r="8" />
                            <path d="M21 21l-4.3-4.3" />
                        </svg>
                    </div>

                    <!-- Avatar -->
                    <img src="{{ asset('images/avatar.png') }}" class="w-10 h-10 rounded-full border" alt="Admin"
                        onerror="this.src='https://ui-avatars.com/api/?name=Admin&background=8FA6C9&color=fff'">
                </div>
            </div>

            <!-- Page Content -->
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