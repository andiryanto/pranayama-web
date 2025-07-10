<?php

namespace App\Livewire\Promo;

use Livewire\Component;
use Livewire\Attributes\Layout;   // ← tambahkan
use App\Models\Promo;
use Livewire\WithFileUploads;
#[Layout('layouts.app')] // ← gunakan atribut Layout
class Create extends Component
{

    use WithFileUploads;

    public $name;
    public $description;
    public $start_date;
    public $expiried_date;
    public $promo_image;

    protected $rules = [
        'name'          => 'required|string|max:100',
        'description'   => 'nullable|string',
        'start_date'    => 'required|date',
        'expiried_date' => 'required|date|after_or_equal:start_date',
        'promo_image'   => 'required|image|max:2048', // max 2MB
    ];

    public function save()
    {
        $this->validate();

        $imagePath = $this->promo_image->store('promos', 'public');

        Promo::create([
            'name'          => $this->name,
            'description'   => $this->description,
            'start_date'    => $this->start_date,
            'expiried_date' => $this->expiried_date,
            'promo_image'   => $imagePath,
        ]);

        session()->flash('success', 'Promo berhasil ditambahkan!');
        return redirect()->route('promo.index');
    }
    public function render()
    {
        return view('livewire.promo.create');
    }
}
