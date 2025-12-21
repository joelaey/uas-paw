

<?php $__env->startSection('content'); ?>

    <!-- HEADER -->
    <div class="flex justify-between items-center mb-8">
        <div>
            <h1 class="text-3xl font-bold">Dashboard</h1>
            <p id="datetime" class="text-sm text-gray-500"></p>
        </div>

        <div class="flex items-center gap-4">
            <input type="text" placeholder="Search" class="px-6 py-3 rounded-full border shadow-sm w-80">
            🔔
            <img src="<?php echo e($user->avatar ? asset('storage/' . $user->avatar) : 'https://i.pravatar.cc/40?u=' . $user->id); ?>"
                class="rounded-full w-10 h-10">
        </div>
    </div>

    <!-- Success Message -->
    <?php if(session('success')): ?>
        <div class="mb-6 p-4 bg-green-100 border border-green-400 text-green-700 rounded-lg">
            <?php echo e(session('success')); ?>

        </div>
    <?php endif; ?>

    <!-- WELCOME CARD -->
    <div
        class="bg-gradient-to-r from-[#CBD8EE] to-[#E9EFF9] rounded-3xl p-8 flex justify-between items-center mb-10 shadow">
        <div>
            <h2 class="text-3xl font-bold mb-2">Selamat Datang, <?php echo e($user->name); ?>!</h2>
            <p class="text-gray-700 mb-6">Pantau status pengajuan anda</p>
            <a href="<?php echo e(route('user.riwayat')); ?>"
                class="px-8 py-3 bg-white rounded-full shadow hover:scale-105 transition inline-block">
                Lihat Laporan Pengaduan
            </a>
        </div>

        <img src="<?php echo e(asset('images/megaphone.png')); ?>" class="w-40">
    </div>

    <!-- STAT CARDS -->
    <div class="grid grid-cols-4 gap-6 mb-10">
        <div class="stat-card bg-[#9EB1D4]"><?php echo e($totalAspirations); ?><br><span>Total Pengaduan</span></div>
        <div class="stat-card bg-[#F99A91]"><?php echo e($waitingAspirations); ?><br><span>Menunggu</span></div>
        <div class="stat-card bg-[#B4E1CD]"><?php echo e($processingAspirations); ?><br><span>Diproses</span></div>
        <div class="stat-card bg-[#F7B87A]"><?php echo e($completedAspirations); ?><br><span>Selesai</span></div>
    </div>

    <!-- TABLE -->
    <div class="bg-white rounded-3xl shadow p-6">
        <div class="flex-1">
            <div class="bg-[#F99A91] rounded-xl p-4 font-bold flex justify-between mb-4">
                <span class="w-1/2">Pengajuan</span>
                <span class="w-1/4 text-center">Tanggal</span>
                <span class="w-1/4 text-center">Status</span>
            </div>

            <?php $__empty_1 = true; $__currentLoopData = $recentAspirations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $aspiration): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <div class="flex justify-between items-center py-3 border-b">
                    <span class="w-1/2"><?php echo e($aspiration->title); ?></span>
                    <span class="w-1/4 text-center text-gray-600"><?php echo e($aspiration->created_at->format('d M Y, H:i')); ?></span>
                    <span class="w-1/4 text-center">
                        <?php if($aspiration->status == 'baru'): ?>
                            <span class="px-3 py-1 bg-blue-100 text-blue-700 rounded-full text-sm">Baru</span>
                        <?php elseif($aspiration->status == 'diproses'): ?>
                            <span class="px-3 py-1 bg-yellow-100 text-yellow-700 rounded-full text-sm">Diproses</span>
                        <?php elseif($aspiration->status == 'selesai'): ?>
                            <span class="px-3 py-1 bg-green-100 text-green-700 rounded-full text-sm">Selesai</span>
                        <?php else: ?>
                            <span class="px-3 py-1 bg-red-100 text-red-700 rounded-full text-sm">Ditolak</span>
                        <?php endif; ?>
                    </span>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <div class="text-center py-8 text-gray-500">
                    Belum ada pengaduan. <a href="<?php echo e(route('user.pengaduan')); ?>" class="text-blue-600">Buat pengaduan pertama
                        Anda</a>
                </div>
            <?php endif; ?>
        </div>
    </div>

    <script>
        // Update datetime
        function updateDateTime() {
            const now = new Date();
            const options = { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric', hour: '2-digit', minute: '2-digit' };
            document.getElementById('datetime').textContent = now.toLocaleDateString('id-ID', options);
        }
        updateDateTime();
        setInterval(updateDateTime, 60000);
    </script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('user.layout', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /Users/muhammadagungjulyansyah/Documents/Kuliah/Semester 5/PAW/project-uas/project-paw/resources/views/user/dashboard.blade.php ENDPATH**/ ?>