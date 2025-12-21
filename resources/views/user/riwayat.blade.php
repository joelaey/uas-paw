@extends('user.layout')

@section('content')
    <div class="p-8">

        <!-- Header -->
        <h1 class="text-3xl font-bold mb-6">Riwayat Pengaduan</h1>

        <!-- Success Message -->
        @if(session('success'))
            <div class="mb-6 p-4 bg-green-100 border border-green-400 text-green-700 rounded-lg">
                {{ session('success') }}
            </div>
        @endif

        <!-- Table Container -->
        <div class="bg-white rounded-3xl shadow-lg p-6">

            <!-- Table Head -->
            <div class="grid grid-cols-12 gap-4 mb-6">
                <div class="col-span-6">
                    <div class="bg-[#8FA6C9] text-white font-semibold rounded-full py-3 text-center">
                        Riwayat Pengaduan
                    </div>
                </div>
                <div class="col-span-3">
                    <div class="bg-[#F79A8B] text-white font-semibold rounded-full py-3 text-center">
                        Tanggal
                    </div>
                </div>
                <div class="col-span-3">
                    <div class="bg-[#F9B572] text-white font-semibold rounded-full py-3 text-center">
                        Status
                    </div>
                </div>
            </div>

            <!-- ROW -->
            <div class="space-y-5">
                @forelse($aspirations as $aspiration)
                    <!-- Item -->
                    <a href="{{ route('user.riwayat.show', $aspiration->id) }}"
                        class="grid grid-cols-12 gap-4 items-center hover:bg-gray-50 rounded-lg p-2 transition">
                        <div class="col-span-6 font-medium">
                            {{ $aspiration->title }}
                        </div>
                        <div class="col-span-3 text-gray-600">
                            {{ $aspiration->created_at->format('d F Y, H:i') }}
                        </div>
                        <div class="col-span-3 flex gap-2">
                            @if($aspiration->status == 'baru')
                                <span class="status-baru">Baru</span>
                            @elseif($aspiration->status == 'diproses')
                                <span class="status-diproses">Diproses</span>
                            @elseif($aspiration->status == 'selesai')
                                <span class="status-selesai">Selesai</span>
                            @else
                                <span class="px-4 py-1 bg-red-100 text-red-700 rounded-full text-sm">Ditolak</span>
                            @endif
                        </div>
                    </a>
                @empty
                    <div class="text-center py-8 text-gray-500">
                        Belum ada riwayat pengaduan. <a href="{{ route('user.pengaduan') }}" class="text-blue-600">Buat
                            pengaduan pertama Anda</a>
                    </div>
                @endforelse
            </div>

            <!-- Pagination -->
            @if($aspirations->hasPages())
                <div class="mt-6">
                    {{ $aspirations->links() }}
                </div>
            @endif
        </div>
    </div>
@endsection