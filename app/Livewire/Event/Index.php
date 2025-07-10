<?php

namespace App\Livewire\Event;

use Livewire\Component;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\WithPagination;
use App\Models\Event;

#[Layout('layouts.app')]
#[Title('Event')]
class Index extends Component
{
    use WithPagination;

    public $search = '';

    // Reset halaman saat search berubah
    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        $events = Event::where('name', 'like', '%' . $this->search . '%')
                    ->orWhere('category', 'like', '%' . $this->search . '%')
                    ->latest()
                    ->paginate(8);

        $this->dispatch('setTitle', ['title' => 'Event']);

        return view('livewire.event.index', [
            'events' => $events,
        ]);
    }
}
