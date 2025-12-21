

<?php $__env->startSection('content'); ?>
    <div class="px-8 py-6">

        <!-- HEADER -->
        <div class="flex justify-between items-center mb-8">
            <div>
                <h1 class="text-3xl font-bold">Pengaduan</h1>
                <p id="datetime" class="text-sm text-gray-500"></p>
            </div>

            <!-- SEARCH -->
            <div class="relative w-[420px]">
                <input type="text" placeholder="Search"
                    class="w-full pl-12 pr-4 py-3 rounded-full border border-gray-300 shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-400">
                <svg class="absolute left-4 top-1/2 -translate-y-1/2 text-gray-400" width="20" height="20" fill="none"
                    stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <circle cx="11" cy="11" r="8"></circle>
                    <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                </svg>
            </div>
        </div>

        <!-- Success Message -->
        <?php if(session('success')): ?>
            <div class="mb-6 p-4 bg-green-100 border border-green-400 text-green-700 rounded-lg max-w-4xl">
                <?php echo e(session('success')); ?>

            </div>
        <?php endif; ?>

        <!-- Error Message -->
        <?php if($errors->any()): ?>
            <div class="mb-6 p-4 bg-red-100 border border-red-400 text-red-700 rounded-lg max-w-4xl">
                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <p><?php echo e($error); ?></p>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        <?php endif; ?>

        <!-- CARD FORM -->
        <div class="bg-white rounded-3xl shadow-lg p-10 max-w-4xl">

            <h2 class="text-3xl font-bold mb-2">Buat Pengaduan Anda</h2>
            <p class="text-gray-600 mb-8">
                Sampaikan keluhan anda tentang fasilitas dan pelayanan publik
            </p>

            <!-- FORM -->
            <form action="<?php echo e(route('user.pengaduan.store')); ?>" method="POST" enctype="multipart/form-data"
                class="space-y-6">
                <?php echo csrf_field(); ?>

                <!-- JUDUL -->
                <div>
                    <label class="font-semibold block mb-2">
                        Judul Pengaduan <span class="text-red-500">*</span>
                    </label>
                    <input type="text" name="title" value="<?php echo e(old('title')); ?>"
                        placeholder="Contoh: Lampu Jalan Mati di Kecamatan Cibiru"
                        class="w-full px-5 py-4 rounded-2xl border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-400"
                        required>
                </div>

                <!-- LOKASI -->
                <div>
                    <label class="font-semibold block mb-2">
                        Lokasi Pengaduan <span class="text-red-500">*</span>
                    </label>
                    <input type="text" name="location" value="<?php echo e(old('location')); ?>"
                        placeholder="Contoh: Jl. A. H Nasution Cibiru No.102"
                        class="w-full px-5 py-4 rounded-2xl border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-400"
                        required>
                </div>

                <!-- ISI LAPORAN -->
                <div>
                    <label class="font-semibold block mb-2">
                        Isi Laporan <span class="text-red-500">*</span>
                    </label>
                    <textarea name="content" rows="5" placeholder="Jelaskan kronologi atau detail pengaduan Anda..."
                        class="w-full px-5 py-4 rounded-2xl border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-400 resize-none"
                        required><?php echo e(old('content')); ?></textarea>
                </div>

                <!-- UPLOAD -->
                <div x-data="{ fileName: '' }">
                    <label class="font-semibold block mb-3">
                        Upload Foto (Maks. 5MB)
                    </label>

                    <label
                        class="border-2 border-dashed rounded-2xl p-10 flex flex-col items-center justify-center cursor-pointer hover:bg-gray-50 transition">
                        <input type="file" name="image" accept="image/*" class="hidden"
                            @change="fileName = $event.target.files[0]?.name || ''">
                        <svg width="48" height="48" fill="none" stroke="currentColor" class="text-gray-400 mb-4"
                            stroke-width="2" viewBox="0 0 24 24">
                            <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4" />
                            <polyline points="17 8 12 3 7 8" />
                            <line x1="12" y1="3" x2="12" y2="15" />
                        </svg>

                        <p class="text-gray-500 text-sm text-center" x-show="!fileName">
                            Klik untuk upload foto<br>
                            PNG, JPG hingga 5MB
                        </p>
                        <p class="text-green-600 text-sm text-center" x-show="fileName" x-text="fileName"></p>
                    </label>
                </div>

                <!-- BUTTON -->
                <div class="pt-6">
                    <button type="submit"
                        class="w-full bg-[#8FA6C9] hover:bg-[#7c94b8] transition text-black font-semibold py-4 rounded-full shadow-md">
                        Kirim Pengaduan
                    </button>
                </div>

            </form>
        </div>
    </div>

    <script>
        function updateDateTime() {
            const now = new Date();
            const options = { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric', hour: '2-digit', minute: '2-digit' };
            document.getElementById('datetime').textContent = now.toLocaleDateString('id-ID', options);
        }
        updateDateTime();
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('user.layout', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /Users/muhammadagungjulyansyah/Documents/Kuliah/Semester 5/PAW/project-uas/project-paw/resources/views/user/pengaduan.blade.php ENDPATH**/ ?>