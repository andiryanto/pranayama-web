<div>
    <!-- Flash Message -->
    @if (session()->has('message'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
            <strong class="font-bold">Success!</strong>
            <span class="block sm:inline">{{ session('message') }}</span>
        </div>
    @endif

    <!-- Header -->
    <div class="py-4">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between mb-6">
                <div>
                    <h1 class="text-xl font-bold text-gray-900">Laporan Harian</h1>
                    <p class="text-sm text-gray-500">Berikut adalah daftar laporan transaksi harian.</p>
                </div>

                <!-- Search -->
                <div class="mt-4 sm:mt-0">
                    <input
                        type="text"
                        wire:model.live.debounce.300ms="search"
                        placeholder="Cari berdasarkan tanggal atau staff..."
                        class="form-input w-full sm:w-64 px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition"
                    >
                </div>
            </div>

            <!-- Laporan Cards -->
            <div class="bg-white shadow-xl sm:rounded-lg p-6">
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                    @forelse ($reports as $report)
                        <div class="bg-white border border-gray-200 rounded-lg shadow overflow-hidden">
                            <div class="p-4">
                                <!-- Tanggal -->
                                <h5 class="text-md font-semibold text-gray-800 mb-1">
                                    {{ \Carbon\Carbon::parse($report->tanggal)->format('l, d M Y') }}
                                </h5>

                                <!-- Jam Tutup -->
                                <p class="text-sm text-gray-600 mb-1">
                                    Jam Tutup: <span class="font-medium">{{ $report->jam_tutup }}</span>
                                </p>

                                <!-- Staff -->
                                <p class="text-sm text-gray-600 mb-1">
                                    Staff: <span class="font-medium">{{ $report->user->name ?? '-' }}</span>
                                </p>

                                <!-- Total Produk -->
                                <p class="text-sm text-gray-600 mb-1">
                                    Produk Terjual: <span class="font-medium">{{ $report->jumlah_produk_terjual }}</span>
                                </p>

                                <!-- Pendapatan -->
                                <p class="text-sm text-gray-600 mb-3">
                                    Total Pendapatan:
                                    <span class="font-semibold text-green-700">
                                        Rp {{ number_format($report->total_pendapatan, 0, ',', '.') }}
                                    </span>
                                </p>

                                <!-- Tombol Detail -->
                                <div class="flex justify-end mt-3">
                                    <a href="{{ route('laporan.show', $report->id) }}"
                                       class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded text-sm">
                                        Detail
                                    </a>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="col-span-3 text-center text-gray-500">
                            Belum ada laporan tersedia.
                        </div>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</div>
