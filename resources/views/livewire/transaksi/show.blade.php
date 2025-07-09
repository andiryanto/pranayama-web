@if (session('success'))
    <div class="mb-4 text-green-600">
        {{ session('success') }}
    </div>
@endif

<div class="py-4">
    <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="bg-white shadow-xl sm:rounded-lg p-6">
            <h2 class="text-2xl font-semibold mb-6">Detail Transaksi</h2>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 mb-6">
                <div>
                    <p><strong>No Transaksi:</strong> {{ $transaksi->no_transaction }}</p>
                    <p><strong>Jenis Transaksi:</strong> {{ $transaksi->type_transaction }}</p>
                    <p><strong>Nama Staff:</strong> {{ $transaksi->staff->name ?? '-' }}</p>
                    <p><strong>Tanggal:</strong> {{ $transaksi->created_at->format('d M Y H:i') }}</p>
                    <p><strong>Total Harga:</strong> Rp {{ number_format($transaksi->total_price, 0, ',', '.') }}</p>
                </div>
            </div>

            <hr class="my-4">

            <h3 class="text-xl font-bold mb-3">Daftar Produk</h3>
            <div class="overflow-x-auto">
                <table class="w-full border border-collapse text-sm">
                    <thead>
                        <tr class="bg-gray-100 text-left">
                            <th class="border px-4 py-2">#</th>
                            <th class="border px-4 py-2">Produk</th>
                            <th class="border px-4 py-2 text-center">Qty</th>
                            <th class="border px-4 py-2 text-right">Harga</th>
                            <th class="border px-4 py-2 text-right">Subtotal</th>
                            <th class="border px-4 py-2 text-right">Extras</th>
                            <th class="border px-4 py-2 text-right">Catatan</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($transaksi->items as $item)
                            <tr>
                                <td class="border px-4 py-2">{{ $loop->iteration }}</td>
                                <td class="border px-4 py-2">{{ $item->nama_produk }}</td>
                                <td class="border px-4 py-2 text-center">{{ $item->qty }}</td>
                                <td class="border px-4 py-2 text-right">Rp {{ number_format($item->harga, 0, ',', '.') }}</td>
                                <td class="border px-4 py-2 text-right">Rp {{ number_format($item->qty * $item->harga, 0, ',', '.') }}</td>
                                <td class="border px-4 py-2 text-right">
                                    @php
                                        $extras = json_decode($item->extras, true);
                                    @endphp
                                    {{ is_array($extras) ? implode(', ', $extras) : '-' }}
                                </td>
                                <td class="border px-4 py-2 text-right">{{ $item->note ?? '-' }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="mt-6 text-right">
                <button onclick="window.print()" class="px-4 py-2 bg-blue-600 text-white rounded">
                    Cetak Struk
                </button>
            </div>

            <form wire:submit.prevent="updateStatus" class="flex items-center gap-3 mt-4">
                <label for="status" class="text-sm font-medium">Edit Status:</label>
                <select wire:model="status" id="status" class="border rounded px-3 py-1 text-sm">
                    <option value="pending">Pending</option>
                    <option value="process">Process</option>
                    <option value="finish">Finish</option>
                </select>
                <button type="submit" class="bg-blue-600 text-white px-4 py-1 rounded text-sm">Simpan</button>
            </form>
        </div>
    </div>
</div>
