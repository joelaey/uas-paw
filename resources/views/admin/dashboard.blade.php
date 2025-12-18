@extends('admin.layout')

@section('content')
<h1 class="text-2xl font-bold mb-6">Dashboard Admin</h1>

<div class="grid grid-cols-4 gap-6 mb-8">
    <div class="bg-white p-6 rounded-xl shadow">
        <p class="text-sm text-gray-500">Total Pengaduan</p>
        <p class="text-3xl font-bold">120</p>
    </div>
    <div class="bg-white p-6 rounded-xl shadow">
        <p class="text-sm text-gray-500">Diproses</p>
        <p class="text-3xl font-bold text-yellow-500">40</p>
    </div>
    <div class="bg-white p-6 rounded-xl shadow">
        <p class="text-sm text-gray-500">Selesai</p>
        <p class="text-3xl font-bold text-green-600">60</p>
    </div>
    <div class="bg-white p-6 rounded-xl shadow">
        <p class="text-sm text-gray-500">Ditolak</p>
        <p class="text-3xl font-bold text-red-500">20</p>
    </div>
</div>

<div class="bg-white rounded-xl shadow p-6">
    <h2 class="font-semibold mb-4">Pengaduan Terbaru</h2>

    <table class="w-full text-sm">
        <thead class="bg-gray-100">
            <tr>
                <th class="p-3 text-left">Judul</th>
                <th class="p-3">Status</th>
                <th class="p-3">Aksi</th>
            </tr>
        </thead>
        <tbody>
            <tr class="border-t">
                <td class="p-3">Jalan rusak</td>
                <td class="p-3 text-yellow-500">Diproses</td>
                <td class="p-3">
                    <a href="/admin/pengaduan/detail" class="text-blue-600">Detail</a>
                </td>
            </tr>
        </tbody>
    </table>
</div>
@endsection
