@extends('user.layout')

@section('content')

    <!-- HEADER -->
    <div class="flex flex-col sm:flex-row sm:justify-between sm:items-center gap-4 mb-8">
        <div>
            <h1 class="text-2xl sm:text-3xl font-bold">Dashboard</h1>
            <p id="datetime" class="text-sm text-gray-500"></p>
        </div>

        <div class="flex items-center gap-3 sm:gap-4">
            <input type="text" placeholder="Search"
                class="hidden sm:block px-4 sm:px-6 py-2 sm:py-3 rounded-full border shadow-sm w-48 sm:w-80">
            <span class="text-xl">🔔</span>
            <img src="{{ $user->avatar ? asset('storage/' . $user->avatar) : 'https://i.pravatar.cc/40?u=' . $user->id }}"
                class="rounded-full w-10 h-10">
        </div>
    </div>

    <!-- Success Message -->
    @if(session('success'))
        <div class="mb-6 p-4 bg-green-100 border border-green-400 text-green-700 rounded-lg">
            {{ session('success') }}
        </div>
    @endif

    <!-- WELCOME CARD -->
    <div
        class="bg-gradient-to-r from-[#CBD8EE] to-[#E9EFF9] rounded-2xl sm:rounded-3xl p-5 sm:p-8 flex flex-col sm:flex-row justify-between items-center gap-4 mb-8 sm:mb-10 shadow">
        <div class="text-center sm:text-left">
            <h2 class="text-xl sm:text-3xl font-bold mb-2">Selamat Datang, {{ $user->name }}!</h2>
            <p class="text-gray-700 mb-4 sm:mb-6">Pantau status pengajuan anda</p>
            <a href="{{ route('user.riwayat') }}"
                class="px-6 sm:px-8 py-2 sm:py-3 bg-white rounded-full shadow hover:scale-105 transition inline-block text-sm sm:text-base">
                Lihat Laporan Pengaduan
            </a>
        </div>

        <img src="{{ asset('images/megaphone.png') }}" class="w-28 sm:w-40" onerror="this.style.display='none'">
    </div>

    <!-- STAT CARDS -->
    <div class="grid grid-cols-2 lg:grid-cols-4 gap-3 sm:gap-6 mb-8 sm:mb-10">
        <div class="stat-card bg-[#9EB1D4] text-lg sm:text-2xl">{{ $totalAspirations }}<br><span
                class="text-xs sm:text-sm">Total Pengaduan</span></div>
        <div class="stat-card bg-[#F99A91] text-lg sm:text-2xl">{{ $waitingAspirations }}<br><span
                class="text-xs sm:text-sm">Menunggu</span></div>
        <div class="stat-card bg-[#B4E1CD] text-lg sm:text-2xl">{{ $processingAspirations }}<br><span
                class="text-xs sm:text-sm">Diproses</span></div>
        <div class="stat-card bg-[#F7B87A] text-lg sm:text-2xl">{{ $completedAspirations }}<br><span
                class="text-xs sm:text-sm">Selesai</span></div>
    </div>

    <!-- TABLE -->
    <div class="bg-white rounded-2xl sm:rounded-3xl shadow p-4 sm:p-6 overflow-hidden">
        <div class="overflow-x-auto">
            <!-- Desktop Header -->
            <div class="hidden sm:flex bg-[#F99A91] rounded-xl p-4 font-bold justify-between mb-4">
                <span class="w-1/2">Pengajuan</span>
                <span class="w-1/4 text-center">Tanggal</span>
                <span class="w-1/4 text-center">Status</span>
            </div>

            <!-- Mobile Header -->
            <div class="sm:hidden bg-[#F99A91] rounded-xl p-3 font-bold mb-3 text-center">
                Riwayat Pengaduan Terbaru
            </div>

            @forelse($recentAspirations as $aspiration)
                <!-- Desktop Row -->
                <div class="hidden sm:flex justify-between items-center py-3 border-b">
                    <span class="w-1/2 truncate">{{ $aspiration->title }}</span>
                    <span class="w-1/4 text-center text-gray-600 text-sm">{{ $aspiration->created_at->format('d M Y, H:i') }}</span>
                    <span class="w-1/4 text-center">
                        @if($aspiration->status == 'baru')
                            <span class="px-3 py-1 bg-blue-100 text-blue-700 rounded-full text-sm">Baru</span>
                        @elseif($aspiration->status == 'diproses')
                            <span class="px-3 py-1 bg-yellow-100 text-yellow-700 rounded-full text-sm">Diproses</span>
                        @elseif($aspiration->status == 'selesai')
                            <span class="px-3 py-1 bg-green-100 text-green-700 rounded-full text-sm">Selesai</span>
                        @else
                            <span class="px-3 py-1 bg-red-100 text-red-700 rounded-full text-sm">Ditolak</span>
                        @endif
                    </span>
                </div>

                <!-- Mobile Row (Card Style) -->
                <div class="sm:hidden p-3 border-b">
                    <div class="flex justify-between items-start gap-2 mb-2">
                        <span class="font-medium text-sm flex-1">{{ Str::limit($aspiration->title, 40) }}</span>
                        @if($aspiration->status == 'baru')
                            <span class="px-2 py-0.5 bg-blue-100 text-blue-700 rounded-full text-xs whitespace-nowrap">Baru</span>
                        @elseif($aspiration->status == 'diproses')
                            <span class="px-2 py-0.5 bg-yellow-100 text-yellow-700 rounded-full text-xs whitespace-nowrap">Diproses</span>
                        @elseif($aspiration->status == 'selesai')
                            <span class="px-2 py-0.5 bg-green-100 text-green-700 rounded-full text-xs whitespace-nowrap">Selesai</span>
                        @else
                            <span class="px-2 py-0.5 bg-red-100 text-red-700 rounded-full text-xs whitespace-nowrap">Ditolak</span>
                        @endif
                    </div>
                    <span class="text-xs text-gray-500">{{ $aspiration->created_at->format('d M Y') }}</span>
                </div>
            @empty
                <div class="text-center py-8 text-gray-500">
                    Belum ada pengaduan. <a href="{{ route('user.pengaduan') }}" class="text-blue-600">Buat pengaduan pertama Anda</a>
                </div>
            @endforelse
        </div>
    </div>

    <script>
        // Update datetime
        function updateDateTime() {
            const now = new Date();
            const options = { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric', hour: '2-digit', minute: '2-digit' };
            document.getElementById('datetime').textContent = now.toLocaleDateString('id-ID', options);
        }
        updateDateTime();
        setInterval(updateDateTime, 60000);
    </script>

@endsection