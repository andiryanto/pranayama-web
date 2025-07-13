<div class="py-4">
    <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="bg-white shadow-xl sm:rounded-lg p-6 overflow-visible">
            <!-- Informasi Umum -->
            <div class="mb-6">
                <h2 class="text-2xl font-bold text-gray-800 mb-1">Detail Laporan</h2>
                <p class="text-sm text-gray-600">
                    Hari: <span class="font-semibold">{{ $laporan->hari }}</span> |
                    Tanggal: <span class="font-semibold">{{ \Carbon\Carbon::parse($laporan->tanggal)->format('d F Y') }}</span> |
                    Jam Tutup: <span class="font-semibold">{{ $laporan->jam }}</span> |
                    Petugas: <span class="font-semibold">{{ $laporan->user->name ?? '-' }}</span>
                </p>
            </div>

            <!-- Produk Terjual -->
            <div class="mb-6">
                <h4 class="text-md font-semibold text-gray-700 mb-2">Produk Terjual:</h4>
                @php
                    $produkTerjual = [];
                    foreach ($laporan->transaksis as $transaksi) {
                        foreach ($transaksi->items as $item) {
                            $nama = $item->nama_produk;
                            $produkTerjual[$nama] = ($produkTerjual[$nama] ?? 0) + $item->qty;
                        }
                    }
                @endphp

                @if (count($produkTerjual))
                    <ul class="list-disc pl-5 text-sm text-gray-700">
                        @foreach ($produkTerjual as $nama => $jumlah)
                            <li>{{ $nama }} x{{ $jumlah }}</li>
                        @endforeach
                    </ul>
                @else
                    <p class="text-gray-500">Tidak ada produk tercatat dalam laporan ini.</p>
                @endif
            </div>

            <!-- Total Pendapatan -->
            <div class="mb-6">
                <h4 class="text-md font-semibold text-gray-700 mb-2">Total Pendapatan:</h4>
                <p class="text-xl font-bold text-green-700">
                    Rp {{ number_format($laporan->total_pendapatan, 0, ',', '.') }}
                </p>
            </div>

            <!-- Tombol Aksi -->
            <div class="mt-6 flex flex-wrap sm:flex-nowrap gap-3 justify-end">
                <a href="{{ route('laporan.index') }}"
                    class="inline-flex items-center px-4 py-2 bg-gray-600 border border-gray-700 rounded-md font-semibold text-sm text-white hover:bg-gray-700 transition">
                    Kembali ke Daftar
                </a>

                <button onclick="window.print()"
                    class="inline-flex items-center px-4 py-2 bg-green-600 border border-green-800 rounded-md font-semibold text-sm text-white hover:bg-green-700 transition">
                    Cetak Laporan
                </button>
            </div>
        </div>
    </div>
</div>
