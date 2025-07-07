<div>
    {{-- Edit Event --}}
    <div class="max-w-3xl mx-auto p-6 bg-white rounded-lg shadow">
        <h2 class="text-xl font-semibold mb-6">Edit Event</h2>

        <form wire:submit.prevent="update" class="space-y-6" enctype="multipart/form-data">
            {{-- Nama --}}
            <div>
                <label class="block text-sm font-medium">Nama Event</label>
                <input type="text"
                       wire:model.defer="name"
                       class="mt-1 block w-full rounded-md border-gray-300 focus:border-indigo-500">
                @error('name') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
            </div>

            {{-- Deskripsi --}}
            <div>
                <label class="block text-sm font-medium">Deskripsi</label>
                <textarea wire:model.defer="description"
                          rows="3"
                          class="mt-1 block w-full rounded-md border-gray-300 focus:border-indigo-500"></textarea>
                @error('description') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
            </div>

            {{-- Tanggal Event --}}
            <div>
                <label class="block text-sm font-medium">Tanggal</label>
                <input type="date"
                       wire:model.defer="date"
                       class="mt-1 block w-full rounded-md border-gray-300 focus:border-indigo-500">
                @error('date') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
            </div>

            {{-- Kategori Event --}}
            <div>
                <label class="block text-sm font-medium">Kategori</label>
                <select wire:model.defer="category"
                        class="mt-1 block w-full rounded-md border-gray-300 focus:border-indigo-500">
                    <option value="" hidden>Pilih kategori</option>
                    <option value="Musik">Musik</option>
                    <option value="Pameran">Pameran</option>
                    <option value="Workshop">Workshop</option>               
                </select>
                @error('category') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
            </div>

            {{-- Gambar --}}
            <div>
                <label class="block text-sm font-medium">Gambar Event</label>

                @if($image)
                    <div class="mb-2">
                        <p class="text-xs mb-1 text-gray-500">Gambar saat ini:</p>
                        <img src="{{ asset('storage/'.$image) }}"
                             class="w-32 h-32 rounded object-cover border">
                    </div>
                @endif

                <input type="file" wire:model="newImage"
                       class="mt-1 block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4
                              file:rounded-md file:border-0 file:text-sm file:font-semibold
                              file:bg-indigo-50 file:text-indigo-700 hover:file:bg-indigo-100"/>

                @error('newImage') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror

                @if ($newImage)
                    <p class="text-xs mt-3 text-gray-500">Preview gambar baru:</p>
                    <img src="{{ $newImage->temporaryUrl() }}"
                         class="w-32 h-32 rounded object-cover border mt-1">
                @endif
            </div>

            {{-- Tombol Aksi --}}
            <div class="flex justify-end space-x-3 pt-4">
                <a href="{{ route('event.index') }}"
                   class="inline-flex items-center px-4 py-2 rounded-md border border-gray-300 text-gray-700
                          hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-400">
                    Batal
                </a>

                <button type="submit"
                        class="inline-flex items-center px-4 py-2 bg-indigo-600 text-white rounded-md
                                hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    Simpan Perubahan
                </button>
            </div>
        </form>
    </div>
</div>
