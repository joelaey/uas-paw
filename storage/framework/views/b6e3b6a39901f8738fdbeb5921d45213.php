

<?php $__env->startSection('content'); ?>
    <div class="p-8">

        <!-- Header -->
        <h1 class="text-3xl font-bold mb-6">Riwayat Pengaduan</h1>

        <!-- Success Message -->
        <?php if(session('success')): ?>
            <div class="mb-6 p-4 bg-green-100 border border-green-400 text-green-700 rounded-lg">
                <?php echo e(session('success')); ?>

            </div>
        <?php endif; ?>

        <!-- Table Container -->
        <div class="bg-white rounded-3xl shadow-lg p-6">

            <!-- Table Head -->
            <div class="grid grid-cols-12 gap-4 mb-6">
                <div class="col-span-6">
                    <div class="bg-[#8FA6C9] text-white font-semibold rounded-full py-3 text-center">
                        Riwayat Pengaduan
                    </div>
                </div>
                <div class="col-span-3">
                    <div class="bg-[#F79A8B] text-white font-semibold rounded-full py-3 text-center">
                        Tanggal
                    </div>
                </div>
                <div class="col-span-3">
                    <div class="bg-[#F9B572] text-white font-semibold rounded-full py-3 text-center">
                        Status
                    </div>
                </div>
            </div>

            <!-- ROW -->
            <div class="space-y-5">
                <?php $__empty_1 = true; $__currentLoopData = $aspirations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $aspiration): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <!-- Item -->
                    <a href="<?php echo e(route('user.riwayat.show', $aspiration->id)); ?>"
                        class="grid grid-cols-12 gap-4 items-center hover:bg-gray-50 rounded-lg p-2 transition">
                        <div class="col-span-6 font-medium">
                            <?php echo e($aspiration->title); ?>

                        </div>
                        <div class="col-span-3 text-gray-600">
                            <?php echo e($aspiration->created_at->format('d F Y, H:i')); ?>

                        </div>
                        <div class="col-span-3 flex gap-2">
                            <?php if($aspiration->status == 'baru'): ?>
                                <span class="status-baru">Baru</span>
                            <?php elseif($aspiration->status == 'diproses'): ?>
                                <span class="status-diproses">Diproses</span>
                            <?php elseif($aspiration->status == 'selesai'): ?>
                                <span class="status-selesai">Selesai</span>
                            <?php else: ?>
                                <span class="px-4 py-1 bg-red-100 text-red-700 rounded-full text-sm">Ditolak</span>
                            <?php endif; ?>
                        </div>
                    </a>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <div class="text-center py-8 text-gray-500">
                        Belum ada riwayat pengaduan. <a href="<?php echo e(route('user.pengaduan')); ?>" class="text-blue-600">Buat
                            pengaduan pertama Anda</a>
                    </div>
                <?php endif; ?>
            </div>

            <!-- Pagination -->
            <?php if($aspirations->hasPages()): ?>
                <div class="mt-6">
                    <?php echo e($aspirations->links()); ?>

                </div>
            <?php endif; ?>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('user.layout', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /Users/muhammadagungjulyansyah/Documents/Kuliah/Semester 5/PAW/project-uas/project-paw/resources/views/user/riwayat.blade.php ENDPATH**/ ?>