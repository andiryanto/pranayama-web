<?php

namespace App\Livewire\About;

use Livewire\Component;
use Livewire\Attributes\Layout;
use App\Models\About;
use Illuminate\Support\Facades\Storage;

#[Layout('layouts.app')]
class Show extends Component
{
    // Properti crew aktif
    public $about;
    public $aboutId;
    public $name, $position, $gender, $photo, $instagram;

    /** ------------------------------
     *  MOUNT: Ambil data awal
     *  ----------------------------- */
    public function mount($id)
    {
        $about            = About::findOrFail($id);
        $this->about      = $about;
        $this->aboutId    = $id;
        $this->name       = $about->name;
        $this->position   = $about->position;
        $this->gender     = $about->gender;
        $this->photo      = $about->photo;
        $this->instagram  = $about->instagram;
    }

    /** ------------------------------
     *  HAPUS CREW
     *  ----------------------------- */
    public function delete($id)
    {
        $about = About::findOrFail($id);

        // Hapus foto dari storage jika ada
        if ($about->photo && Storage::disk('public')->exists($about->photo)) {
            Storage::disk('public')->delete($about->photo);
        }

        $about->delete();

        $this->dispatch('notify', ['message' => 'Crew berhasil dihapus!']);
        session()->flash('message', 'Crew berhasil dihapus!');

        return redirect()->route('about.index');
    }

    /** ------------------------------
     *  RENDER VIEW
     *  ----------------------------- */
    public function render()
    {
        return view('livewire.about.show');
    }
}
