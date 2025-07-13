<?php

namespace App\Livewire\Event;

use Livewire\Component;
use Livewire\Attributes\Layout;
use Livewire\WithFileUploads;
use App\Models\Event;   // model Event

#[Layout('layouts.app')]
class Edit extends Component
{
    use WithFileUploads;

    // properti data
    public $eventId;
    public $name, $description, $date, $category, $image;
    public $newImage;   // upload baru

    // aturan validasi
    protected $rules = [
        'name'        => 'required|string|max:100',
        'description' => 'nullable|string',
        'date'        => 'required|date',
        'category'    => 'required|string',
        'newImage'    => 'nullable|image|max:2048', // 2 MB
    ];

    /** mount: ambil data awal */
    public function mount($id)
    {
        $event            = Event::findOrFail($id);
        $this->eventId    = $id;
        $this->name       = $event->name;
        $this->description= $event->description;
        $this->date       = $event->date;
        $this->category   = $event->category;
        $this->image      = $event->image;
    }

    /** simpan perubahan */
    public function update()
    {
        $this->validate();

        $event              = Event::findOrFail($this->eventId);
        $event->name        = $this->name;
        $event->description = $this->description;
        $event->date        = $this->date;
        $event->category    = $this->category;

        // ganti gambar (jika ada upload baru)
        if ($this->newImage) {
            if ($event->image && \Storage::disk('public')->exists($event->image)) {
                \Storage::disk('public')->delete($event->image);
            }
            $path        = $this->newImage->store('events', 'public');
            $event->image = $path;
        }

        $event->save();

        session()->flash('message', 'Event berhasil diperbarui!');
        return redirect()->route('event.index');
    }

    /** render view */
    public function render()
    {
        return view('livewire.event.edit');
    }
}
