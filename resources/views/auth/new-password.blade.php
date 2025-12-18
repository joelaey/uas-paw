@extends('layouts.auth')

@section('content')
<div class="flex min-h-screen">
    {{-- LEFT --}}
    <div class="hidden lg:flex w-1/2 bg-[#8FA6C9] relative p-16 text-white">
        <div>
            <h1 class="text-4xl font-bold leading-snug">
                Urgent Community Grievance:<br>
                For Better Infrastructure & Enforcement
            </h1>
            <p class="mt-4 text-lg italic">Pengaduan Masyarakat</p>
        </div>

        <img src="{{ asset('images/ilustrasi.png') }}"
             class="absolute bottom-10 left-10 w-[420px]" alt="Ilustrasi">
    </div>

    {{-- RIGHT --}}
    <div class="w-full lg:w-1/2 bg-white rounded-l-[48px] flex items-center justify-center px-6">
        <div class="w-full max-w-md"
             x-data="{ show:false, show2:false }">

            {{-- Logo --}}
            <img src="{{ asset('images/logo.png') }}"
                 class="w-24 mx-auto mb-6" alt="Logo">

            <h2 class="text-3xl font-bold text-center mb-8">
                New Password
            </h2>

            {{-- Password --}}
            <div class="mb-5 relative">
                <label class="block mb-2">Enter New Password</label>
                <input :type="show ? 'text' : 'password'"
                       placeholder="Minimal 7 Karakter"
                       class="w-full px-6 py-4 rounded-full border shadow">
                <button type="button"
                        @click="show=!show"
                        class="absolute right-5 top-[52px] text-gray-400">
                </button>
            </div>

            {{-- Confirm --}}
            <div class="mb-8 relative">
                <label class="block mb-2">Confirm Password</label>
                <input :type="show2 ? 'text' : 'password'"
                       placeholder="Masukan kembali password"
                       class="w-full px-6 py-4 rounded-full border shadow">
                <button type="button"
                        @click="show2=!show2"
                        class="absolute right-5 top-[52px] text-gray-400">
                </button>
            </div>

            <button
                class="w-full py-4 rounded-full bg-[#9BB0D1] font-semibold shadow">
                Submit
            </button>
        </div>
    </div>
</div>
@endsection