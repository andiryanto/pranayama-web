<?php

namespace App\Livewire\Laporan;

use Livewire\Component;
use App\Models\Laporan;
use Livewire\Attributes\Layout;
use App\Livewire\Attributes\Title;

#[Layout('layouts.app')]
#[Title('Laporan')]
class Index extends Component
{
    public $laporans;

    public function mount()
    {
        $this->laporans = Laporan::with('user')->latest()->get();
    }

    public function render()
    {
        $this->dispatch('setTitle', ['title' => 'Laporan']);
       return view('livewire.laporan.index', [
        'reports' => $this->laporans,
       ]);
    }
}
