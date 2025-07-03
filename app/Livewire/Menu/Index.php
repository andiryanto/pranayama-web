<?php

namespace App\Livewire\Menu;

use Livewire\Component;
use Livewire\Attributes\Layout;   // ← tambahkan
// Title
use App\Livewire\Attributes\Title; // ← tambahkan
use App\Models\Menu;

#[Layout('layouts.app')] // ← gunakan atribut Layout
#[Title('Menu')] // ← gunakan atribut Title
class Index extends Component
{
    public $menus;
    public function mount()
    {
        // Fetch all menus from the database
        $this->menus = Menu::all();
    }
    public function render()
    {
        // send title to view
        $this->dispatch('setTitle', ['title' => 'Menu']);
        return view('livewire.menu.index');
    }
}
