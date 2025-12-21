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

            <img src="{{ asset('images/ilustrasi.png') }}" class="absolute bottom-10 left-10 w-[420px]" alt="Ilustrasi">
        </div>

        {{-- RIGHT --}}
        <div class="w-full lg:w-1/2 bg-white rounded-l-[48px] flex items-center justify-center px-6">
            <div class="w-full max-w-md" x-data="{ show:false, show2:false }">

                {{-- Logo --}}
                <img src="{{ asset('images/logo.png') }}" class="w-24 mx-auto mb-6" alt="Logo">

                <h2 class="text-3xl font-bold text-center mb-8">
                    New Password
                </h2>

                <!-- Error Message -->
                @if($errors->any())
                    <div class="mb-4 p-4 bg-red-100 border border-red-400 text-red-700 rounded-lg">
                        @foreach($errors->all() as $error)
                            <p>{{ $error }}</p>
                        @endforeach
                    </div>
                @endif

                <form method="POST" action="/auth/new-password">
                    @csrf

                    {{-- Password --}}
                    <div class="mb-5 relative">
                        <label class="block mb-2">Enter New Password</label>
                        <input :type="show ? 'text' : 'password'" name="password" placeholder="Minimal 7 Karakter"
                            class="w-full px-6 py-4 rounded-full border shadow" required>
                        <button type="button" @click="show=!show" class="absolute right-5 top-[52px] text-gray-400">
                            <svg x-show="!show" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                            </svg>
                            <svg x-show="show" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.542-7a9.956 9.956 0 012.223-3.592M6.223 6.223A9.956 9.956 0 0112 5c4.478 0 8.268 2.943 9.542 7a9.978 9.978 0 01-4.293 5.058M15 12a3 3 0 00-3-3" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3l18 18" />
                            </svg>
                        </button>
                    </div>

                    {{-- Confirm --}}
                    <div class="mb-8 relative">
                        <label class="block mb-2">Confirm Password</label>
                        <input :type="show2 ? 'text' : 'password'" name="password_confirmation"
                            placeholder="Masukan kembali password" class="w-full px-6 py-4 rounded-full border shadow"
                            required>
                        <button type="button" @click="show2=!show2" class="absolute right-5 top-[52px] text-gray-400">
                            <svg x-show="!show2" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                            </svg>
                            <svg x-show="show2" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.542-7a9.956 9.956 0 012.223-3.592M6.223 6.223A9.956 9.956 0 0112 5c4.478 0 8.268 2.943 9.542 7a9.978 9.978 0 01-4.293 5.058M15 12a3 3 0 00-3-3" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3l18 18" />
                            </svg>
                        </button>
                    </div>

                    <button type="submit" class="w-full py-4 rounded-full bg-[#9BB0D1] font-semibold shadow">
                        Submit
                    </button>
                </form>
            </div>
        </div>
    </div>
@endsection