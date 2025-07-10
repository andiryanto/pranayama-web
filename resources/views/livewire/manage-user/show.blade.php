<div class="py-6">
    <div class="max-w-lg ml-6">
        <div class="bg-white shadow-lg rounded-lg p-6 flex items-center gap-8">
            <!-- Avatar -->
            <div class="w-32 h-32 rounded-full bg-blue-500 text-white flex items-center justify-center text-5xl font-bold">
                {{ strtoupper(substr($user->name, 0, 1)) }}
            </div>

            <!-- Informasi User -->
            <div>
                <h2 class="text-2xl font-bold mb-1">{{ $user->name }}</h2>
                <p class="text-gray-600 mb-1">{{ $user->email }}</p>
                <span class="inline-block px-3 py-1 bg-gray-200 text-sm rounded mb-4">
                    {{ $user->role === 'admin' ? 'Admin' : 'User' }}
                </span>

                <!-- Tombol Aksi -->
                <div class="flex flex-wrap gap-3">
                    <!-- Edit -->
                    <a href="{{ route('user.edit', $user->id) }}"
                        class="px-4 py-2 bg-blue-600 text-white rounded-md text-sm hover:bg-blue-700">
                        Edit
                    </a>

                    <!-- Hapus -->
                    <button onclick="confirmDelete({{ $user->id }})"
                        class="px-4 py-2 bg-red-600 text-white rounded-md text-sm hover:bg-red-700">
                        Hapus
                    </button>

                    <!-- Kembali -->
                    <a href="{{ route('users.index') }}"
                        class="px-4 py-2 bg-gray-300 text-gray-800 rounded-md text-sm hover:bg-gray-400">
                        Kembali
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        function confirmDelete(id) {
            Swal.fire({
                title: 'Yakin ingin menghapus?',
                text: "Data pengguna akan dihapus secara permanen!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#e3342f',
                cancelButtonColor: '#6c757d',
                confirmButtonText: 'Ya, Hapus!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    Livewire.emit('delete', id);
                }
            });
        }
    </script>
</div>
