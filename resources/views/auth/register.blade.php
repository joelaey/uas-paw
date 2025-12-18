@extends('layouts.auth')

@section('content')
<div class="min-h-screen flex">

<!-- LEFT -->
<div class="hidden lg:flex w-1/2 bg-[#8FA6C9] relative p-16 text-white min-h-screen">
    <div class="flex flex-col justify-between h-full">
        <div>
            <h1 class="text-4xl font-bold leading-snug">
                Urgent Community Grievance:<br>
                For Better Infrastructure & Enforcement
            </h1>
            <p class="mt-4 text-lg italic">Pengaduan Masyarakat</p>
        </div>

        <!-- Illustration -->
        <img
            src="{{ asset('images/ilustrasi.png') }}"
            alt="Ilustrasi"
            class="w-[420px] max-w-full"
        />
    </div>
</div>


<!-- RIGHT -->
<div class="w-full lg:w-1/2 bg-white rounded-l-[48px] flex items-center justify-center px-6 pb-16">
    <div class="w-full max-w-md" x-data="registerForm()">
        
        <!-- Back -->
        <a href="/auth/login" class="inline-flex items-center mb-6 text-gray-600">
        </a>

        <!-- Logo -->
         <div class="flex justify-center mb-6">
    <img
        src="{{ asset('images/logo.png') }}"
        alt="Logo"
        class="w-20 h-20 rounded-full"
    />
</div>

        <!-- Title -->
        <h2 class="text-2xl font-bold mb-6 text-center">Daftar Akun Baru</h2>

        <form class="space-y-4">

            <!-- Nama -->
            <div>
                <label class="text-sm font-medium">Nama Lengkap <span class="text-red-500">*</span></label>
                <input type="text" placeholder="Masukkan nama lengkap"
                    class="input-ui">
            </div>

            <!-- NIK -->
            <div>
                <label class="text-sm font-medium">NIK <span class="text-red-500">*</span></label>
                <input type="text" placeholder="Masukkan 16 digit NIK"
                    class="input-ui">
            </div>

            <!-- HP -->
            <div>
                <label class="text-sm font-medium">Nomor HP <span class="text-red-500">*</span></label>
                <input type="text" placeholder="08xxxxxxxxxx"
                    class="input-ui">
            </div>

            <!-- Email -->
            <div>
                <label class="text-sm font-medium">Email <span class="text-red-500">*</span></label>
                <input type="email" placeholder="example@gmail.com"
                    class="input-ui">
            </div>

            <!-- Password -->
            <div>
                <label class="text-sm font-medium">Password <span class="text-red-500">*</span></label>
                <div class="relative">
                    <input :type="showPassword ? 'text' : 'password'"
                        placeholder="Minimal 7 Karakter"
                        class="input-ui pr-12">
                        <button
    type="button"
    @click="show = !show"
    class="absolute right-4 top-9 text-gray-400 hover:text-gray-600"
>
    <!-- eye open -->
    <svg x-show="!show" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5"
            fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M2.458 12C3.732 7.943 7.523 5 12 5
                    c4.478 0 8.268 2.943 9.542 7
                    -1.274 4.057-5.064 7-9.542 7
                    -4.477 0-8.268-2.943-9.542-7z"/>
    </svg>

    <!-- eye off -->
    <svg x-show="show" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5"
            fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M13.875 18.825A10.05 10.05 0 0112 19
                    c-4.478 0-8.268-2.943-9.542-7
                    a9.956 9.956 0 012.223-3.592M6.223 6.223
                    A9.956 9.956 0 0112 5
                    c4.478 0 8.268 2.943 9.542 7
                    a9.978 9.978 0 01-4.293 5.058M15 12
                    a3 3 0 00-3-3"/>
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M3 3l18 18"/>
    </svg>
</button>
                </div>
            </div>

            <!-- Konfirmasi -->
            <div>
                <label class="text-sm font-medium">Konfirmasi Password <span class="text-red-500">*</span></label>
                <div class="relative">
                    <input :type="showConfirm ? 'text' : 'password'"
                        placeholder="Ketik ulang password"
                        class="input-ui pr-12">
                        <button
    type="button"
    @click="show = !show"
    class="absolute right-4 top-9 text-gray-400 hover:text-gray-600"
>
    <!-- eye open -->
    <svg x-show="!show" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5"
            fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M2.458 12C3.732 7.943 7.523 5 12 5
                    c4.478 0 8.268 2.943 9.542 7
                    -1.274 4.057-5.064 7-9.542 7
                    -4.477 0-8.268-2.943-9.542-7z"/>
    </svg>

    <!-- eye off -->
    <svg x-show="show" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5"
            fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M13.875 18.825A10.05 10.05 0 0112 19
                    c-4.478 0-8.268-2.943-9.542-7
                    a9.956 9.956 0 012.223-3.592M6.223 6.223
                    A9.956 9.956 0 0112 5
                    c4.478 0 8.268 2.943 9.542 7
                    a9.978 9.978 0 01-4.293 5.058M15 12
                    a3 3 0 00-3-3"/>
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M3 3l18 18"/>
    </svg>
</button>
                </div>
            </div>

            <!-- Submit -->
            <button type="submit"
                class="w-full mt-4 bg-[#8FA6C9] text-black py-4 rounded-full font-semibold hover:opacity-90 transition">
                Daftar
            </button>

        </form>
        <p class="text-center text-sm mt-6">
            Sudah punya akun?
            <a href="/auth/login" class="text-blue-600 font-medium hover:underline">
                Masuk 
            </a>
        </p>
    </div>
</div>
</div>

<script>
function registerForm() {
return {
    showPassword: false,
    showConfirm: false,
}
}
</script>
@endsection