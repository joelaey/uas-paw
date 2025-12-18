<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Admin Panel - Pengaduan Masyarakat</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    @vite(['resources/css/app.css','resources/js/app.js'])
</head>

<body class="bg-gray-100 font-sans">

<div class="flex min-h-screen">

    <!-- ================= SIDEBAR ================= -->
    <aside class="w-64 bg-[#8FA6C9] text-white flex flex-col">

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
            <a href="{{ url('/admin/dashboard') }}"
               class="flex items-center gap-3 px-4 py-3 rounded-xl hover:bg-white/20 transition">
                <!-- icon -->
                <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2"
                     viewBox="0 0 24 24">
                    <path d="M3 12l9-9 9 9"/>
                    <path d="M9 21V9h6v12"/>
                </svg>
                <span>Dashboard</span>
            </a>

            <!-- Pengaduan -->
            <a href="{{ url('/admin/pengaduan') }}"
               class="flex items-center gap-3 px-4 py-3 rounded-xl hover:bg-white/20 transition">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2"
                     viewBox="0 0 24 24">
                    <path d="M21 15a2 2 0 01-2 2H7l-4 4V5a2 2 0 012-2h14a2 2 0 012 2z"/>
                </svg>
                <span>Pengaduan</span>
            </a>

            <!-- Users -->
            <a href="{{ url('/admin/users') }}"
               class="flex items-center gap-3 px-4 py-3 rounded-xl hover:bg-white/20 transition">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2"
                     viewBox="0 0 24 24">
                    <path d="M17 21v-2a4 4 0 00-4-4H5a4 4 0 00-4 4v2"/>
                    <circle cx="9" cy="7" r="4"/>
                    <path d="M23 21v-2a4 4 0 00-3-3.87"/>
                    <path d="M16 3.13a4 4 0 010 7.75"/>
                </svg>
                <span>Kelola Users</span>
            </a>

            <!-- Profile -->
            <a href="{{ url('/admin/profile') }}"
               class="flex items-center gap-3 px-4 py-3 rounded-xl hover:bg-white/20 transition">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2"
                     viewBox="0 0 24 24">
                    <circle cx="12" cy="7" r="4"/>
                    <path d="M5.5 21a6.5 6.5 0 0113 0"/>
                </svg>
                <span>Profile</span>
            </a>

        </nav>

        <!-- Logout -->
        <div class="px-4 py-4 border-t border-white/20">
            <a href="{{ url('/logout') }}"
               class="flex items-center gap-3 px-4 py-3 rounded-xl hover:bg-red-500 transition">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2"
                     viewBox="0 0 24 24">
                    <path d="M9 21H5a2 2 0 01-2-2V5a2 2 0 012-2h4"/>
                    <path d="M16 17l5-5-5-5"/>
                    <path d="M21 12H9"/>
                </svg>
                <span>Logout</span>
            </a>
        </div>
    </aside>

    <!-- ================= MAIN CONTENT ================= -->
    <main class="flex-1 p-8">

        <!-- Header -->
        <div class="flex items-center justify-between mb-8">
            <div>
                <h1 class="text-2xl font-bold">@yield('title')</h1>
                <p class="text-gray-500 text-sm">
                    {{ now()->format('H:i') }} - {{ now()->translatedFormat('d F Y') }}
                </p>
            </div>

            <div class="flex items-center gap-4">
                <!-- Search -->
                <div class="relative">
                    <input type="text" placeholder="Search..."
                           class="pl-10 pr-4 py-2 rounded-full border shadow-sm focus:outline-none">
                    <svg class="w-5 h-5 absolute left-3 top-2.5 text-gray-400"
                         fill="none" stroke="currentColor" stroke-width="2"
                         viewBox="0 0 24 24">
                        <circle cx="11" cy="11" r="8"/>
                        <path d="M21 21l-4.3-4.3"/>
                    </svg>
                </div>

                <!-- Avatar -->
                <img src="{{ asset('images/avatar.png') }}"
                     class="w-10 h-10 rounded-full border" alt="Admin">
            </div>
        </div>

        <!-- Page Content -->
        @yield('content')

    </main>

</div>

</body>
</html>
