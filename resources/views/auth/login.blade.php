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
                <img src="{{ asset('images/ilustrasi.png') }}" alt="Ilustrasi" class="w-[420px] max-w-full" />
            </div>
        </div>

        <!-- RIGHT -->
        <div class="w-full lg:w-1/2 flex items-center justify-center bg-white rounded-l-[40px]">
            <div class="w-full max-w-md px-8" x-data="{ show: false, remember: true }">

                <!-- Logo -->
                <div class="flex justify-center mb-6">
                    <img src="{{ asset('images/logo.png') }}" alt="Logo" class="w-20 h-20 rounded-full" />
                </div>


                <h2 class="text-2xl font-bold text-center mb-6">
                    Pengaduan Masyarakat
                </h2>

                <!-- Success Message -->
                @if(session('success'))
                    <div class="mb-4 p-4 bg-green-100 border border-green-400 text-green-700 rounded-lg">
                        {{ session('success') }}
                    </div>
                @endif

                <!-- Error Message -->
                @if($errors->any())
                    <div class="mb-4 p-4 bg-red-100 border border-red-400 text-red-700 rounded-lg">
                        @foreach($errors->all() as $error)
                            <p>{{ $error }}</p>
                        @endforeach
                    </div>
                @endif

                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <!-- Email -->
                    <div class="mb-4">
                        <label class="block mb-1 text-sm font-medium">Email</label>
                        <input type="email" name="email" value="{{ old('email') }}" placeholder="Masukan email"
                            class="w-full rounded-full border px-5 py-3 focus:outline-none focus:ring-2 focus:ring-blue-400"
                            required>
                    </div>

                    <!-- Password -->
                    <div class="mb-4 relative">
                        <label class="block mb-1 text-sm font-medium">Password</label>

                        <input :type="show ? 'text' : 'password'" name="password" placeholder="Masukan password"
                            class="w-full rounded-full border px-5 py-3 pr-12 focus:outline-none focus:ring-2 focus:ring-blue-400"
                            required>

                        <button type="button" @click="show = !show"
                            class="absolute right-4 top-9 text-gray-400 hover:text-gray-600">
                            <!-- eye open -->
                            <svg x-show="!show" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5
                         c4.478 0 8.268 2.943 9.542 7
                         -1.274 4.057-5.064 7-9.542 7
                         -4.477 0-8.268-2.943-9.542-7z" />
                            </svg>

                            <!-- eye off -->
                            <svg x-show="show" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19
                         c-4.478 0-8.268-2.943-9.542-7
                         a9.956 9.956 0 012.223-3.592M6.223 6.223
                         A9.956 9.956 0 0112 5
                         c4.478 0 8.268 2.943 9.542 7
                         a9.978 9.978 0 01-4.293 5.058M15 12
                         a3 3 0 00-3-3" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3l18 18" />
                            </svg>
                        </button>
                    </div>


                    <!-- Remember -->
                    <div class="flex items-center justify-between mb-6">
                        <label class="flex items-center gap-2 text-sm cursor-pointer">
                            <input type="checkbox" name="remember" x-model="remember" class="hidden">
                            <span class="w-10 h-5 rounded-full relative transition"
                                :class="remember ? 'bg-blue-500' : 'bg-gray-300'">
                                <span class="absolute top-0.5 left-0.5 w-4 h-4 bg-white rounded-full transition"
                                    :class="remember ? 'translate-x-5' : ''"></span>
                            </span>
                            Remember Me
                        </label>

                        <a href="/auth/forgot" class="text-sm text-blue-600 hover:underline">
                            Lupa Password?
                        </a>
                    </div>

                    <!-- Button -->
                    <button type="submit"
                        class="w-full bg-gray-800 text-white py-3 rounded-full text-lg font-medium hover:bg-gray-900 transition">
                        Login
                    </button>
                </form>

                <!-- Register -->
                <p class="text-center text-sm mt-6">
                    Belum punya akun?
                    <a href="/auth/register" class="text-blue-600 font-medium hover:underline">
                        Daftar Akun Baru
                    </a>
                </p>

            </div>
        </div>
    </div>
@endsection