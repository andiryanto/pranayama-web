<?php

namespace App\Livewire\ManageUser;

use Livewire\Component;
use Livewire\Attributes\Layout;   // ← tambahkan
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use App\Models\User;

#[Layout('layouts.app')] // ← gunakan atribut Layout
class Create extends Component
{
    // Properti yang di-binding ke form, diinisialisasi dengan nilai default.
    public string $name = '';
    public string $email = '';
    public ?string $phone = null; // Dibuat nullable, bisa diisi atau tidak
    public string $password = '';
    public string $role = 'user'; // Default role adalah 'user' sesuai database Anda

    /**
     * Method untuk menyimpan user baru.
     */
    public function save(): void
    {
        // Validasi semua input dari form
        $validated = $this->validate([
            'name' => 'required|string|min:3|max:255',
            'email' => 'required|email|max:255|unique:users,email', // Pastikan email unik
            'phone' => 'nullable|string|max:15',
            'password' => 'required|string|min:8',
            'role' => ['required', Rule::in(['admin', 'user','staff'])], // Validasi role harus salah satu dari yang ditentukan
        ]);

        // Hash password sebelum disimpan ke database untuk keamanan
        $validated['password'] = Hash::make($validated['password']);

        // Buat record user baru di database
        User::create($validated);

        // Kirim notifikasi sukses dan arahkan kembali ke halaman daftar user
        session()->flash('success', 'User baru berhasil ditambahkan.');
        $this->redirect('/users', navigate: true);
    }

    public function render()
    {
        return view('livewire.manage-user.create');
    }
}
