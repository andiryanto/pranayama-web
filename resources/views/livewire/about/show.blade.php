<div>
    <!-- Detail Crew -->
    <div class="py-4">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="bg-white shadow-xl sm:rounded-lg p-6">
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                    <div>
                        <!-- Foto Crew -->
                        <img class="w-full h-96 object-cover rounded-lg"
                            src="{{ $photo ? asset('storage/' . $photo) : asset('images/default-user.jpg') }}"
                            alt="{{ $name }}">
                    </div>
                    <div>
                        <h2 class="text-2xl font-bold mb-2">{{ $name }}</h2>
                        <p class="text-gray-600 mb-2"><strong>Jabatan:</strong> {{ $position }}</p>
                        <p class="text-gray-600 mb-2"><strong>Jenis Kelamin:</strong> {{ ucfirst($gender) }}</p>

                        @if ($instagram)
                            <p class="text-gray-600 mb-4">
                                <strong>Instagram:</strong>
                                <a href="{{ $instagram }}" target="_blank" class="text-pink-600 hover:underline">
                                    {{ '@' . str_replace('https://instagram.com/', '', $instagram) }}
                                </a>
                            </p>
                        @endif

                        <div class="mt-4">
                            <!-- Edit -->
                            <a href="{{ route('about.edit', $aboutId) }}"
                                class="inline-flex items-center px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 text-sm font-semibold">
                                Edit Crew
                            </a>

                            <!-- Delete -->
                            <button 
                                onclick="if (confirm('Apakah kamu yakin ingin menghapus crew ini?')) { @this.call('delete', {{ $aboutId }}) }"
                                class="inline-flex items-center px-4 py-2 bg-red-600 text-white rounded-md hover:bg-red-700 text-sm font-semibold ml-2">
                                Hapus
                            </button>

                            <!-- Kembali -->
                            <a href="{{ route('about.index') }}"
                                class="inline-flex items-center px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 text-sm font-semibold ml-2">
                                Kembali
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- SweetAlert (jika kamu ingin aktifkan yang lebih cantik) -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        function confirmDeleteCrew(id) {
            Swal.fire({
                title: 'Yakin ingin menghapus crew ini?',
                text: "Data akan dihapus secara permanen!",
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
