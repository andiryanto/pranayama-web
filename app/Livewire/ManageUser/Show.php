<?php

namespace App\Livewire\ManageUser;

use App\Models\User;
use Livewire\Component;
use Livewire\Attributes\Layout;

#[Layout('layouts.app')]
class Show extends Component
{
    public User $user;

    public function mount($id)
    {
        $this->user = User::findOrFail($id);
    }

    public function render()
    {
        return view('livewire.manage-user.show');
    }
}
