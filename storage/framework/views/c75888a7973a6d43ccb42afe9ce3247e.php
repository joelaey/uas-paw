

<?php $__env->startSection('content'); ?>
    <h1 class="text-2xl font-bold mb-6">Profile Admin</h1>

    <!-- Success Message -->
    <?php if(session('success')): ?>
        <div class="mb-6 p-4 bg-green-100 border border-green-400 text-green-700 rounded-lg max-w-xl">
            <?php echo e(session('success')); ?>

        </div>
    <?php endif; ?>

    <!-- Error Message -->
    <?php if($errors->any()): ?>
        <div class="mb-6 p-4 bg-red-100 border border-red-400 text-red-700 rounded-lg max-w-xl">
            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <p><?php echo e($error); ?></p>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    <?php endif; ?>

    <form method="POST" action="<?php echo e(route('admin.profile.update')); ?>" class="bg-white rounded-xl shadow p-6 max-w-xl">
        <?php echo csrf_field(); ?>
        <?php echo method_field('PUT'); ?>

        <div class="mb-4">
            <label class="text-sm font-medium">Nama</label>
            <input type="text" name="name" value="<?php echo e(old('name', $user->name)); ?>" class="w-full border p-3 rounded-lg mt-1"
                required>
        </div>

        <div class="mb-4">
            <label class="text-sm font-medium">Email</label>
            <input type="email" name="email" value="<?php echo e(old('email', $user->email)); ?>"
                class="w-full border p-3 rounded-lg mt-1" required>
        </div>

        <hr class="my-6">

        <h3 class="font-semibold mb-4">Ubah Password (Opsional)</h3>

        <div class="mb-4">
            <label class="text-sm font-medium">Password Saat Ini</label>
            <input type="password" name="current_password" class="w-full border p-3 rounded-lg mt-1">
        </div>

        <div class="mb-4">
            <label class="text-sm font-medium">Password Baru</label>
            <input type="password" name="new_password" class="w-full border p-3 rounded-lg mt-1"
                placeholder="Minimal 7 karakter">
        </div>

        <div class="mb-6">
            <label class="text-sm font-medium">Konfirmasi Password Baru</label>
            <input type="password" name="new_password_confirmation" class="w-full border p-3 rounded-lg mt-1">
        </div>

        <button type="submit" class="bg-green-600 text-white px-6 py-2 rounded-lg hover:bg-green-700">
            Simpan Perubahan
        </button>
    </form>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layout', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /Users/muhammadagungjulyansyah/Documents/Kuliah/Semester 5/PAW/project-uas/project-paw/resources/views/admin/profile.blade.php ENDPATH**/ ?>