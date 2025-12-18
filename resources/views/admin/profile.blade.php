@extends('admin.layout')

@section('content')
<h1 class="text-2xl font-bold mb-6">Profile Admin</h1>

<div class="bg-white rounded-xl shadow p-6 max-w-xl">
    <div class="mb-4">
        <label class="text-sm">Nama</label>
        <input class="w-full border p-3 rounded-lg" value="Admin Utama">
    </div>

    <div class="mb-4">
        <label class="text-sm">Email</label>
        <input class="w-full border p-3 rounded-lg" value="admin@mail.com">
    </div>

    <button class="bg-green-600 text-white px-4 py-2 rounded-lg">
        Simpan Perubahan
    </button>
</div>
@endsection
