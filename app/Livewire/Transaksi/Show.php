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
    public $status;

    public function mount($id)
    {
        $this->transaksi = Transaksi::with('items')->findOrFail($id);
        $this->status = $this->transaksi->status;
    }

    public function updateStatus()
    {
        $this->validate([
            'status' => 'required',
        ]);

        $this->transaksi->status = $this->status;
        $this->transaksi->save();

        session()->flash('success', 'Status berhasil diperbarui.');
    }

    public function render()
    {
        return view('livewire.transaksi.show');
    }
}
