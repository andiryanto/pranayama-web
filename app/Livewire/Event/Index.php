<?php

namespace App\Livewire\Event;

use Livewire\Component;
use Livewire\Attributes\Layout;
use App\Livewire\Attributes\Title;
use App\Models\Event;

#[Layout('layouts.app')]
#[Title('Event')]
class Index extends Component
{
    public $events;

    public function mount()
    {
        // Fetch all events from the database
        $this->events = Event::all();
    }

    public function render()
    {
        // Kirim event title ke JS/Blade kalau kamu pakai fitur dynamic title
        $this->dispatch('setTitle', ['title' => 'Event']);

        return view('livewire.event.index');
    }
}
