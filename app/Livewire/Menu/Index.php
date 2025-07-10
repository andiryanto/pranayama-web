<?php

namespace App\Livewire\Menu;

use Livewire\Component;
use Livewire\WithPagination;
use Livewire\Attributes\Layout;
use App\Livewire\Attributes\Title;
use App\Models\Menu;

#[Layout('layouts.app')]
#[Title('Menu')]
class Index extends Component
{
    use WithPagination;

    public string $search = '';
    public ?int $deleteId = null;

    // Reset pagination saat pencarian berubah
    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function delete($id)
    {
        $menu = Menu::findOrFail($id);
        $menu->delete();

        session()->flash('message', 'Menu berhasil dihapus.');
        $this->reset('deleteId');
    }

    public function render()
    {
        $this->dispatch('setTitle', ['title' => 'Menu']);

        $menus = Menu::query()
            ->when($this->search, function ($query) {
                $query->where('name', 'like', '%' . $this->search . '%')
                      ->orWhere('category', 'like', '%' . $this->search . '%');
            })
            ->latest()
            ->get(); // ubah sesuai keinginan

        return view('livewire.menu.index', [
            'menus' => $menus,
        ]);
    }
}
