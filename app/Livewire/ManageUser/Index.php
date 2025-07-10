<?php

namespace App\Livewire\ManageUser;

use Livewire\Component;
use Livewire\WithPagination;
use Livewire\Attributes\Layout;
use App\Livewire\Attributes\Title;
use App\Models\User;

#[Layout('layouts.app')]
#[Title('Kelola User')]
class Index extends Component
{
    use WithPagination;

    public string $search = '';
    public ?int $confirmingUserDeletion = null;

    // Reset ke halaman pertama saat input search berubah
    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function confirmUserDeletion(int $userId): void
    {
        $this->confirmingUserDeletion = $userId;
    }

    public function deleteUser(): void
    {
        if ($this->confirmingUserDeletion) {
            User::find($this->confirmingUserDeletion)?->delete();

            session()->flash('success', 'User berhasil dihapus.');
            $this->reset('confirmingUserDeletion');
        }
    }

    public function render()
    {
        $users = User::query()
            ->when($this->search, function ($query) {
                $query->where('name', 'like', '%' . $this->search . '%')
                      ->orWhere('email', 'like', '%' . $this->search . '%');
            })
            ->latest()
            ->paginate(9);

        return view('livewire.manage-user.index', [
            'users' => $users,
        ]);
    }
}
