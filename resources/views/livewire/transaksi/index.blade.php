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
                <h3 class="text-xl font-bold leading-6 text-gray-900">Daftar Transaksi</h3>
                <p class="mt-1 text-sm text-gray-500">Berikut daftar transaksi terbaru yang dikelompokkan berdasarkan hari.</p>
            </div>

            <!-- Search + Tutup Transaksi -->
            <div class="flex justify-end items-center mb-4">
                <!-- Search Box -->
               <!-- <button
                    onclick="confirm('Yakin reset antrian hari ini?') || event.stopImmediatePropagation()"
                    wire:click="resetAntrian"
                    class="bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded shadow"
                >
                    Reset Antrian
                </button> -->
                <input
                    type="text"
                    wire:model.live.debounce.300ms="search"
                    placeholder="Cari transaksi..."
                    class="ml-3 form-input w-44 px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition"
                >

                <!-- Tombol Tutup Transaksi -->
                <button wire:click="tutupTransaksi"
                    class="ml-3 bg-red-600 hover:bg-red-700 text-white font-bold py-2 px-4 rounded-md shadow-sm transition duration-200 whitespace-nowrap">
                    Tutup Transaksi
                </button>
            </div>

            <!-- Transaksi Grouped by Date -->
            <div class="bg-white shadow-xl sm:rounded-lg p-6">
                 @forelse ($groupedTransaksis as $tanggal => $transaksis)
                    <div class="mb-8">
                        <!-- Tanggal -->
                        <h4 class="text-md font-semibold text-gray-700 mb-3">{{ $tanggal }}</h4>

                        <!-- Grid Transaksi -->
                        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                            @foreach ($transaksis as $transaksi)
                                <div class="bg-white border border-gray-200 rounded-lg shadow hover:shadow-md transition duration-200 overflow-hidden">
                                    <div class="p-4 flex flex-col h-full">
                                        <!-- No Transaksi -->
                                        <h5 class="text-md font-semibold text-gray-800 mb-1">
                                            No. Transaksi: {{ $transaksi->no_transaction }}
                                        </h5>

                                        <!-- Jenis Transaksi -->
                                        <p class="text-sm text-gray-600">
                                            Jenis: <span class="font-medium">{{ ucfirst($transaksi->type_transaction) }}</span>
                                        </p>

                                        <!-- Total -->
                                        <p class="text-sm text-gray-600 mb-4">
                                            Total Harga:
                                            <span class="font-semibold text-green-700">
                                                Rp {{ number_format($transaksi->total_price, 0, ',', '.') }}
                                            </span>
                                        </p>

                                        <!-- Tombol Detail -->
                                        <div class="mt-auto pt-2 text-right">
                                            <a href="{{ route('transaksi.show', $transaksi->id) }}"
                                                class="inline-flex items-center px-3 py-2 bg-blue-600 hover:bg-blue-700 text-white text-sm font-medium rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                                                Detail
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @empty
                    <div class="text-center text-gray-500 py-6">
                        Tidak ada transaksi ditemukan.
                    </div>
                @endforelse
            </div>
        </div>
    </div>
</div>
