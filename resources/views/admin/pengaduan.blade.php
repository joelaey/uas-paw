@extends('admin.layout')

@section('content')
<h1 class="text-2xl font-bold mb-6">Kelola Pengaduan</h1>

<div class="bg-white rounded-xl shadow p-6">
<table class="w-full text-sm">
<thead class="bg-gray-100">
<tr>
    <th class="p-3">Judul</th>
    <th>Status</th>
    <th>Pelapor</th>
    <th>Status</th>
    <th>Aksi</th>
</tr>
</thead>
<tbody>
<tr class="border-t">
    <td class="p-3">Lampu mati</td>
    <td>Umum</td>
    <td>Budi</td>
    <td class="text-yellow-500">Diproses</td>
    <td>
        <a href="/admin/pengaduan/detail" class="text-blue-600 mr-3">Detail</a>
        <button class="text-red-500">Hapus</button>
    </td>
</tr>
</tbody>
</table>
</div>
@endsection
