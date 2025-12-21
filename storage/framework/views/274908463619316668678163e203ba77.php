
<?php $__env->startSection('title', 'Kelola Users'); ?>

<?php $__env->startSection('content'); ?>
    <h1 class="text-2xl font-bold mb-6">Kelola Users</h1>

    <!-- Search -->
    <div class="bg-white rounded-xl shadow p-4 mb-6">
        <form method="GET" class="flex gap-4">
            <input type="text" name="search" value="<?php echo e(request('search')); ?>" placeholder="Cari nama, email, atau NIK..."
                class="flex-1 px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400">
            <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700">
                Cari
            </button>
        </form>
    </div>

    <div class="bg-white rounded-xl shadow p-6">
        <table class="w-full text-sm">
            <thead class="bg-gray-100">
                <tr>
                    <th class="p-3 text-left">Nama</th>
                    <th class="p-3 text-left">NIK</th>
                    <th class="p-3 text-left">Email</th>
                    <th class="p-3 text-left">No. HP</th>
                    <th class="p-3">Total Pengaduan</th>
                </tr>
            </thead>
            <tbody>
                <?php $__empty_1 = true; $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <tr class="border-t">
                        <td class="p-3 flex items-center gap-3">
                            <img src="<?php echo e($user->avatar ? asset('storage/' . $user->avatar) : 'https://i.pravatar.cc/40?u=' . $user->id); ?>"
                                class="w-8 h-8 rounded-full">
                            <?php echo e($user->name); ?>

                        </td>
                        <td class="p-3"><?php echo e($user->nik); ?></td>
                        <td class="p-3"><?php echo e($user->email); ?></td>
                        <td class="p-3"><?php echo e($user->phone); ?></td>
                        <td class="p-3 text-center">
                            <span class="px-2 py-1 bg-blue-100 text-blue-700 rounded-full text-xs">
                                <?php echo e($user->aspirations_count ?? $user->aspirations->count()); ?>

                            </span>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <tr>
                        <td colspan="5" class="p-6 text-center text-gray-500">Tidak ada user ditemukan.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>

        <!-- Pagination -->
        <?php if($users->hasPages()): ?>
            <div class="mt-6">
                <?php echo e($users->withQueryString()->links()); ?>

            </div>
        <?php endif; ?>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layout', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /Users/muhammadagungjulyansyah/Documents/Kuliah/Semester 5/PAW/project-uas/project-paw/resources/views/admin/users.blade.php ENDPATH**/ ?>