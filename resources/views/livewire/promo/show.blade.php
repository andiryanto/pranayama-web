<div>
    <!-- Detail Promo -->
    <div class="py-4">
        <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="bg-white shadow-xl sm:rounded-lg p-6">
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                    <div>
                        <!-- Gambar promo -->
                        <img class="w-full h-96 object-cover rounded-lg" 
                             src="{{ $promo->promo_image ? asset('storage/' . $promo->promo_image) : asset('images/default-promo.jpg') }}" 
                             alt="{{ $promo->promo_image ? $promo->name : 'Default Promo Image' }}">
                    </div>
                    <div>
                        <h2 class="text-2xl font-bold mb-2">{{ $promo->name }}</h2>
                        <p class="text-gray-600 mb-4">{{ $promo->description }}</p>

                        <p class="text-gray-700 text-sm mb-1">
                            <strong>Mulai:</strong> {{ \Carbon\Carbon::parse($promo->start_date)->format('d M Y') }}
                        </p>
                        <p class="text-gray-700 text-sm">
                            <strong>Berakhir:</strong> {{ \Carbon\Carbon::parse($promo->expiried_date)->format('d M Y') }}
                        </p>

                        <div class="mt-6 space-x-2">
                            <!-- Tombol Edit -->
                            <a href="{{ route('promo.edit', $promo->id) }}" 
                               class="inline-flex items-center px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 text-sm font-semibold">
                                Edit Promo
                            </a>

                            <!-- Tombol Delete Biasa dengan konfirmasi biasa dari function livewire delete-->
                            <button
                                onclick="if (confirm('Apakah kamu yakin ingin menghapus promo ini?')) { @this.call('delete', {{ $promo->id }}) }"
                                class="inline-flex items-center px-4 py-2 bg-red-600 border border-transparent
                                    rounded-md font-semibold text-sm text-white hover:bg-red-700
                                    focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500">
                                Hapus Promo
                            </button>

                            <!-- Tombol Kembali -->
                            <a href="{{ route('promo.index') }}" 
                               class="inline-flex items-center px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 text-sm font-semibold">
                                Kembali ke Daftar Promo
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    function confirmDeletePromo(id) {
        Swal.fire({
            title: 'Yakin ingin menghapus?',
            text: 'Data promo akan dihapus secara permanen!',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#e3342f',
            cancelButtonColor: '#6c757d',
            confirmButtonText: 'Ya, Hapus!',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                // Livewire v2            : Livewire.emit('delete', id);
                // Livewire v3 (lebih aman): window.livewire.emit('delete', id);
                window.livewire.emit('delete', id);
            }
        });
    }
</script>

