<?php

namespace App\Livewire\Promo;

use Livewire\Component;
use Livewire\Attributes\Layout;
use Livewire\WithFileUploads;
use App\Models\Promo;

#[Layout('layouts.app')]
class Edit extends Component
{
    use WithFileUploads;

    // ── Properti data promo ─────────────────────────────
    public $promoId;
    public $name;
    public $description;
    public $start_date;
    public $expiried_date;
    public $promo_image;   // nama file lama
    public $newImage;      // upload gambar baru (UploadedFile)

    // ── Validasi ────────────────────────────────────────
    protected $rules = [
        'name'          => 'required|string|max:100',
        'description'   => 'nullable|string',
        'start_date'    => 'required|date',
        'expiried_date' => 'required|date|after_or_equal:start_date',
        'newImage'      => 'nullable|image|max:2048', // 2 MB
    ];

    // ── Mount ───────────────────────────────────────────
    public function mount($id)
    {
        $this->promoId       = $id;
        $promo               = Promo::findOrFail($id);

        $this->name          = $promo->name;
        $this->description   = $promo->description;
        $this->start_date    = $promo->start_date;
        $this->expiried_date = $promo->expiried_date;
        $this->promo_image   = $promo->promo_image;
    }

    // ── Update / Simpan Perubahan ───────────────────────
    public function update()
    {
        $this->validate();

        $promo               = Promo::findOrFail($this->promoId);
        $promo->name         = $this->name;
        $promo->description  = $this->description;
        $promo->start_date   = $this->start_date;
        $promo->expiried_date= $this->expiried_date;

        // jika user mengganti gambar
        if ($this->newImage) {
            // hapus file lama (opsional)
            if ($promo->promo_image && \Storage::disk('public')->exists($promo->promo_image)) {
                \Storage::disk('public')->delete($promo->promo_image);
            }
            // simpan file baru
            $path              = $this->newImage->store('promos', 'public');
            $promo->promo_image= $path;
        }

        $promo->save();

        session()->flash('message', 'Promo berhasil diperbarui!');
        return redirect()->route('promo.index');
    }

    // ── Render ──────────────────────────────────────────
    public function render()
    {
        return view('livewire.promo.edit');
    }
}
