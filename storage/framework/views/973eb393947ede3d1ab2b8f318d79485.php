

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
            <img src="<?php echo e(asset('images/ilustrasi.png')); ?>" alt="Ilustrasi"
                class="absolute bottom-16 left-16 w-[420px] h-auto">
        </div>


        <!-- RIGHT -->
        <div class="w-full lg:w-1/2 bg-white rounded-l-[48px] flex items-center justify-center px-6">
            <div class="w-full max-w-md" x-data="{ showResult: false, email: '' }">

                <!-- Logo -->
                <div class="flex justify-center mb-6">
                    <img src="<?php echo e(asset('images/logo.png')); ?>" class="w-24" alt="Logo">
                </div>

                <h2 class="text-3xl font-bold text-center mb-6">Lupa Password</h2>

                <!-- Form Input Email -->
                <div x-show="!showResult" class="space-y-4">
                    <p class="text-gray-600 text-center mb-4">
                        Masukkan email yang terdaftar untuk melihat informasi reset password.
                    </p>

                    <div>
                        <label class="text-sm">Email</label>
                        <input type="email" x-model="email" placeholder="Masukkan email Anda"
                            class="w-full rounded-full border px-6 py-4 focus:outline-none focus:ring" required>
                    </div>

                    <button type="button" @click="if(email) showResult = true"
                        class="w-full bg-[#F28B82] text-black py-4 rounded-full font-semibold shadow hover:bg-[#e07a72] transition">
                        Lanjutkan
                    </button>

                    <a href="/auth/login" class="block text-center text-sm text-blue-600 mt-4">
                        Kembali ke Login
                    </a>
                </div>

                <!-- Result: Show Admin Email -->
                <div x-show="showResult" x-cloak class="space-y-6">
                    <div class="bg-blue-50 border border-blue-200 rounded-2xl p-6 text-center">
                        <div class="flex justify-center mb-4">
                            <svg class="w-16 h-16 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                            </svg>
                        </div>
                        <h3 class="text-xl font-bold text-gray-800 mb-2">Hubungi Admin</h3>
                        <p class="text-gray-600 mb-4">
                            Untuk mereset password, silakan kirim email ke alamat admin berikut:
                        </p>
                        <div class="bg-white rounded-xl p-4 border-2 border-dashed border-blue-300">
                            <p class="text-lg font-bold text-blue-700">admin@mail.com</p>
                        </div>
                    </div>

                    <div class="bg-yellow-50 border border-yellow-200 rounded-xl p-4">
                        <h4 class="font-semibold text-yellow-800 mb-2">📝 Format Email:</h4>
                        <ul class="text-sm text-yellow-700 space-y-1">
                            <li>• <strong>Subject:</strong> Reset Password - [Nama Anda]</li>
                            <li>• <strong>Isi:</strong> Email terdaftar: <span x-text="email"
                                    class="font-mono bg-yellow-100 px-1 rounded"></span></li>
                            <li>• Sertakan alasan permintaan reset</li>
                        </ul>
                    </div>

                    <p class="text-center text-gray-500 text-sm">
                        Admin akan memproses permintaan Anda dalam 1x24 jam.
                    </p>

                    <div class="flex gap-3">
                        <button type="button" @click="showResult = false; email = ''"
                            class="flex-1 bg-gray-200 text-gray-700 py-3 rounded-full font-semibold hover:bg-gray-300 transition">
                            Kembali
                        </button>
                        <a href="/auth/login" class="flex-1">
                            <button type="button"
                                class="w-full bg-[#8FA6C9] text-black py-3 rounded-full font-semibold shadow hover:opacity-90 transition">
                                Login
                            </button>
                        </a>
                    </div>
                </div>

            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.auth', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /Users/muhammadagungjulyansyah/Documents/Kuliah/Semester 5/PAW/project-uas/project-paw/resources/views/auth/forgot.blade.php ENDPATH**/ ?>