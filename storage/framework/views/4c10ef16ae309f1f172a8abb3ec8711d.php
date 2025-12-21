

<?php $__env->startSection('content'); ?>
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
                <img src="<?php echo e(asset('images/ilustrasi.png')); ?>" alt="Ilustrasi" class="w-[420px] max-w-full" />
            </div>
        </div>


        <!-- RIGHT -->
        <div class="w-full lg:w-1/2 bg-white rounded-l-[48px] flex items-center justify-center px-6 pb-16">
            <div class="w-full max-w-md" x-data="{ showPassword: false, showConfirm: false }">

                <!-- Back -->
                <a href="/auth/login" class="inline-flex items-center mb-6 text-gray-600">
                </a>

                <!-- Logo -->
                <div class="flex justify-center mb-6">
                    <img src="<?php echo e(asset('images/logo.png')); ?>" alt="Logo" class="w-20 h-20 rounded-full" />
                </div>

                <!-- Title -->
                <h2 class="text-2xl font-bold mb-6 text-center">Daftar Akun Baru</h2>

                <!-- Error Message -->
                <?php if($errors->any()): ?>
                    <div class="mb-4 p-4 bg-red-100 border border-red-400 text-red-700 rounded-lg">
                        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <p><?php echo e($error); ?></p>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                <?php endif; ?>

                <form method="POST" action="<?php echo e(route('register')); ?>" class="space-y-4">
                    <?php echo csrf_field(); ?>

                    <!-- Nama -->
                    <div>
                        <label class="text-sm font-medium">Nama Lengkap <span class="text-red-500">*</span></label>
                        <input type="text" name="name" value="<?php echo e(old('name')); ?>" placeholder="Masukkan nama lengkap"
                            class="input-ui" required>
                    </div>

                    <!-- NIK -->
                    <div>
                        <label class="text-sm font-medium">NIK <span class="text-red-500">*</span></label>
                        <input type="text" name="nik" value="<?php echo e(old('nik')); ?>" placeholder="Masukkan 16 digit NIK"
                            class="input-ui" maxlength="16" required>
                    </div>

                    <!-- HP -->
                    <div>
                        <label class="text-sm font-medium">Nomor HP <span class="text-red-500">*</span></label>
                        <input type="text" name="phone" value="<?php echo e(old('phone')); ?>" placeholder="08xxxxxxxxxx"
                            class="input-ui" required>
                    </div>

                    <!-- Email -->
                    <div>
                        <label class="text-sm font-medium">Email <span class="text-red-500">*</span></label>
                        <input type="email" name="email" value="<?php echo e(old('email')); ?>" placeholder="example@gmail.com"
                            class="input-ui" required>
                    </div>

                    <!-- Password -->
                    <div>
                        <label class="text-sm font-medium">Password <span class="text-red-500">*</span></label>
                        <div class="relative">
                            <input :type="showPassword ? 'text' : 'password'" name="password"
                                placeholder="Minimal 7 Karakter" class="input-ui pr-12" required>
                            <button type="button" @click="showPassword = !showPassword"
                                class="absolute right-4 top-3 text-gray-400 hover:text-gray-600">
                                <!-- eye open -->
                                <svg x-show="!showPassword" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5
                        c4.478 0 8.268 2.943 9.542 7
                        -1.274 4.057-5.064 7-9.542 7
                        -4.477 0-8.268-2.943-9.542-7z" />
                                </svg>

                                <!-- eye off -->
                                <svg x-show="showPassword" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
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
                    </div>

                    <!-- Konfirmasi -->
                    <div>
                        <label class="text-sm font-medium">Konfirmasi Password <span class="text-red-500">*</span></label>
                        <div class="relative">
                            <input :type="showConfirm ? 'text' : 'password'" name="password_confirmation"
                                placeholder="Ketik ulang password" class="input-ui pr-12" required>
                            <button type="button" @click="showConfirm = !showConfirm"
                                class="absolute right-4 top-3 text-gray-400 hover:text-gray-600">
                                <!-- eye open -->
                                <svg x-show="!showConfirm" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5
                        c4.478 0 8.268 2.943 9.542 7
                        -1.274 4.057-5.064 7-9.542 7
                        -4.477 0-8.268-2.943-9.542-7z" />
                                </svg>

                                <!-- eye off -->
                                <svg x-show="showConfirm" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
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
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.auth', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /Users/muhammadagungjulyansyah/Documents/Kuliah/Semester 5/PAW/project-uas/project-paw/resources/views/auth/register.blade.php ENDPATH**/ ?>