@extends('admin.layout')

@section('content')
    <h1 class="text-2xl font-bold mb-6">Profile Admin</h1>

    <!-- Success Message -->
    @if(session('success'))
        <div class="mb-6 p-4 bg-green-100 border border-green-400 text-green-700 rounded-lg max-w-xl">
            {{ session('success') }}
        </div>
    @endif

    <!-- Error Message -->
    @if($errors->any())
        <div class="mb-6 p-4 bg-red-100 border border-red-400 text-red-700 rounded-lg max-w-xl">
            @foreach($errors->all() as $error)
                <p>{{ $error }}</p>
            @endforeach
        </div>
    @endif

    <form method="POST" action="{{ route('admin.profile.update') }}" class="bg-white rounded-xl shadow p-6 max-w-xl">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label class="text-sm font-medium">Nama</label>
            <input type="text" name="name" value="{{ old('name', $user->name) }}" class="w-full border p-3 rounded-lg mt-1"
                required>
        </div>

        <div class="mb-4">
            <label class="text-sm font-medium">Email</label>
            <input type="email" name="email" value="{{ old('email', $user->email) }}"
                class="w-full border p-3 rounded-lg mt-1" required>
        </div>

        <hr class="my-6">

        <h3 class="font-semibold mb-4">Ubah Password (Opsional)</h3>

        <div class="mb-4">
            <label class="text-sm font-medium">Password Saat Ini</label>
            <input type="password" name="current_password" class="w-full border p-3 rounded-lg mt-1">
        </div>

        <div class="mb-4">
            <label class="text-sm font-medium">Password Baru</label>
            <input type="password" name="new_password" class="w-full border p-3 rounded-lg mt-1"
                placeholder="Minimal 7 karakter">
        </div>

        <div class="mb-6">
            <label class="text-sm font-medium">Konfirmasi Password Baru</label>
            <input type="password" name="new_password_confirmation" class="w-full border p-3 rounded-lg mt-1">
        </div>

        <button type="submit" class="bg-green-600 text-white px-6 py-2 rounded-lg hover:bg-green-700">
            Simpan Perubahan
        </button>
    </form>
@endsection