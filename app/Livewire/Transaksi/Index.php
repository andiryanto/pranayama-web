<?php

namespace App\Livewire\Transaksi;

use Livewire\Component;
use Livewire\Attributes\Layout;
use Livewire\WithPagination;
use App\Livewire\Attributes\Title;
use App\Models\Transaksi;
use App\Models\Laporan;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

#[Layout('layouts.app')]
#[Title('Transaksi')]
class Index extends Component
{

     use WithPagination;
    public string $search = '';

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        $this->dispatch('setTitle', ['title' => 'Transaksi']);

        $transaksis = Transaksi::with('items')
            ->when($this->search, function ($query) {
                $query->where('no_transaction', 'like', '%' . $this->search . '%')
                      ->orWhereHas('items', function ($q) {
                          $q->where('nama_produk', 'like', '%' . $this->search . '%');
                      });
            })
            ->latest()
            ->get();

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
        $totalProduk = $transaksis->flatMap->items->sum('quantity');

        $laporan = Laporan::create([
            'user_id' => Auth::id(),
            'tanggal' => now(),
            'hari' => now()->translatedFormat('l'),
            'jam' => now()->format('H:i'),
            'total_produk' => $totalProduk,
            'total_pendapatan' => $totalPendapatan,
        ]);

        foreach ($transaksis as $transaksi) {
            $transaksi->update(['laporan_id' => $laporan->id]);
        }

        session()->flash('message', 'Transaksi hari ini telah ditutup dan dimasukkan ke laporan.');
    }
}
