<div>
    {{-- Success is as dangerous as failure. --}}
    <!-- Detail Menu -->
    <div class="py-4">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="bg-white shadow-xl sm:rounded-lg p-6">
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                    <div>
                        <!-- create if else -->
                        <img class="w-full h-96 object-cover rounded-lg" 
                            src="{{ $menu->image ? asset('storage/' . $menu->image) : asset('images/default-menu.jpg') }}" 
                            alt="{{ $menu->image ? $menu->name : 'Default Image' }}">
                    </div>
                    <div>
                        <h2 class="text-2xl font-bold mb-2">{{ $name }}</h2>
                        <p class="text-gray-600 mb-4">{{ $menu->description }}</p>
                        <span class="text-xl font-bold text-gray-900">Rp. {{ number_format($menu->price, 0, ',', '.') }}</span>
                        <div class="mt-4">
                            <!-- edit -->
                            <a href="{{ route('menu.edit', $menu->id) }}" class="inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent rounded-md font-semibold text-sm text-white hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                                Edit Menu
                            </a>
                           <button 
                                onclick="if (confirm('Apakah kamu yakin ingin menghapus menu ini?')) { @this.call('delete', {{ $menu->id }}) }" 
                                class="inline-flex items-center px-4 py-2 bg-red-600 border border-transparent rounded-md font-semibold text-sm text-white hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 ml-2">
                                Delete Menu
                            </button>
                            <!-- back to menu list -->
                            <a href="{{ route('menu.index') }}" class="inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent rounded-md font-semibold text-sm text-white hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                                Kembali ke Daftar Menu
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    function confirmDelete(id) {
        Swal.fire({
            title: 'Yakin ingin menghapus?',
            text: "Data menu akan dihapus secara permanen!",
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

