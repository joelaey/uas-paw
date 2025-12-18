

<?php $__env->startSection('title', 'Profile'); ?>

<?php $__env->startSection('content'); ?>

<!-- HEADER -->
<div class="flex items-center justify-between mb-8">
    <div>
        <h1 class="text-3xl font-bold">Profile</h1>
        <p id="datetime" class="text-sm text-gray-500"></p>
    </div>

    <div class="flex items-center gap-4">
        <div class="relative">
            <input type="text" placeholder="Search"
                   class="pl-12 pr-6 py-3 rounded-full border shadow-sm w-[320px]">
            <svg class="w-5 h-5 absolute left-4 top-3.5 text-gray-400"
                 fill="none" stroke="currentColor" stroke-width="2"
                 viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round"
                      d="M21 21l-4.35-4.35M16 11a5 5 0 11-10 0 5 5 0 0110 0z"/>
            </svg>
        </div>

        <svg class="w-6 h-6 text-gray-600" fill="none" stroke="currentColor" stroke-width="2"
             viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round"
                  d="M15 17h5l-1.4-1.4A2 2 0 0118 14.2V11a6 6 0 10-12 0v3.2c0 .5-.2 1-.6 1.4L4 17h5"/>
        </svg>

        <img src="<?php echo e(asset('images/avatar.png')); ?>" class="w-10 h-10 rounded-full">
    </div>
</div>

<!-- CARD -->
<div class="bg-white rounded-[32px] p-10 shadow max-w-5xl mx-auto">

    <!-- AVATAR -->
    <div class="flex flex-col items-center mb-10">
        <div class="relative">
            <img src="<?php echo e(asset('images/avatar.png')); ?>"
                 class="w-32 h-32 rounded-full object-cover">

            <button class="absolute bottom-0 right-0 bg-green-500 p-3 rounded-full">
                <!-- CAMERA ICON -->
                <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" stroke-width="2"
                     viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round"
                          d="M3 7h4l2-3h6l2 3h4v12H3z"/>
                    <circle cx="12" cy="13" r="3"/>
                </svg>
            </button>
        </div>

        <p class="text-gray-400 mt-4">Klik ikon kamera untuk mengubah foto</p>
    </div>

    <!-- FORM -->
    <div class="grid grid-cols-2 gap-6">
        <div>
            <label class="font-semibold">Nama Lengkap</label>
            <input type="text" value="Jamal Khumar Ehe"
                   class="w-full mt-2 px-5 py-4 rounded-full border shadow-sm">
        </div>

        <div>
            <label class="font-semibold">NIK</label>
            <input type="text" value="1246714252467"
                   class="w-full mt-2 px-5 py-4 rounded-full border shadow-sm">
        </div>

        <div>
            <label class="font-semibold">Nomor HP</label>
            <input type="text" value="089756237943"
                   class="w-full mt-2 px-5 py-4 rounded-full border shadow-sm">
        </div>

        <div>
            <label class="font-semibold">Email</label>
            <input type="email" value="JamalK8@gmail.com"
                   class="w-full mt-2 px-5 py-4 rounded-full border shadow-sm">
        </div>

        <div class="col-span-2">
            <label class="font-semibold">Password Saat Ini</label>
            <div class="relative mt-2">
                <input type="password" value="password"
                       class="w-full px-5 py-4 rounded-full border shadow-sm pr-12">
                <!-- EYE ICON -->
                <svg class="w-6 h-6 absolute right-5 top-4 text-gray-400 cursor-pointer"
                     fill="none" stroke="currentColor" stroke-width="2"
                     viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round"
                          d="M13.875 18.825A10.05 10.05 0 0112 19c-5 0-9.27-3.11-11-7
                          1.08-2.44 2.99-4.42 5.38-5.54M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                </svg>
            </div>
        </div>
    </div>

    <!-- BUTTON -->
    <div class="flex gap-6 mt-10">
        <button class="flex-1 py-4 rounded-full bg-[#F68C87] text-white font-semibold shadow hover:scale-[1.02] transition">
            Simpan Perubahan
        </button>
        <button class="w-40 py-4 rounded-full bg-[#F6B26B] text-white font-semibold shadow hover:scale-[1.02] transition">
            Batal
        </button>
    </div>

</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('user.layout', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\Ramadan\Downloads\Projects\pengaduan-masyarakat\resources\views/user/profile.blade.php ENDPATH**/ ?>