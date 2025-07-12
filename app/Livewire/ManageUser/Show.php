<?php

namespace App\Livewire\ManageUser;

use Livewire\Component;
use Livewire\Attributes\Layout;
use App\Models\User;

#[Layout('layouts.app')]
class Show extends Component
{
    // Properti user aktif
    public $user;
    public $name, $email, $role, $phone;
     protected $listeners = ['delete'];


    /** ------------------------------
     *  HAPUS USER
     *  -----------------------------*/
    public function delete($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        $this->dispatch('notify', ['message' => 'User deleted successfully!']);
        session()->flash('message', 'User deleted successfully!');
        return redirect()->route('users.index');
    }

    /** ------------------------------
     *  MOUNT: ambil data awal
     *  -----------------------------*/
    public function mount($id)
    {
        $user        = User::findOrFail($id);
        $this->user  = $user;
        $this->name  = $user->name;
        $this->email = $user->email;
        $this->role  = $user->role;
        $this->phone = $user->phone;
    }

    /** ------------------------------
     *  VIEW RENDER
     *  -----------------------------*/
    public function render()
    {
        return view('livewire.manage-user.show');
    }
}
