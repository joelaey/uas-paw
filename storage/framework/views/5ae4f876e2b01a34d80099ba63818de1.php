

<?php $__env->startSection('content'); ?>
<div class="p-8">

    <!-- Header -->
    <h1 class="text-3xl font-bold mb-6">Riwayat Pengaduan</h1>

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

            <!-- Item -->
            <div class="grid grid-cols-12 gap-4 items-center">
                <div class="col-span-6 font-medium">
                    Jalan Rusak di Kelurahan Cimencang
                </div>
                <div class="col-span-3 text-gray-600">
                    9 Desember 2025, 10.00
                </div>
                <div class="col-span-3 flex gap-2">
                    <span class="status-baru">Baru</span>
                </div>
            </div>

            <div class="grid grid-cols-12 gap-4 items-center">
                <div class="col-span-6 font-medium">
                    Lampu Jalan Mati di Kecamatan Cibiru
                </div>
                <div class="col-span-3 text-gray-600">
                    30 November 2025, 20.00
                </div>
                <div class="col-span-3 flex gap-2">
                    <span class="status-diproses">Diproses</span>
                </div>
            </div>

            <div class="grid grid-cols-12 gap-4 items-center">
                <div class="col-span-6 font-medium">
                    Pembuangan Sampah Sembarangan ke Sungai
                </div>
                <div class="col-span-3 text-gray-600">
                    27 November 2025, 18.00
                </div>
                <div class="col-span-3 flex gap-2">
                    <span class="status-selesai">Selesai</span>
                </div>
            </div>

        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('user.layout', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\Ramadan\Downloads\Projects\pengaduan-masyarakat\resources\views/user/riwayat.blade.php ENDPATH**/ ?>