<div>
    {{-- Edit Crew --}}
    <div class="max-w-3xl mx-auto p-6 bg-white rounded-lg shadow">
        <h2 class="text-xl font-semibold mb-6">Edit Crew</h2>

        <form wire:submit.prevent="update" class="space-y-6" enctype="multipart/form-data">
            {{-- Nama --}}
            <div>
                <label class="block text-sm font-medium">Nama Crew</label>
                <input type="text"
                       wire:model.defer="name"
                       class="mt-1 block w-full rounded-md border-gray-300 focus:border-indigo-500">
                @error('name') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
            </div>

            {{-- Posisi --}}
            <div>
                <label class="block text-sm font-medium">Posisi / Jabatan</label>
                <input type="text"
                       wire:model.defer="position"
                       class="mt-1 block w-full rounded-md border-gray-300 focus:border-indigo-500">
                @error('position') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
            </div>

            {{-- Gender --}}
            <div>
                <label class="block text-sm font-medium">Jenis Kelamin</label>
                <select wire:model.defer="gender"
                        class="mt-1 block w-full rounded-md border-gray-300 focus:border-indigo-500">
                    <option value="" hidden>Pilih gender</option>
                    <option value="male">Laki-laki</option>
                    <option value="female">Perempuan</option>
                </select>
                @error('gender') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
            </div>

            {{-- Instagram --}}
            <div>
                <label class="block text-sm font-medium">Instagram</label>
                <input type="url"
                       wire:model.defer="instagram"
                       placeholder="https://instagram.com/username"
                       class="mt-1 block w-full rounded-md border-gray-300 focus:ring focus:ring-indigo-200">
                @error('instagram') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
            </div>

            {{-- Foto --}}
            <div>
                <label class="block text-sm font-medium">Foto Crew</label>

                @if ($photo)
                    <div class="mb-2">
                        <p class="text-xs mb-1 text-gray-500">Foto saat ini:</p>
                        <img src="{{ asset('storage/' . $photo) }}"
                             class="w-32 h-32 rounded object-cover border">
                    </div>
                @endif

                <input type="file" wire:model="newPhoto"
                       class="mt-1 block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4
                              file:rounded-md file:border-0 file:text-sm file:font-semibold
                              file:bg-indigo-50 file:text-indigo-700 hover:file:bg-indigo-100">
                @error('newPhoto') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror

                @if ($newPhoto)
                    <p class="text-xs mt-3 text-gray-500">Preview foto baru:</p>
                    <img src="{{ $newPhoto->temporaryUrl() }}"
                         class="w-32 h-32 rounded object-cover border mt-1">
                @endif
            </div>

            {{-- Tombol Aksi --}}
            <div class="flex justify-end space-x-3 pt-4">
                <a href="{{ route('about.index') }}"
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
