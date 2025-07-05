<?php

namespace App\Livewire\Transaksi;

use Livewire\Component;
use Livewire\Attributes\Layout;
use App\Livewire\Attributes\Title;
use App\Models\Transaksi;

#[Layout('layouts.app')]   // pakai layout utama
#[Title('Transaksi')]      // judul halaman
class Index extends Component
{
    /** @var \Illuminate\Database\Eloquent\Collection */
    public $transaksis;

    /* ---------- Lifecycle ---------- */
    public function mount(): void
    {
        // Ambil semua transaksi (urut terbaru)
        $this->transaksis = Transaksi::with('items')->latest()->get();
    }

    /* ---------- Render ---------- */
    public function render()
    {
        // set title di browser (jika layout mendengarkan event)
        $this->dispatch('setTitle', ['title' => 'Transaksi']);

        return view('livewire.transaksi.index');
    }
}
