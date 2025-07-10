<?php

namespace App\Livewire\Transaksi;

use Livewire\Component;
use Livewire\Attributes\Layout;
use App\Livewire\Attributes\Title;
use App\Models\Transaksi;
use App\Models\Laporan;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

#[Layout('layouts.app')]
#[Title('Transaksi')]
class Index extends Component
{
    public function render()
    {
        $this->dispatch('setTitle', ['title' => 'Transaksi']);

        // Ambil dan kelompokkan transaksi langsung di render
        $transaksis = Transaksi::with('items')->latest()->get();

        $groupedTransaksis = $transaksis->groupBy(function ($item) {
            return Carbon::parse($item->created_at)->translatedFormat('l, d F Y');
        });

        return view('livewire.transaksi.index', [
            'groupedTransaksis' => $groupedTransaksis,
        ]);
    }

    public function tutupTransaksi()
    {
        $today = Carbon::today();

        $transaksis = Transaksi::whereDate('created_at', $today)
            ->where('status', 'finish')
            ->with('items')
            ->get();

        if ($transaksis->isEmpty()) {
            session()->flash('message', 'Tidak ada transaksi yang selesai hari ini.');
            return;
        }

        $totalPendapatan = $transaksis->sum('total_price');
        $totalProduk = $transaksis->flatMap->items->count();

        // ✅ Simpan laporan dan dapatkan ID-nya
        $laporan = Laporan::create([
            'user_id' => Auth::id(),
            'tanggal' => now(),
            'hari' => now()->translatedFormat('l'),
            'jam' => now()->format('H:i'),
            'total_produk' => $totalProduk,
            'total_pendapatan' => $totalPendapatan,
        ]);

        // ✅ Update transaksi hari ini agar terkait dengan laporan ini
        foreach ($transaksis as $transaksi) {
            $transaksi->update(['laporan_id' => $laporan->id]);
        }

        session()->flash('message', 'Transaksi hari ini telah ditutup dan dimasukkan ke laporan.');
    }
}
