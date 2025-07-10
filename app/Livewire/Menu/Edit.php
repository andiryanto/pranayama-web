<?php

namespace App\Livewire\Menu;

use Livewire\Component;
use Livewire\Attributes\Layout;   // ← tambahkan
use App\Models\Menu;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;
#[Layout('layouts.app')] // ← gunakan atribut Layout
// withfileuploads
class Edit extends Component
{
    use WithFileUploads;
    public $menuId;
    public $name, $description, $price, $category, $image;
    public $newImage;   // upload baru (instance UploadedFile)

    protected $rules = [
        'name'       => 'required|string|max:100',
        'description'=> 'nullable|string',
        'price'      => 'required|numeric|min:0',
        'category'   => 'required|string',
        'newImage'   => 'nullable|image|max:2048', // 2 MB
    ];
    public function update()
    {
        $this->validate();

        $menu              = Menu::findOrFail($this->menuId);
        $menu->name        = $this->name;
        $menu->description = $this->description;
        $menu->price       = $this->price;
        $menu->category    = $this->category;

        // jika user mengganti gambar
        if ($this->newImage) {
            // hapus file lama (opsional)
            if ($menu->image && Storage::disk('public')->exists($menu->image)) {
                Storage::disk('public')->delete($menu->image);
            }
            // simpan file baru
            $path        = $this->newImage->store('menus', 'public');
            $menu->image = $path;
        }

        $menu->save();

        session()->flash('success', 'Menu berhasil diperbarui!');
        return redirect()->route('menu.index');
    }
    public function mount($id)
    {
        $this->menuId = $id;
        $menu = Menu::findOrFail($this->menuId);
        $this->name = $menu->name;
        $this->description = $menu->description;
        $this->price = $menu->price;
        $this->category = $menu->category;
        $this->image = $menu->image; // Assuming you want to keep the current image
    }

    public function render()
    {
        return view('livewire.menu.edit');
    }
}
