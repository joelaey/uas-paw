@extends('user.layout')

@section('content')
    <div class="p-8">

        <!-- Back Button -->
        <a href="{{ route('user.riwayat') }}" class="inline-flex items-center text-gray-600 hover:text-gray-900 mb-6">
            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
            </svg>
            Kembali ke Riwayat
        </a>

        <!-- Header -->
        <h1 class="text-3xl font-bold mb-6">Detail Pengaduan</h1>

        <!-- Card -->
        <div class="bg-white rounded-3xl shadow-lg p-8 max-w-4xl">

            <!-- Status Badge -->
            <div class="flex justify-between items-start mb-6">
                <div>
                    <h2 class="text-2xl font-bold">{{ $aspiration->title }}</h2>
                    <p class="text-gray-500 mt-1">{{ $aspiration->created_at->format('d F Y, H:i') }}</p>
                </div>
                <div>
                    @if($aspiration->status == 'baru')
                        <span class="px-4 py-2 bg-blue-100 text-blue-700 rounded-full font-medium">Baru</span>
                    @elseif($aspiration->status == 'diproses')
                        <span class="px-4 py-2 bg-yellow-100 text-yellow-700 rounded-full font-medium">Diproses</span>
                    @elseif($aspiration->status == 'selesai')
                        <span class="px-4 py-2 bg-green-100 text-green-700 rounded-full font-medium">Selesai</span>
                    @else
                        <span class="px-4 py-2 bg-red-100 text-red-700 rounded-full font-medium">Ditolak</span>
                    @endif
                </div>
            </div>

            <!-- Location -->
            <div class="mb-6">
                <h3 class="font-semibold text-gray-700 mb-2">Lokasi</h3>
                <p class="text-gray-600">{{ $aspiration->location }}</p>
            </div>

            <!-- Content -->
            <div class="mb-6">
                <h3 class="font-semibold text-gray-700 mb-2">Isi Pengaduan</h3>
                <div class="bg-gray-50 rounded-xl p-4">
                    <p class="text-gray-600 whitespace-pre-line">{{ $aspiration->content }}</p>
                </div>
            </div>

            <!-- Image -->
            @if($aspiration->image)
                <div class="mb-6">
                    <h3 class="font-semibold text-gray-700 mb-2">Foto Lampiran</h3>
                    <img src="{{ asset('storage/' . $aspiration->image) }}" alt="Lampiran" class="rounded-xl max-w-md">
                </div>
            @endif

            <!-- Admin Response -->
            @if($aspiration->admin_response)
                <div class="mt-8 pt-6 border-t">
                    <h3 class="font-semibold text-gray-700 mb-2">Respon Admin</h3>
                    <div class="bg-blue-50 rounded-xl p-4">
                        <p class="text-gray-700 whitespace-pre-line">{{ $aspiration->admin_response }}</p>
                    </div>
                    @if($aspiration->responder)
                        <p class="text-sm text-gray-500 mt-2">
                            Direspon oleh {{ $aspiration->responder->name }} pada
                            {{ $aspiration->responded_at->format('d F Y, H:i') }}
                        </p>
                    @endif
                </div>
            @elseif($aspiration->status == 'baru')
                <div class="mt-8 pt-6 border-t">
                    <div class="bg-yellow-50 rounded-xl p-4 text-center">
                        <p class="text-yellow-700">Pengaduan Anda sedang menunggu untuk ditinjau oleh admin.</p>
                    </div>
                </div>
            @endif

        </div>
    </div>
@endsection