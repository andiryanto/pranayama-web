<?php

namespace App\Livewire\Transaksi;

use App\Models\Transaksi;
use Livewire\Component;
use Livewire\Attributes\Layout;
use App\Livewire\Attributes\Title;

#[Layout('layouts.app')]
#[Title('Detail Transaksi')]
class Show extends Component
{
    public Transaksi $transaksi;

    public function mount($id)
    {
        $this->transaksi = Transaksi::with('items')->findOrFail($id);
    }

    public function render()
    {
        return view('livewire.transaksi.show');
    }
}
