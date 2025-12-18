@extends('user.layout')

@section('content')
<div class="px-8 py-6">

    <!-- HEADER -->
    <div class="flex justify-between items-center mb-8">
        <div>
            <h1 class="text-3xl font-bold">Pengaduan</h1>
            <p id="datetime" class="text-sm text-gray-500"></p>
        </div>

        <!-- SEARCH -->
        <div class="relative w-[420px]">
            <input
                type="text"
                placeholder="Search"
                class="w-full pl-12 pr-4 py-3 rounded-full border border-gray-300 shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-400"
            >
            <svg class="absolute left-4 top-1/2 -translate-y-1/2 text-gray-400"
                width="20" height="20" fill="none" stroke="currentColor" stroke-width="2"
                viewBox="0 0 24 24">
                <circle cx="11" cy="11" r="8"></circle>
                <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
            </svg>
        </div>
    </div>

    <!-- CARD FORM -->
    <div class="bg-white rounded-3xl shadow-lg p-10 max-w-4xl">

        <h2 class="text-3xl font-bold mb-2">Buat Pengaduan Anda</h2>
        <p class="text-gray-600 mb-8">
            Sampaikan keluhan anda tentang fasilitas dan pelayanan publik
        </p>

        <!-- FORM -->
        <form action="#" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf

            <!-- JUDUL -->
            <div>
                <label class="font-semibold block mb-2">
                    Judul Pengaduan <span class="text-red-500">*</span>
                </label>
                <input
                    type="text"
                    placeholder="Contoh: Lampu Jalan Mati di Kecamatan Cibiru"
                    class="w-full px-5 py-4 rounded-2xl border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-400"
                >
            </div>

            <!-- LOKASI -->
            <div>
                <label class="font-semibold block mb-2">
                    Lokasi Pengaduan <span class="text-red-500">*</span>
                </label>
                <input
                    type="text"
                    placeholder="Contoh: Jl. A. H Nasution Cibiru No.102"
                    class="w-full px-5 py-4 rounded-2xl border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-400"
                >
            </div>

            <!-- ISI LAPORAN -->
            <div>
                <label class="font-semibold block mb-2">
                    Isi Laporan <span class="text-red-500">*</span>
                </label>
                <textarea
                    rows="5"
                    placeholder="Jelaskan kronologi yang akan dil explain..."
                    class="w-full px-5 py-4 rounded-2xl border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-400 resize-none"
                ></textarea>
            </div>

            <!-- UPLOAD -->
            <div>
                <label class="font-semibold block mb-3">
                    Upload Foto (Maks. 5MB)
                </label>

                <label class="border-2 border-dashed rounded-2xl p-10 flex flex-col items-center justify-center cursor-pointer hover:bg-gray-50 transition">
                    <input type="file" class="hidden">
                    <svg width="48" height="48" fill="none" stroke="currentColor"
                        class="text-gray-400 mb-4"
                        stroke-width="2" viewBox="0 0 24 24">
                        <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"/>
                        <polyline points="17 8 12 3 7 8"/>
                        <line x1="12" y1="3" x2="12" y2="15"/>
                    </svg>

                    <p class="text-gray-500 text-sm text-center">
                        Klik untuk upload foto<br>
                        PNG, JPG hingga 5MB
                    </p>
                </label>
            </div>

            <!-- BUTTON -->
            <div class="pt-6">
                <button
                    type="submit"
                    class="w-full bg-[#8FA6C9] hover:bg-[#7c94b8] transition text-black font-semibold py-4 rounded-full shadow-md"
                >
                    Kirim Pengaduan
                </button>
            </div>

        </form>
    </div>
</div>
@endsection
