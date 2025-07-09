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
            <div class="px-4 py-5 sm:px-6 flex items-center justify-between">
                <div>
                    <h3 class="text-lg font-medium leading-6 text-gray-900">Daftar Transaksi</h3>
                    <p class="mt-1 max-w-2xl text-sm text-gray-500">Berikut daftar transaksi terbaru.</p>
                </div>
            </div>

            <!-- Transaksi Cards -->
            <div class="bg-white shadow-xl sm:rounded-lg p-6">
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                    @foreach ($transaksis as $transaksi)
                        <div class="bg-white border border-gray-200 rounded-lg shadow overflow-hidden">
                            <div class="p-4">
                                <!-- Nomor Transaksi -->
                                <h5 class="text-md font-semibold text-gray-800 mb-1">
                                    No. Transaksi: {{ $transaksi->no_transaction }}
                                </h5>

                                <!-- Jenis Transaksi -->
                                <p class="text-sm text-gray-600 mb-1">
                                    Jenis: <span class="font-medium">{{ ucfirst($transaksi->type_transaction) }}</span>
                                </p>

                                <!-- Total -->
                                <p class="text-sm text-gray-600 mb-3">
                                    Total Harga:
                                    <span class="font-semibold text-green-700">
                                        Rp {{ number_format($transaksi->total_price, 0, ',', '.') }}
                                    </span>
                                </p>

                                <!-- Tombol Detail -->
                                <div class="flex justify-end">
                                    <a href="{{ route('transaksi.show', $transaksi->id) }}"
                                        class="inline-flex items-center px-3 py-2 bg-blue-600 border border-transparent rounded-md font-semibold text-sm text-white hover:bg-blue-700">
                                        Detail
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                @if ($transaksis->isEmpty())
                    <div class="text-center text-gray-500 py-6">
                        Tidak ada transaksi ditemukan.
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
