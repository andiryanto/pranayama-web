<?php

namespace App\Livewire\About;
use Livewire\Component;
use Livewire\Attributes\Layout;
use App\Livewire\Attributes\Title;
use App\Models\About;

#[Layout('layouts.app')]
#[Title('About')]
class Index extends Component
{
    public function render()
    {
        $abouts = About::all();
        return view('livewire.about.index',compact('abouts'));
        
    }
}
