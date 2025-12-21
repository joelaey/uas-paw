@extends('user.layout')

@section('title', 'Profile')

@section('content')

    <!-- HEADER -->
    <div class="flex items-center justify-between mb-8">
        <div>
            <h1 class="text-3xl font-bold">Profile</h1>
            <p id="datetime" class="text-sm text-gray-500"></p>
        </div>

        <div class="flex items-center gap-4">
            <div class="relative">
                <input type="text" placeholder="Search" class="pl-12 pr-6 py-3 rounded-full border shadow-sm w-[320px]">
                <svg class="w-5 h-5 absolute left-4 top-3.5 text-gray-400" fill="none" stroke="currentColor"
                    stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M21 21l-4.35-4.35M16 11a5 5 0 11-10 0 5 5 0 0110 0z" />
                </svg>
            </div>

            <svg class="w-6 h-6 text-gray-600" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M15 17h5l-1.4-1.4A2 2 0 0118 14.2V11a6 6 0 10-12 0v3.2c0 .5-.2 1-.6 1.4L4 17h5" />
            </svg>

            <img src="{{ $user->avatar ? asset('storage/' . $user->avatar) : 'https://i.pravatar.cc/40?u=' . $user->id }}"
                class="w-10 h-10 rounded-full">
        </div>
    </div>

    <!-- Success Message -->
    @if(session('success'))
        <div class="mb-6 p-4 bg-green-100 border border-green-400 text-green-700 rounded-lg max-w-5xl mx-auto">
            {{ session('success') }}
        </div>
    @endif

    <!-- Error Message -->
    @if($errors->any())
        <div class="mb-6 p-4 bg-red-100 border border-red-400 text-red-700 rounded-lg max-w-5xl mx-auto">
            @foreach($errors->all() as $error)
                <p>{{ $error }}</p>
            @endforeach
        </div>
    @endif

    <!-- CARD -->
    <form method="POST" action="{{ route('user.profile.update') }}" enctype="multipart/form-data"
        class="bg-white rounded-[32px] p-10 shadow max-w-5xl mx-auto">
        @csrf
        @method('PUT')

        <!-- AVATAR -->
        <div class="flex flex-col items-center mb-10" x-data="{ preview: null }">
            <div class="relative">
                <img :src="preview || '{{ $user->avatar ? asset('storage/' . $user->avatar) : 'https://i.pravatar.cc/128?u=' . $user->id }}'"
                    class="w-32 h-32 rounded-full object-cover">

                <label
                    class="absolute bottom-0 right-0 bg-green-500 p-3 rounded-full cursor-pointer hover:bg-green-600 transition">
                    <input type="file" name="avatar" accept="image/*" class="hidden"
                        @change="preview = URL.createObjectURL($event.target.files[0])">
                    <!-- CAMERA ICON -->
                    <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3 7h4l2-3h6l2 3h4v12H3z" />
                        <circle cx="12" cy="13" r="3" />
                    </svg>
                </label>
            </div>

            <p class="text-gray-400 mt-4">Klik ikon kamera untuk mengubah foto</p>
        </div>

        <!-- FORM -->
        <div class="grid grid-cols-2 gap-6">
            <div>
                <label class="font-semibold">Nama Lengkap</label>
                <input type="text" name="name" value="{{ old('name', $user->name) }}"
                    class="w-full mt-2 px-5 py-4 rounded-full border shadow-sm" required>
            </div>

            <div>
                <label class="font-semibold">NIK</label>
                <input type="text" name="nik" value="{{ old('nik', $user->nik) }}"
                    class="w-full mt-2 px-5 py-4 rounded-full border shadow-sm" maxlength="16" required>
            </div>

            <div>
                <label class="font-semibold">Nomor HP</label>
                <input type="text" name="phone" value="{{ old('phone', $user->phone) }}"
                    class="w-full mt-2 px-5 py-4 rounded-full border shadow-sm" required>
            </div>

            <div>
                <label class="font-semibold">Email</label>
                <input type="email" name="email" value="{{ old('email', $user->email) }}"
                    class="w-full mt-2 px-5 py-4 rounded-full border shadow-sm" required>
            </div>
        </div>

        <hr class="my-8">

        <h3 class="font-semibold mb-6">Ubah Password (Opsional)</h3>

        <div class="grid grid-cols-2 gap-6">
            <div class="col-span-2" x-data="{ show: false }">
                <label class="font-semibold">Password Saat Ini</label>
                <div class="relative mt-2">
                    <input :type="show ? 'text' : 'password'" name="current_password"
                        class="w-full px-5 py-4 rounded-full border shadow-sm pr-12">
                    <button type="button" @click="show = !show" class="absolute right-5 top-4 text-gray-400">
                        <svg x-show="!show" class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                        </svg>
                        <svg x-show="show" class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.542-7a9.956 9.956 0 012.223-3.592M6.223 6.223A9.956 9.956 0 0112 5c4.478 0 8.268 2.943 9.542 7a9.978 9.978 0 01-4.293 5.058M15 12a3 3 0 00-3-3" />
                            <path stroke-linecap="round" stroke-linejoin="round" d="M3 3l18 18" />
                        </svg>
                    </button>
                </div>
            </div>

            <div x-data="{ show: false }">
                <label class="font-semibold">Password Baru</label>
                <div class="relative mt-2">
                    <input :type="show ? 'text' : 'password'" name="new_password" placeholder="Minimal 7 karakter"
                        class="w-full px-5 py-4 rounded-full border shadow-sm pr-12">
                    <button type="button" @click="show = !show" class="absolute right-5 top-4 text-gray-400">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>
                    </button>
                </div>
            </div>

            <div x-data="{ show: false }">
                <label class="font-semibold">Konfirmasi Password Baru</label>
                <div class="relative mt-2">
                    <input :type="show ? 'text' : 'password'" name="new_password_confirmation"
                        class="w-full px-5 py-4 rounded-full border shadow-sm pr-12">
                    <button type="button" @click="show = !show" class="absolute right-5 top-4 text-gray-400">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>

        <!-- BUTTON -->
        <div class="flex gap-6 mt-10">
            <button type="submit"
                class="flex-1 py-4 rounded-full bg-[#F68C87] text-white font-semibold shadow hover:scale-[1.02] transition">
                Simpan Perubahan
            </button>
            <a href="{{ route('user.dashboard') }}"
                class="w-40 py-4 rounded-full bg-[#F6B26B] text-white font-semibold shadow hover:scale-[1.02] transition text-center">
                Batal
            </a>
        </div>
    </form>

    <script>
        function updateDateTime() {
            const now = new Date();
            const options = { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric', hour: '2-digit', minute: '2-digit' };
            document.getElementById('datetime').textContent = now.toLocaleDateString('id-ID', options);
        }
        updateDateTime();
    </script>

@endsection