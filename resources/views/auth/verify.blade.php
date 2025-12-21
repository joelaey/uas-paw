@extends('layouts.auth')

@section('content')
    <div class="flex min-h-screen">

        <!-- LEFT -->
        <div class="hidden lg:flex w-1/2 bg-[#8FA6C9] relative p-16 text-white">
            <div>
                <h1 class="text-4xl font-bold leading-snug">
                    Urgent Community Grievance:<br>
                    For Better Infrastructure & Enforcement
                </h1>
                <p class="mt-4 text-lg italic">Pengaduan Masyarakat</p>
            </div>

            <img src="{{ asset('images/ilustrasi.png') }}" class="absolute bottom-10 left-10 w-[420px]" />
        </div>

        <!-- RIGHT -->
        <div class="w-full lg:w-1/2 bg-white rounded-l-[48px] flex items-center justify-center px-6">
            <div class="w-full max-w-md" x-data="otpVerification()">

                <!-- Logo -->
                <div class="flex justify-center mb-6">
                    <img src="{{ asset('images/logo.png') }}" class="w-24 h-24" />
                </div>

                <h2 class="text-2xl font-bold text-center mb-2">Verification</h2>
                <p class="text-center text-gray-500 mb-6">
                    Enter Verification Code
                </p>

                <!-- Error Message -->
                @if($errors->any())
                    <div class="mb-4 p-4 bg-red-100 border border-red-400 text-red-700 rounded-lg">
                        @foreach($errors->all() as $error)
                            <p>{{ $error }}</p>
                        @endforeach
                    </div>
                @endif

                <form method="POST" action="/auth/verify">
                    @csrf

                    <!-- OTP INPUT -->
                    <div class="flex justify-center gap-4 mb-6">
                        <template x-for="(digit, index) in otp" :key="index">
                            <input type="text" maxlength="1" inputmode="numeric" class="w-16 h-16 text-2xl text-center rounded-full border
                                       transition-all duration-300
                                       focus:outline-none" :class="{
                                  'border-gray-300 text-gray-400': digit === '',
                                  'border-green-400 bg-green-100 text-green-700': allFilled
                                }" x-model="otp[index]" @input="handleInput($event, index)" />
                        </template>
                    </div>

                    <!-- Hidden input for full OTP -->
                    <input type="hidden" name="otp" :value="otp.join('')">

                    <!-- RESEND -->
                    <p class="text-center text-sm mb-6">
                        If you don't receive a code
                        <a href="/auth/forgot" class="text-blue-600 font-medium">Resend</a>
                    </p>

                    <!-- VERIFY BUTTON -->
                    <button type="submit" class="w-full py-4 rounded-full font-semibold transition-all duration-300" :class="allFilled
                            ? 'bg-green-300 text-black hover:bg-green-400'
                            : 'bg-gray-200 text-gray-400 cursor-not-allowed'" :disabled="!allFilled">
                        Verify
                    </button>
                </form>

            </div>
        </div>
    </div>

    <script>
        function otpVerification() {
            return {
                otp: ['', '', '', '', '', ''],
                get allFilled() {
                    return this.otp.every(d => d !== '');
                },
                handleInput(e, index) {
                    const value = e.target.value;
                    if (!/^\d*$/.test(value)) {
                        this.otp[index] = '';
                        return;
                    }
                    if (value && index < 5) {
                        const inputs = e.target.parentElement.querySelectorAll('input');
                        inputs[index + 1].focus();
                    }
                }
            }
        }
    </script>
@endsection