<?php

namespace App\Livewire\ManageUser;

use Livewire\Component;
use Livewire\Attributes\Layout;
use App\Models\User;
use Illuminate\Validation\Rule;
#[Layout('layouts.app')] // ← gunakan atribut Layout
class Edit extends Component
{
    public User $user;

    // Properti form
    public string $name = '';
    public string $email = '';
    public ?string $phone = ''; // ← Tambahkan properti phone, bisa null
    public string $role = '';

    public function mount(User $user): void
    {
        $this->user = $user;
        $this->name = $user->name;
        $this->email = $user->email;
        $this->phone = $user->phone; // ← Isi properti phone
        $this->role = $user->role;
    }

    public function update(): void
    {
        $validated = $this->validate([
            'name' => 'required|string|min:3',
            'email' => ['required', 'email', Rule::unique('users')->ignore($this->user->id)],
            'phone' => 'nullable|string|max:15', // ← Tambahkan validasi untuk phone
            'role' => ['required', Rule::in(['admin', 'user'])], // ← Sesuaikan dengan nilai di tabel Anda
        ]);

        $this->user->update($validated);

        session()->flash('success', 'Data user berhasil diperbarui.');
        $this->redirect('/users', navigate: true);
    }

    public function render()
    {
        return view('livewire.manage-user.edit');
    }
}
