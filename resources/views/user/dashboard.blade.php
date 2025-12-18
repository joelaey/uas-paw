@extends('user.layout')

@section('content')

<!-- HEADER -->
<div class="flex justify-between items-center mb-8">
    <div>
        <h1 class="text-3xl font-bold">Dashboard</h1>
        <p id="datetime" class="text-sm text-gray-500"></p>
    </div>

    <div class="flex items-center gap-4">
        <input type="text" placeholder="Search"
               class="px-6 py-3 rounded-full border shadow-sm w-80">
        🔔
        <img src="https://i.pravatar.cc/40" class="rounded-full">
    </div>
</div>

<!-- WELCOME CARD -->
<div class="bg-gradient-to-r from-[#CBD8EE] to-[#E9EFF9] rounded-3xl p-8 flex justify-between items-center mb-10 shadow">
    <div>
        <h2 class="text-3xl font-bold mb-2">Selamat Datang, Jamal!</h2>
        <p class="text-gray-700 mb-6">Pantau status pengajuan anda</p>
        <a href="{{ route('user.riwayat') }}"
           class="px-8 py-3 bg-white rounded-full shadow hover:scale-105 transition inline-block">
            Lihat Laporan Pengaduan
        </a>
    </div>

    <img src="{{ asset('images/megaphone.png') }}" class="w-40">
</div>

<!-- STAT CARDS -->
<div class="grid grid-cols-4 gap-6 mb-10">
    <div class="stat-card bg-[#9EB1D4]">15<br><span>Total Pengaduan</span></div>
    <div class="stat-card bg-[#F99A91]">1<br><span>Menunggu</span></div>
    <div class="stat-card bg-[#B4E1CD]">6<br><span>Diproses</span></div>
    <div class="stat-card bg-[#F7B87A]">8<br><span>Selesai</span></div>
</div>

<!-- TABLE -->
<div class="bg-white rounded-3xl shadow p-6 flex gap-6">
    <div class="flex-1">
        <div class="bg-[#F99A91] rounded-xl p-4 font-bold flex justify-between">
            <span>Pengajuan</span>
            <span>Tanggal</span>
            <span>Status</span>
        </div>
    </div>

    <div class="w-80 bg-white rounded-3xl shadow p-6">
        <h3 class="font-bold mb-4">Statistik Pengajuan<br>Masyarakat</h3>
        <div class="w-40 h-40 rounded-full border mx-auto"></div>
    </div>
</div>

@endsection
