

<?php $__env->startSection('content'); ?>
    <h1 class="text-2xl font-bold mb-6">Dashboard Admin</h1>

    <!-- Success Message -->
    <?php if(session('success')): ?>
        <div class="mb-6 p-4 bg-green-100 border border-green-400 text-green-700 rounded-lg">
            <?php echo e(session('success')); ?>

        </div>
    <?php endif; ?>

    <div class="grid grid-cols-4 gap-6 mb-8">
        <div class="bg-white p-6 rounded-xl shadow">
            <p class="text-sm text-gray-500">Total Pengaduan</p>
            <p class="text-3xl font-bold"><?php echo e($totalAspirations); ?></p>
        </div>
        <div class="bg-white p-6 rounded-xl shadow">
            <p class="text-sm text-gray-500">Baru</p>
            <p class="text-3xl font-bold text-blue-500"><?php echo e($newAspirations); ?></p>
        </div>
        <div class="bg-white p-6 rounded-xl shadow">
            <p class="text-sm text-gray-500">Diproses</p>
            <p class="text-3xl font-bold text-yellow-500"><?php echo e($processingAspirations); ?></p>
        </div>
        <div class="bg-white p-6 rounded-xl shadow">
            <p class="text-sm text-gray-500">Selesai</p>
            <p class="text-3xl font-bold text-green-600"><?php echo e($completedAspirations); ?></p>
        </div>
    </div>

    <div class="bg-white rounded-xl shadow p-6">
        <h2 class="font-semibold mb-4">Pengaduan Terbaru</h2>

        <table class="w-full text-sm">
            <thead class="bg-gray-100">
                <tr>
                    <th class="p-3 text-left">Judul</th>
                    <th class="p-3 text-left">Pelapor</th>
                    <th class="p-3 text-left">Tanggal</th>
                    <th class="p-3">Status</th>
                    <th class="p-3">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $__empty_1 = true; $__currentLoopData = $recentAspirations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $aspiration): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <tr class="border-t">
                        <td class="p-3"><?php echo e($aspiration->title); ?></td>
                        <td class="p-3"><?php echo e($aspiration->user->name); ?></td>
                        <td class="p-3"><?php echo e($aspiration->created_at->format('d M Y')); ?></td>
                        <td class="p-3 text-center">
                            <?php if($aspiration->status == 'baru'): ?>
                                <span class="px-2 py-1 bg-blue-100 text-blue-700 rounded-full text-xs">Baru</span>
                            <?php elseif($aspiration->status == 'diproses'): ?>
                                <span class="px-2 py-1 bg-yellow-100 text-yellow-700 rounded-full text-xs">Diproses</span>
                            <?php elseif($aspiration->status == 'selesai'): ?>
                                <span class="px-2 py-1 bg-green-100 text-green-700 rounded-full text-xs">Selesai</span>
                            <?php else: ?>
                                <span class="px-2 py-1 bg-red-100 text-red-700 rounded-full text-xs">Ditolak</span>
                            <?php endif; ?>
                        </td>
                        <td class="p-3 text-center">
                            <a href="<?php echo e(route('admin.pengaduan.show', $aspiration->id)); ?>"
                                class="text-blue-600 hover:underline">Detail</a>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <tr>
                        <td colspan="5" class="p-6 text-center text-gray-500">Belum ada pengaduan.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layout', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /Users/muhammadagungjulyansyah/Documents/Kuliah/Semester 5/PAW/project-uas/project-paw/resources/views/admin/dashboard.blade.php ENDPATH**/ ?>