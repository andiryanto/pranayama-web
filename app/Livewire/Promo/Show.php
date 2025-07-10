<?php

namespace App\Livewire\Promo;

use Livewire\Component;
use Livewire\Attributes\Layout;
use App\Models\Promo;

#[Layout('layouts.app')]
class Show extends Component
{
    // --- properti utama
    public $promo;
    public $name, $description, $start_date, $expiried_date, $promo_image;

    // --- properti untuk konfirmasi hapus (opsional)
    public $deleteId;
    protected $listeners = ['delete'];

    /**
     * Jalankan sekali ketika komponen di‑mount
     */
    public function mount($id)
    {
        $promo               = Promo::findOrFail($id);
        $this->promo         = $promo;
        $this->name          = $promo->name;
        $this->description   = $promo->description;
        $this->start_date    = $promo->start_date;
        $this->expiried_date = $promo->expiried_date;
        $this->promo_image   = $promo->promo_image;
    }

    /**
     * Hapus promo
     */
    public function delete($id)
    {
        Promo::findOrFail($id)->delete();

        // Flash message saja sudah cukup
        session()->flash('message', 'Promo deleted successfully!');

        // Redirect
        return $this->redirectRoute('promo.index'); // v3
        // return redirect()->route('promo.index'); // v2
    }


    /**
     * Render view
     */
    public function render()
    {
        return view('livewire.promo.show');
    }
}
