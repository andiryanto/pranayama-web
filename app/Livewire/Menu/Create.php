<?php

namespace App\Livewire\Menu;

use Livewire\Component;
use Livewire\Attributes\Layout;   // ← tambahkan
// Title
use App\Livewire\Attributes\Title;

use Livewire\WithFileUploads;
use App\Models\Menu;


#[Layout('layouts.app')] // ← gunakan atribut Layout
#[Title('Add Menu')]
class Create extends Component
{
    use WithFileUploads;

    public $name, $description, $price, $category, $image, $is_recommended = false;

    protected $rules = [
        'name' => 'required|string|max:255',
        'description' => 'nullable|string',
        'price' => 'required|numeric|min:0',
        'category' => 'required|string|in:Coffee,Non Coffee,Ricebowl,Snack,Manual Brew',
        'image' => 'nullable|image|max:2048',
        'is_recommended' => 'boolean', // max 2MB
    ];
    public function save()
    {
        $this->validate();

        $imagePath = null;
        if ($this->image) {
            $imagePath = $this->image->store('menu-images', 'public');
        }

        Menu::create([
            'name' => $this->name,
            'description' => $this->description,
            'price' => $this->price,
            'category' => $this->category,
            'image' => $imagePath,
            'is_recommended' => $this->is_recommended ? 1 : 0,
        ]);

        session()->flash('success', 'Menu berhasil ditambahkan.');
        // Redirect to the menu index page or wherever you want
        return redirect()->route('menu.index');
        // Reset form
        $this->reset(['name', 'description', 'price', 'category', 'image', 'is_recommended']);
    }
    public function layout()
    {
        return view('layouts.app');
    }
    public function render()
    {
        return view('livewire.menu.create');
    }
}
