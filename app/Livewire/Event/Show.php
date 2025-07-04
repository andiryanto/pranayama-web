<?php

namespace App\Livewire\Event;

use Livewire\Component;
use Livewire\Attributes\Layout;
use App\Models\Event;

#[Layout('layouts.app')]
class Show extends Component
{
    // properti event aktif
    public $event;
    public $name, $description, $date, $category, $image;

    /** ------------------------------
     *  HAPUS EVENT
     *  -----------------------------*/
    public function delete($id)
    {
        $event = Event::findOrFail($id);
        $event->delete();

        // notifikasi browser (opsional, bila Anda menangkap event 'notify' di JS/Alpine)
        $this->dispatch('notify', ['message' => 'Event deleted successfully!']);

        // flash message Laravel biasa
        session()->flash('message', 'Event deleted successfully!');

        // redirect ke daftar event
        return redirect()->route('event.index');
    }

    /** ------------------------------
     *  MOUNT: ambil data awal
     *  -----------------------------*/
    public function mount($id)
    {
        $event          = Event::findOrFail($id);
        $this->event    = $event;
        $this->name     = $event->name;
        $this->description = $event->description;
        $this->date     = $event->date;      // format asli; format di Blade sesuai kebutuhan
        $this->category = $event->category;
        $this->image    = $event->image;
    }

    /** ------------------------------
     *  VIEW RENDER
     *  -----------------------------*/
    public function render()
    {
        return view('livewire.event.show');
    }
}
