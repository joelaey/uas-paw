@extends('admin.layout')
@section('title', 'Kelola Pengaduan')

@section('content')
    <h1 class="text-2xl font-bold mb-6">Kelola Pengaduan</h1>

    <!-- Success Message -->
    @if(session('success'))
        <div class="mb-6 p-4 bg-green-100 border border-green-400 text-green-700 rounded-lg">
            {{ session('success') }}
        </div>
    @endif

    <!-- Filters -->
    <div class="bg-white rounded-xl shadow p-4 mb-6 flex gap-4 items-center">
        <form method="GET" class="flex gap-4 items-center flex-1">
            <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari judul, lokasi, atau nama..."
                class="flex-1 px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400">

            <select name="status" class="px-4 py-2 border rounded-lg">
                <option value="">Semua Status</option>
                <option value="baru" {{ request('status') == 'baru' ? 'selected' : '' }}>Baru</option>
                <option value="diproses" {{ request('status') == 'diproses' ? 'selected' : '' }}>Diproses</option>
                <option value="selesai" {{ request('status') == 'selesai' ? 'selected' : '' }}>Selesai</option>
                <option value="ditolak" {{ request('status') == 'ditolak' ? 'selected' : '' }}>Ditolak</option>
            </select>

            <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700">
                Filter
            </button>
        </form>
    </div>

    <div class="bg-white rounded-xl shadow p-6">
        <table class="w-full text-sm">
            <thead class="bg-gray-100">
                <tr>
                    <th class="p-3 text-left">Judul</th>
                    <th class="p-3 text-left">Lokasi</th>
                    <th class="p-3 text-left">Pelapor</th>
                    <th class="p-3">Status</th>
                    <th class="p-3">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($aspirations as $aspiration)
                    <tr class="border-t">
                        <td class="p-3">{{ $aspiration->title }}</td>
                        <td class="p-3">{{ Str::limit($aspiration->location, 30) }}</td>
                        <td class="p-3">{{ $aspiration->user->name }}</td>
                        <td class="p-3 text-center">
                            @if($aspiration->status == 'baru')
                                <span class="px-2 py-1 bg-blue-100 text-blue-700 rounded-full text-xs">Baru</span>
                            @elseif($aspiration->status == 'diproses')
                                <span class="px-2 py-1 bg-yellow-100 text-yellow-700 rounded-full text-xs">Diproses</span>
                            @elseif($aspiration->status == 'selesai')
                                <span class="px-2 py-1 bg-green-100 text-green-700 rounded-full text-xs">Selesai</span>
                            @else
                                <span class="px-2 py-1 bg-red-100 text-red-700 rounded-full text-xs">Ditolak</span>
                            @endif
                        </td>
                        <td class="p-3 text-center">
                            <a href="{{ route('admin.pengaduan.show', $aspiration->id) }}"
                                class="text-blue-600 mr-3 hover:underline">Detail</a>
                            <form method="POST" action="{{ route('admin.pengaduan.destroy', $aspiration->id) }}" class="inline"
                                onsubmit="return confirm('Yakin ingin menghapus pengaduan ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-500 hover:underline">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="p-6 text-center text-gray-500">Tidak ada pengaduan ditemukan.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>

        <!-- Pagination -->
        @if($aspirations->hasPages())
            <div class="mt-6">
                {{ $aspirations->withQueryString()->links() }}
            </div>
        @endif
    </div>
@endsection