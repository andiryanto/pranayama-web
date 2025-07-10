<?php

namespace App\Livewire\Promo;

use Livewire\Component;
use Livewire\Attributes\Layout; 
use App\Livewire\Attributes\Title;  
use App\Models\Promo;

#[Layout('layouts.app')] 
#[Title('Promo')] 
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
