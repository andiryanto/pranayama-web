@extends('layouts.app')

@section('title', 'Detail Transaksi')

@section('content')
<div class="max-w-4xl mx-auto py-10">
    <h2 class="text-2xl font-semibold mb-6">Detail Transaksi</h2>

    <div class="mb-4">
        <p><strong>No Transaksi:</strong> {{ $transaksi->no_transaction }}</p>
        <p><strong>Jenis Transaksi:</strong> {{ $transaksi->type_transaction }}</p>
        <p><strong>Nama Staff:</strong> {{ $transaksi->staff->name ?? '-' }}</p>
        <p><strong>Tanggal:</strong> {{ $transaksi->created_at->format('d M Y H:i') }}</p>
        <p><strong>Total Harga:</strong> Rp {{ number_format($transaksi->total_price, 0, ',', '.') }}</p>
    </div>

    <hr class="my-4">

    <h3 class="text-xl font-bold mb-2">Daftar Produk</h3>
    <table class="w-full border border-collapse">
        <thead>
            <tr class="bg-gray-100">
                <th class="border px-4 py-2">#</th>
                <th class="border px-4 py-2">Produk</th>
                <th class="border px-4 py-2">Qty</th>
                <th class="border px-4 py-2">Harga</th>
                <th class="border px-4 py-2">Subtotal</th>
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
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="mt-6 text-right">
        <button onclick="window.print()" class="px-4 py-2 bg-blue-600 text-white rounded">
            Cetak Struk
        </button>
    </div>
</div>
@endsection
