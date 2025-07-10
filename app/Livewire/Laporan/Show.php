<?php

namespace App\Livewire\Laporan;

use Livewire\Component;
use App\Models\Laporan;
use Livewire\Attributes\Layout;

#[Layout('layouts.app')]
class Show extends Component
{
    public $laporan;
    public $produkTerjual = [];

    public function mount($id)
    {
        $this->laporan = Laporan::with(['user', 'transaksis.items.product'])->findOrFail($id);

        // Ambil semua item dari semua transaksi yang terkait dengan laporan ini
        $items = $this->laporan->transaksis->flatMap->items;

        // Kelompokkan berdasarkan nama produk dan hitung total quantity-nya
        $this->produkTerjual = $items->groupBy('product_name')->map(function ($group) {
            return $group->sum('quantity');
        });
    }

    public function render()
    {
        return view('livewire.laporan.show', [
            'produkTerjual' => $this->produkTerjual,
        ]);
    }
}
