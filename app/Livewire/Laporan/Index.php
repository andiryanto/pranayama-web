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
        $query = Laporan::with('user')
            ->when($this->search, function ($q) {
                $q->where('tanggal', 'like', '%' . $this->search . '%')
                  ->orWhere('jam_tutup', 'like', '%' . $this->search . '%')
                  ->orWhereHas('user', function ($u) {
                      $u->where('name', 'like', '%' . $this->search . '%');
                  });
            })
            ->latest();

        $this->dispatch('setTitle', ['title' => 'Laporan']);

        return view('livewire.laporan.index', [
            'reports' => $query->paginate(9),
        ]);
    }
}
