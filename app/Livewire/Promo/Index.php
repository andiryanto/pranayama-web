<?php

namespace App\Livewire\Promo;

use Livewire\Component;
use Livewire\WithPagination;
use Livewire\Attributes\Layout; 
use App\Livewire\Attributes\Title;  
use App\Models\Promo;

#[Layout('layouts.app')] 
#[Title('Promo')] 
class Index extends Component
{
    use WithPagination;

    public string $search = '';

    // Reset halaman saat search berubah
    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        $promos = Promo::query()
            ->when($this->search, function ($query) {
                $subQuery->where('name', 'like', '%' . $this->search . '%')
                      ->orWhere('description', 'like', '%' . $this->search . '%');
            })
            ->latest()
            ->paginate(12);


        return view('livewire.promo.index', [
            'promos' => $promos
        ]);
    }
}
