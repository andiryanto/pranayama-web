<?php

namespace App\Livewire\Event;

use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\Attributes\Layout;
use App\Livewire\Attributes\Title;
use App\Models\Event;

#[Layout('layouts.app')]
#[Title('Add Event')]
class Create extends Component
{
    use WithFileUploads;

    public $name;
    public $date;
    public $description;
    public $category;
    public $image;

    protected $rules = [
        'name'        => 'required|string|max:255',
        'date'        => 'required|date',
        'description' => 'nullable|string',
        'category'    => 'nullable|string|max:255',
        'image'       => 'nullable|image|max:2048',  // max 2MB
    ];

    public function save()
    {
        $this->validate();

        $imagePath = $this->image
            ? $this->image->store('event-images', 'public')
            : null;

        Event::create([
            'name'        => $this->name,
            'date'        => $this->date,
            'description' => $this->description,
            'category' => $this->category,
            'image'       => $imagePath,
        ]);

        session()->flash('success', 'Event berhasil ditambahkan.');
        return redirect()->route('event.index');

        $this->reset(['name', 'date', 'description','category', 'image']);
    }

    public function render()
    {
        return view('livewire.event.create');
    }
}
