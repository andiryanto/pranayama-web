<div>
    {{-- Success is as dangerous as failure. --}}
    <!-- Detail Event -->
    <div class="py-4">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="bg-white shadow-xl sm:rounded-lg p-6">
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                    <div>
                        <!-- Gambar Event -->
                        <img class="w-full h-96 object-cover rounded-lg"
                            src="{{ $event->image ? asset('storage/' . $event->image) : asset('images/default-event.jpg') }}"
                            alt="{{ $event->image ? $event->name : 'Default Event Image' }}">
                    </div>
                    <div>
                        <h2 class="text-2xl font-bold mb-2">{{ $name }}</h2>
                        <p class="text-gray-600 mb-4">{{ $event->description }}</p>
                        <p class="text-gray-700 mb-2"><strong>Tanggal:</strong> {{ \Carbon\Carbon::parse($event->date)->translatedFormat('d F Y') }}</p>
                        <p class="text-gray-700 mb-2"><strong>Kategori:</strong> {{ ucfirst($event->category) }}</p>

                        <div class="mt-4">
                            <!-- Edit -->
                            <a href="{{ route('event.edit', $event->id) }}"
                                class="inline-flex items-center px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 text-sm font-semibold">
                                Edit Event
                            </a>

                            <!-- Delete (pakai native confirm saja, bukan Swal) -->
                            <button 
                                onclick="if (confirm('Apakah kamu yakin ingin menghapus event ini?')) { @this.call('delete', {{ $event->id }}) }"
                                class="inline-flex items-center px-4 py-2 bg-red-600 text-white rounded-md hover:bg-red-700 text-sm font-semibold ml-2">
                                Delete Event
                            </button>

                            <!-- Kembali -->
                            <a href="{{ route('event.index') }}"
                                class="inline-flex items-center px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 text-sm font-semibold ml-2">
                                Kembali ke Daftar Event
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</div>


<!-- SweetAlert Script -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    function confirmDeleteEvent(id) {
        Swal.fire({
            title: 'Yakin ingin menghapus event ini?',
            text: "Data event akan dihapus secara permanen!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#e3342f',
            cancelButtonColor: '#6c757d',
            confirmButtonText: 'Ya, Hapus!',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                Livewire.emit('delete', id); // pastikan komponen listen 'delete'
            }
        });
    }
</script>
