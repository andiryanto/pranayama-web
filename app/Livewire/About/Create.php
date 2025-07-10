<?php

namespace App\Livewire\About;

use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\Attributes\Layout;
use App\Livewire\Attributes\Title;
use App\Models\About;

#[Layout('layouts.app')]
#[Title('Add Crew')]
class Create extends Component
{
    use WithFileUploads;

    public $name;
    public $position;
    public $instagram;
    public $photo;

    protected $rules = [
        'name' => 'required|string|max:255',
        'position' => 'required|string|max:255',
        'instagram' => 'nullable|url',
        'photo' => 'nullable|image|max:2048',
    ];

    public function save()
    {
        $this->validate();

        $photoPath = $this->photo
            ? $this->photo->store('crew-photos', 'public')
            : null;

        About::create([
            'name' => $this->name,
            'position' => $this->position,
            'instagram' => $this->instagram,
            'photo' => $photoPath,
        ]);

        session()->flash('success', 'Crew berhasil ditambahkan.');
        return redirect()->route('about.index');
    }

    public function render()
    {
        return view('livewire.about.create');
    }
}
