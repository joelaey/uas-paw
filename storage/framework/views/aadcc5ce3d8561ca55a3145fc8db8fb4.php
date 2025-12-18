

<?php $__env->startSection('content'); ?>
<div class="flex min-h-screen">

    <!-- LEFT -->
<div class="hidden lg:flex w-1/2 bg-[#8FA6C9] relative px-16 pt-16 pb-24 text-white min-h-screen">
    <div class="z-10">
        <h1 class="text-4xl font-bold leading-snug">
            Urgent Community Grievance:<br>
            For Better Infrastructure & Enforcement
        </h1>
        <p class="mt-4 text-lg italic">Pengaduan Masyarakat</p>
    </div>

    <!-- Illustration -->
    <img
        src="<?php echo e(asset('images/ilustrasi.png')); ?>"
        alt="Ilustrasi"
        class="absolute bottom-16 left-16 w-[420px] h-auto"
    >
</div>


    <!-- RIGHT -->
    <div class="w-full lg:w-1/2 bg-white rounded-l-[48px] flex items-center justify-center px-6">
        <div class="w-full max-w-md">

            <!-- Logo -->
            <div class="flex justify-center mb-6">
                <img src="<?php echo e(asset('images/logo.png')); ?>" class="w-24" alt="Logo">
            </div>

            <h2 class="text-3xl font-bold text-center mb-6">Forgot Password</h2>

            <div class="space-y-4">
                <div>
                    <label class="text-sm">Email</label>
                    <input type="email"
                        placeholder="Masukkan email"
                        class="w-full rounded-full border px-6 py-4 focus:outline-none focus:ring">
                </div>

                <a href="/auth/login" class="block text-center text-sm text-blue-600">
                    Back to Login
                </a>

                <button
                    class="w-full bg-[#F28B82] text-black py-4 rounded-full font-semibold shadow">
                    Send
                </button>

                <div class="text-center text-sm">or</div>

                <a href="/auth/register">
                    <button
                        class="w-full bg-[#8FA6C9] text-black py-4 rounded-full font-semibold shadow">
                        Daftar
                    </button>
                </a>
            </div>

        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.auth', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\Ramadan\Downloads\Projects\pengaduan-masyarakat\resources\views/auth/forgot.blade.php ENDPATH**/ ?>