<?php

namespace App\Livewire\About;

use App\Models\About;
use Livewire\Component;
use Livewire\Attributes\Layout;
use Livewire\WithFileUploads;

#[Layout('layouts.app')]
class Edit extends Component
{
    use WithFileUploads;

    public $aboutId;
    public $name, $position, $gender, $instagram, $photo;
    public $newPhoto;

    protected $rules = [
        'name'      => 'required|string|max:100',
        'position'  => 'required|string|max:100',
        'gender'    => 'required|in:male,female',
        'instagram' => 'nullable|url|max:255',
        'newPhoto'  => 'nullable|image|max:2048', // max 2MB
    ];

    /** mount: ambil data awal */
    public function mount($id)
    {
        $crew = About::findOrFail($id);
        $this->aboutId   = $crew->id;
        $this->name      = $crew->name;
        $this->position  = $crew->position;
        $this->gender    = $crew->gender;
        $this->instagram = $crew->instagram;
        $this->photo     = $crew->photo;
    }

    /** update crew */
    public function update()
    {
        $this->validate();

        $crew              = About::findOrFail($this->aboutId);
        $crew->name        = $this->name;
        $crew->position    = $this->position;
        $crew->gender      = $this->gender;
        $crew->instagram   = $this->instagram;

        if ($this->newPhoto) {
            // Hapus foto lama jika ada
            if ($crew->photo && \Storage::disk('public')->exists($crew->photo)) {
                \Storage::disk('public')->delete($crew->photo);
            }

            // Simpan foto baru
            $path         = $this->newPhoto->store('abouts', 'public');
            $crew->photo  = $path;
        }

        $crew->save();

        session()->flash('success', 'Data crew berhasil diperbarui!');
        return redirect()->route('about.index');
    }

    public function render()
    {
        return view('livewire.about.edit');
    }
}
