

<?php $__env->startSection('content'); ?>
<div x-data="{ openModal: false }" class="space-y-6">

    <!-- HEADER -->
    <div class="flex items-center justify-between">
        <h1 class="text-2xl font-bold text-gray-800">Detail Pengaduan</h1>

        <button
            @click="openModal = true"
            class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition">
            Lihat Detail
        </button>
    </div>

    <!-- TABEL RINGKAS -->
    <div class="bg-white rounded-xl shadow overflow-hidden">
        <table class="w-full text-sm">
            <thead class="bg-gray-100 text-gray-600">
                <tr>
                    <th class="px-6 py-4 text-left">Pelapor</th>
                    <th class="px-6 py-4 text-left">Judul</th>
                    <th class="px-6 py-4 text-left">Tanggal</th>
                    <th class="px-6 py-4 text-left">Status</th>
                    <th class="px-6 py-4 text-center">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y">
                <tr>
                    <td class="px-6 py-4">Budi Santoso</td>
                    <td class="px-6 py-4">Jalan Rusak</td>
                    <td class="px-6 py-4">12 Jun 2025</td>
                    <td class="px-6 py-4">
                        <span class="px-3 py-1 rounded-full text-xs bg-yellow-100 text-yellow-700">
                            Diproses
                        </span>
                    </td>
                    <td class="px-6 py-4 text-center">
                        <button
                            @click="openModal = true"
                            class="text-blue-600 hover:underline">
                            Detail
                        </button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

    <!-- MODAL DETAIL -->
    <div
        x-show="openModal"
        x-transition
        class="fixed inset-0 z-50 flex items-center justify-center bg-black/50"
        style="display: none;"
    >
        <div
            @click.away="openModal = false"
            class="bg-white w-full max-w-3xl rounded-2xl shadow-lg overflow-hidden"
        >

            <!-- MODAL HEADER -->
            <div class="flex items-center justify-between px-6 py-4 border-b">
                <h2 class="text-lg font-semibold text-gray-800">
                    Detail Pengaduan
                </h2>
                <button @click="openModal = false">
                    <!-- CLOSE ICON -->
                    <svg class="w-6 h-6 text-gray-500 hover:text-gray-700"
                        fill="none" stroke="currentColor" stroke-width="2"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </button>
            </div>

            <!-- MODAL BODY -->
            <div class="p-6 space-y-6 text-sm">

                <!-- INFORMASI PELAPOR -->
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <p class="text-gray-500">Nama Pelapor</p>
                        <p class="font-medium">Budi Santoso</p>
                    </div>
                    <div>
                        <p class="text-gray-500">Email</p>
                        <p class="font-medium">budi@email.com</p>
                    </div>
                </div>

                <!-- JUDUL -->
                <div>
                    <p class="text-gray-500">Judul Pengaduan</p>
                    <p class="font-semibold text-gray-800">
                        Jalan Rusak Parah di Depan Sekolah
                    </p>
                </div>

                <!-- ISI -->
                <div>
                    <p class="text-gray-500 mb-1">Isi Pengaduan</p>
                    <div class="p-4 bg-gray-50 rounded-lg leading-relaxed">
                        Jalan berlubang dan sangat membahayakan pengendara,
                        terutama pada malam hari.
                    </div>
                </div>

                <!-- STATUS -->
                <div class="flex items-center gap-3">
                    <span class="text-gray-500">Status:</span>
                    <span class="px-3 py-1 rounded-full text-xs bg-yellow-100 text-yellow-700">
                        Diproses
                    </span>
                </div>

            </div>

            <!-- MODAL FOOTER -->
            <div class="flex justify-end gap-3 px-6 py-4 border-t bg-gray-50">

                <button
                    class="px-4 py-2 rounded-lg border text-gray-700 hover:bg-gray-100 transition">
                    Tolak
                </button>

                <button
                    class="px-4 py-2 rounded-lg bg-green-600 text-white hover:bg-green-700 transition">
                    Selesaikan
                </button>

            </div>
        </div>
    </div>

</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\Ramadan\Downloads\Projects\pengaduan-masyarakat\resources\views/admin/pengaduan-show.blade.php ENDPATH**/ ?>