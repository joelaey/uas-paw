
<?php $__env->startSection('title','Kelola Users'); ?>

<?php $__env->startSection('content'); ?>
<h1 class="text-2xl font-bold mb-6">Kelola Users</h1>

<div class="bg-white rounded-xl shadow p-6">
<table class="w-full text-sm">
    <thead>
        <tr class="border-b">
            <th>Nama</th>
            <th>Email</th>
            <th>Status</th>
        </tr>
    </thead>
    <tbody>
        <?php for($i=1;$i<=6;$i++): ?>
        <tr class="border-b">
            <td>User <?php echo e($i); ?></td>
            <td>user<?php echo e($i); ?>@mail.com</td>
            <td class="text-green-600">Aktif</td>
        </tr>
        <?php endfor; ?>
    </tbody>
</table>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\Ramadan\Downloads\Projects\pengaduan-masyarakat\resources\views/admin/users.blade.php ENDPATH**/ ?>