<?php

namespace App\Livewire\About;

use Livewire\Component;
use Livewire\WithPagination;
use Livewire\Attributes\Layout;
use App\Livewire\Attributes\Title;
use App\Models\About;

#[Layout('layouts.app')]
#[Title('About')]
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
        $abouts = About::where('name', 'like', '%' . $this->search . '%')
            ->orWhere('gender', 'like', '%' . $this->search . '%')
            ->orWhere('position', 'like', '%' . $this->search . '%')
            ->latest()
            ->paginate(8);

        return view('livewire.about.index', compact('abouts'));
    }
}
