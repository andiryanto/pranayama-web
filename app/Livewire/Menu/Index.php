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
    // Delete Singel Items
    public $deleteId;

    public function delete($id)
    {
        // Find the menu by ID and delete it
        $menu = Menu::findOrFail($id);
        $menu->delete();

        // Optionally, you can dispatch a browser event to notify the user
        $this->dispatch('notify', ['message' => 'Menu deleted successfully!']);
        // Optionally, you can set a session flash message
        session()->flash('message', 'Menu deleted successfully!');
        // Refresh the menus list
        $this->menus = Menu::all();
    }
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
