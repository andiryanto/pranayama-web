<?php

namespace App\Livewire\Promo;

use Livewire\Component;
use Livewire\Attributes\Layout;   // ← tambahkan
use App\Models\Promo;
#[Layout('layouts.app')] // ← gunakan atribut Layout
class Index extends Component
{
    public $promos;
    
    public function mount()
    {
        $this->promos = Promo::all();
    }
    public function render()
    {
        return view('livewire.promo.index');
    }
}
