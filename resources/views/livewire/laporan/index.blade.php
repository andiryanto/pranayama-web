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
            <!-- Judul -->
            <div class="mb-6">
                <h3 class="text-xl font-bold leading-6 text-gray-900">Laporan Harian</h3>
                <p class="mt-1 text-sm text-gray-500">Berikut adalah daftar laporan transaksi harian.</p>
            </div>

            <!-- Search -->
            <div class="flex justify-end items-center mb-4">
                <input
                    type="text"
                    wire:model.live.debounce.300ms="search"
                    placeholder="Cari berdasarkan tanggal atau staff..."
                    class="form-input w-44 px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition"
                >
            </div>

            <!-- Laporan Cards -->
            <div class="bg-white shadow-xl sm:rounded-lg p-6">
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                    @forelse ($reports as $report)
                        <div class="bg-white border border-gray-200 rounded-lg shadow hover:shadow-md transition duration-200 overflow-hidden">
                            <div class="p-4 flex flex-col h-full">
                                <!-- Tanggal -->
                                <h5 class="text-md font-semibold text-gray-800 mb-1">
                                    {{ \Carbon\Carbon::parse($report->tanggal)->format('l, d M Y') }}
                                </h5>

                                <!-- Jam Tutup -->
                                <p class="text-sm text-gray-600">
                                    Jam Tutup: <span class="font-medium">{{ $report->jam }}</span>
                                </p>

                                <!-- Staff -->
                                <p class="text-sm text-gray-600">
                                    Staff: <span class="font-medium">{{ $report->user->name ?? '-' }}</span>
                                </p>

                                <!-- Total Produk -->
                                <p class="text-sm text-gray-600">
                                    Produk Terjual: <span class="font-medium">{{ $report->jumlah_produk_terjual }}</span>
                                </p>

                                <!-- Pendapatan -->
                                <p class="text-sm text-gray-600 mb-4">
                                    Total Pendapatan:
                                    <span class="font-semibold text-green-700">
                                        Rp {{ number_format($report->total_pendapatan, 0, ',', '.') }}
                                    </span>
                                </p>

                                <!-- Tombol Detail -->
                                <div class="mt-auto pt-2 text-right">
                                    <a href="{{ route('laporan.show', $report->id) }}"
                                        class="inline-flex items-center px-3 py-2 bg-blue-600 hover:bg-blue-700 text-white text-sm font-medium rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                                        Detail
                                    </a>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="col-span-3 text-center text-gray-500 py-6">
                            Belum ada laporan tersedia.
                        </div>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</div>
