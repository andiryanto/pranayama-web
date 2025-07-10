<?php

namespace App\Livewire\ManageUser;

use Livewire\Component;
use Livewire\Attributes\Layout;
use App\Livewire\Attributes\Title;
use App\Models\User;
use Livewire\WithPagination;


#[Layout('layouts.app')] // ← gunakan atribut Layout
#[Title('Kelola User')] // ← gunakan atribut Title
class Index extends Component
{
    use WithPagination; // Untuk pagination

    // Properti untuk live search
    public string $search = '';

    // Properti untuk modal konfirmasi hapus
    public ?int $confirmingUserDeletion = null;

    // HAPUS: Properti public $users tidak diperlukan lagi.
    // HAPUS: Method mount() juga tidak diperlukan untuk mengambil data awal.

    /**
     * Tampilkan modal konfirmasi sebelum menghapus user.
     */
    public function confirmUserDeletion(int $userId): void
    {
        $this->confirmingUserDeletion = $userId;
    }

    /**
     * Hapus user setelah dikonfirmasi.
     */
    public function deleteUser(): void
    {
        // Pastikan ada user yang dipilih untuk dihapus
        if ($this->confirmingUserDeletion) {
            User::find($this->confirmingUserDeletion)->delete();

            // Kirim notifikasi sukses
            session()->flash('success', 'User berhasil dihapus.');

            // Reset properti untuk menutup modal
            $this->reset('confirmingUserDeletion');
        }
    }

    /**
     * Method render() akan dijalankan setiap kali ada pembaruan,
     * seperti saat mengetik di input search atau klik halaman pagination.
     */
    public function render()
    {
        // PINDAHKAN LOGIKA PENGAMBILAN DATA KE SINI
        $users = User::query()
            // Terapkan filter pencarian jika $search tidak kosong
            ->when($this->search, function ($query) {
                $query->where('name', 'like', '%' . $this->search . '%')
                      ->orWhere('email', 'like', '%' . $this->search . '%');
            })
            // Urutkan berdasarkan data terbaru
            ->latest()
            // Gunakan paginate() untuk membagi data per halaman
            ->paginate(10); // Angka 10 adalah jumlah item per halaman

        // Kirim data users ke view
        return view('livewire.manage-user.index', [
            'users' => $users
        ]);
    }
}
