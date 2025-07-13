<?php

namespace App\Livewire\Menu;

use Livewire\Component;
use Livewire\Attributes\Layout;   // ← tambahkan
use App\Models\Menu;
#[Layout('layouts.app')] // ← gunakan atribut Layout
class Show extends Component
{
    public $menu;
    public $name, $description, $price, $category, $image;
    // delete
    public $deleteId;
    protected $listeners = ['delete'];
    public function delete($id)
    {
        // Find the menu by ID and delete it
        $menu = Menu::findOrFail($id);
        $menu->delete();

        // Optionally, you can dispatch a browser event to notify the user
        $this->dispatch('notify', ['message' => 'Menu deleted successfully!']);
        // Optionally, you can set a session flash message
        session()->flash('message', 'Menu deleted successfully!');
        // Redirect to the menu index page or wherever you want
        return redirect()->route('menu.index');
    }
    public function mount($id)
    {
        $menu = Menu::findOrFail($id);
        $this->menu = $menu;
        $this->name = $menu->name;
        $this->description = $menu->description;
        $this->price = $menu->price;
        $this->category = $menu->category;
        $this->image = $menu->image;
        // Assigning menu properties to component properties 
    }
    public function render()
    {
        return view('livewire.menu.show',);
    }
}