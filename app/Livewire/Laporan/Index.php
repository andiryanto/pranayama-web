<?php

namespace App\Livewire\Laporan;

use Livewire\Component;
use App\Models\Laporan;
use Livewire\WithPagination;
use Livewire\Attributes\Layout;
use App\Livewire\Attributes\Title;

#[Layout('layouts.app')]
#[Title('Laporan')]
class Index extends Component
{
    use WithPagination;

    public $search = '';

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        // Load laporan beserta relasi user dan transaksi + items
        $query = Laporan::with(['user', 'transaksis.items'])
            ->when($this->search, function ($q) {
                $q->where('tanggal', 'like', '%' . $this->search . '%')
                  ->orWhere('jam_tutup', 'like', '%' . $this->search . '%')
                  ->orWhereHas('user', function ($u) {
                      $u->where('name', 'like', '%' . $this->search . '%');
                  });
            })
            ->latest();

        // Ambil laporan yang sudah difilter dan paginasi
        $reports = $query->paginate(9);

        // Hitung jumlah produk terjual per laporan
        foreach ($reports as $report) {
            $jumlah = 0;
            foreach ($report->transaksis as $transaksi) {
                foreach ($transaksi->items as $item) {
                    $jumlah += $item->qty ?? 0; // pastikan 'qty' adalah nama kolomnya
                }
            }
            $report->jumlah_produk_terjual = $jumlah;
        }

        $this->dispatch('setTitle', ['title' => 'Laporan']);

        return view('livewire.laporan.index', [
            'reports' => $reports,
        ]);
    }
}
