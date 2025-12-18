

<?php $__env->startSection('content'); ?>
<h1 class="text-2xl font-bold mb-6">Profile Admin</h1>

<div class="bg-white rounded-xl shadow p-6 max-w-xl">
    <div class="mb-4">
        <label class="text-sm">Nama</label>
        <input class="w-full border p-3 rounded-lg" value="Admin Utama">
    </div>

    <div class="mb-4">
        <label class="text-sm">Email</label>
        <input class="w-full border p-3 rounded-lg" value="admin@mail.com">
    </div>

    <button class="bg-green-600 text-white px-4 py-2 rounded-lg">
        Simpan Perubahan
    </button>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\Ramadan\Downloads\Projects\pengaduan-masyarakat\resources\views/admin/profile.blade.php ENDPATH**/ ?>