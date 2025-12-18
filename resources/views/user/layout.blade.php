<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Pengaduan Masyarakat</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-[#F5F7FB]">

<div class="flex min-h-screen">

    <!-- SIDEBAR -->
    <aside class="w-72 bg-[#C9D7EE] rounded-tr-[40px] rounded-br-[40px] p-6 flex flex-col">
        <div class="flex items-center gap-3 mb-10">
            <img src="{{ asset('images/logo.png') }}" class="w-12 h-12" alt="Logo">
            <h1 class="text-lg font-bold">Pengaduan<br>Masyarakat</h1>
        </div>

        <nav class="space-y-3 flex-1">
            <a href="{{ route('user.dashboard') }}"
               class="flex items-center gap-3 px-4 py-3 rounded-xl hover:bg-white transition
               {{ request()->routeIs('user.dashboard') ? 'bg-white shadow' : '' }}">
                <!-- Home Icon -->
                <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2"
                     viewBox="0 0 24 24">
                    <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/>
                </svg>
                Home
            </a>

            <a href="{{ route('user.pengaduan') }}"
               class="flex items-center gap-3 px-4 py-3 rounded-xl hover:bg-white transition
               {{ request()->routeIs('user.pengaduan') ? 'bg-white shadow' : '' }}">
                <!-- Form Icon -->
                <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2"
                     viewBox="0 0 24 24">
                    <path d="M9 12h6M9 16h6M5 4h14v16H5z"/>
                </svg>
                Pengaduan
            </a>

            <a href="{{ route('user.riwayat') }}"
               class="flex items-center gap-3 px-4 py-3 rounded-xl hover:bg-white transition
               {{ request()->routeIs('user.riwayat') ? 'bg-white shadow' : '' }}">
                <!-- History Icon -->
                <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2"
                     viewBox="0 0 24 24">
                    <path d="M3 3v5h5M3 8a9 9 0 1 1 3 6"/>
                </svg>
                Riwayat Pengaduan
            </a>

            <a href="{{ route('user.profile') }}"
               class="flex items-center gap-3 px-4 py-3 rounded-xl hover:bg-white transition
               {{ request()->routeIs('user.profile') ? 'bg-white shadow' : '' }}">
                <!-- User Icon -->
                <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2"
                     viewBox="0 0 24 24">
                    <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/>
                    <circle cx="12" cy="7" r="4"/>
                </svg>
                Profile
            </a>
        </nav>

        <a href="/logout" class="flex items-center gap-3 px-4 py-3 text-red-600 hover:bg-white rounded-xl">
            <!-- Logout Icon -->
            <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2"
                 viewBox="0 0 24 24">
                <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"/>
                <path d="M16 17l5-5-5-5"/>
                <path d="M21 12H9"/>
            </svg>
            Log Out
        </a>
    </aside>

    <!-- MAIN -->
    <main class="flex-1 p-10">
        @yield('content')
    </main>

</div>

</body>
</html>
