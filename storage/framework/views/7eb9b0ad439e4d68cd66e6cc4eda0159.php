

<?php $__env->startSection('content'); ?>
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

        <img src="<?php echo e(asset('images/ilustrasi.png')); ?>"
             class="absolute bottom-10 left-10 w-[420px]" />
    </div>

    <!-- RIGHT -->
    <div class="w-full lg:w-1/2 bg-white rounded-l-[48px] flex items-center justify-center px-6">
        <div class="w-full max-w-md"
             x-data="otpVerification()">

            <!-- Logo -->
            <div class="flex justify-center mb-6">
                <img src="<?php echo e(asset('images/logo.png')); ?>" class="w-24 h-24" />
            </div>

            <h2 class="text-2xl font-bold text-center mb-2">Verification</h2>
            <p class="text-center text-gray-500 mb-6">
                Enter Verification Code
            </p>

            <!-- OTP INPUT -->
            <div class="flex justify-center gap-4 mb-6">
                <template x-for="(digit, index) in otp" :key="index">
                    <input
                        type="text"
                        maxlength="1"
                        inputmode="numeric"
                        class="w-16 h-16 text-2xl text-center rounded-full border
                               transition-all duration-300
                               focus:outline-none"
                        :class="{
                          'border-gray-300 text-gray-400': digit === '',
                          'border-green-400 bg-green-100 text-green-700': allFilled
                        }"
                        x-model="otp[index]"
                        @input="handleInput($event, index)"
                    />
                </template>
            </div>

            <!-- RESEND -->
            <p class="text-center text-sm mb-6">
                If you don’t receive a code
                <a href="#" class="text-blue-600 font-medium">Resend</a>
            </p>

            <!-- VERIFY BUTTON -->
            <button
                class="w-full py-4 rounded-full font-semibold transition-all duration-300"
                :class="allFilled
                    ? 'bg-green-300 text-black hover:bg-green-400'
                    : 'bg-gray-200 text-gray-400 cursor-not-allowed'"
                :disabled="!allFilled">
                Verify
            </button>

        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.auth', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\Ramadan\Downloads\Projects\pengaduan-masyarakat\resources\views/auth/verify.blade.php ENDPATH**/ ?>