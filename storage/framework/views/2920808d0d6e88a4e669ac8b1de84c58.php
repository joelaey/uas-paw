

<?php $__env->startSection('content'); ?>
    <div x-data="{ openModal: false }" class="space-y-6">

        <!-- Back Button -->
        <a href="<?php echo e(route('admin.pengaduan')); ?>" class="inline-flex items-center text-gray-600 hover:text-gray-900">
            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
            </svg>
            Kembali
        </a>

        <!-- HEADER -->
        <div class="flex items-center justify-between">
            <h1 class="text-2xl font-bold text-gray-800">Detail Pengaduan</h1>
        </div>

        <!-- Success Message -->
        <?php if(session('success')): ?>
            <div class="p-4 bg-green-100 border border-green-400 text-green-700 rounded-lg">
                <?php echo e(session('success')); ?>

            </div>
        <?php endif; ?>

        <!-- DETAIL CARD -->
        <div class="bg-white rounded-xl shadow overflow-hidden">
            <div class="p-6 space-y-6">
                <!-- Status -->
                <div class="flex justify-between items-start">
                    <div>
                        <h2 class="text-xl font-bold"><?php echo e($aspiration->title); ?></h2>
                        <p class="text-gray-500"><?php echo e($aspiration->created_at->format('d F Y, H:i')); ?></p>
                    </div>
                    <div>
                        <?php if($aspiration->status == 'baru'): ?>
                            <span class="px-3 py-1 rounded-full text-sm bg-blue-100 text-blue-700">Baru</span>
                        <?php elseif($aspiration->status == 'diproses'): ?>
                            <span class="px-3 py-1 rounded-full text-sm bg-yellow-100 text-yellow-700">Diproses</span>
                        <?php elseif($aspiration->status == 'selesai'): ?>
                            <span class="px-3 py-1 rounded-full text-sm bg-green-100 text-green-700">Selesai</span>
                        <?php else: ?>
                            <span class="px-3 py-1 rounded-full text-sm bg-red-100 text-red-700">Ditolak</span>
                        <?php endif; ?>
                    </div>
                </div>

                <!-- INFORMASI PELAPOR -->
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <p class="text-gray-500">Nama Pelapor</p>
                        <p class="font-medium"><?php echo e($aspiration->user->name); ?></p>
                    </div>
                    <div>
                        <p class="text-gray-500">Email</p>
                        <p class="font-medium"><?php echo e($aspiration->user->email); ?></p>
                    </div>
                    <div>
                        <p class="text-gray-500">NIK</p>
                        <p class="font-medium"><?php echo e($aspiration->user->nik); ?></p>
                    </div>
                    <div>
                        <p class="text-gray-500">No. HP</p>
                        <p class="font-medium"><?php echo e($aspiration->user->phone); ?></p>
                    </div>
                </div>

                <!-- LOKASI -->
                <div>
                    <p class="text-gray-500">Lokasi</p>
                    <p class="font-medium"><?php echo e($aspiration->location); ?></p>
                </div>

                <!-- ISI -->
                <div>
                    <p class="text-gray-500 mb-1">Isi Pengaduan</p>
                    <div class="p-4 bg-gray-50 rounded-lg leading-relaxed">
                        <?php echo e($aspiration->content); ?>

                    </div>
                </div>

                <!-- Image -->
                <?php if($aspiration->image): ?>
                    <div>
                        <p class="text-gray-500 mb-2">Foto Lampiran</p>
                        <img src="<?php echo e(asset('storage/' . $aspiration->image)); ?>" alt="Lampiran" class="rounded-lg max-w-md">
                    </div>
                <?php endif; ?>

                <!-- Previous Response -->
                <?php if($aspiration->admin_response): ?>
                    <div class="bg-blue-50 rounded-lg p-4">
                        <p class="text-gray-500 mb-1">Respon Sebelumnya</p>
                        <p class="text-gray-700"><?php echo e($aspiration->admin_response); ?></p>
                        <?php if($aspiration->responder): ?>
                            <p class="text-sm text-gray-500 mt-2">
                                Oleh <?php echo e($aspiration->responder->name); ?> - <?php echo e($aspiration->responded_at->format('d M Y, H:i')); ?>

                            </p>
                        <?php endif; ?>
                    </div>
                <?php endif; ?>
            </div>

            <!-- RESPONSE FORM -->
            <div class="px-6 py-4 border-t bg-gray-50">
                <h3 class="font-semibold mb-4">Kirim Respon</h3>
                <form method="POST" action="<?php echo e(route('admin.pengaduan.respond', $aspiration->id)); ?>">
                    <?php echo csrf_field(); ?>

                    <div class="mb-4">
                        <label class="block text-sm text-gray-600 mb-2">Respon Admin</label>
                        <textarea name="admin_response" rows="4"
                            class="w-full px-4 py-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400"
                            placeholder="Tulis respon untuk pengaduan ini..."
                            required><?php echo e(old('admin_response')); ?></textarea>
                    </div>

                    <div class="mb-4">
                        <label class="block text-sm text-gray-600 mb-2">Ubah Status</label>
                        <select name="status"
                            class="w-full px-4 py-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400"
                            required>
                            <option value="diproses" <?php echo e($aspiration->status == 'diproses' ? 'selected' : ''); ?>>Diproses
                            </option>
                            <option value="selesai" <?php echo e($aspiration->status == 'selesai' ? 'selected' : ''); ?>>Selesai</option>
                            <option value="ditolak" <?php echo e($aspiration->status == 'ditolak' ? 'selected' : ''); ?>>Ditolak</option>
                        </select>
                    </div>

                    <div class="flex gap-3">
                        <button type="submit"
                            class="px-6 py-2 rounded-lg bg-blue-600 text-white hover:bg-blue-700 transition">
                            Kirim Respon
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layout', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /Users/muhammadagungjulyansyah/Documents/Kuliah/Semester 5/PAW/project-uas/project-paw/resources/views/admin/pengaduan-show.blade.php ENDPATH**/ ?>