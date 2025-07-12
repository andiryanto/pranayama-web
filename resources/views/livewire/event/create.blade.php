<div>
    <div class="py-12">
        <div class="max-w-2xl mx-auto p-6 bg-white rounded shadow">
            <h2 class="text-xl font-bold mb-4">Tambah Event</h2>

            @if (session()->has('success'))
                <div class="mb-4 text-green-600">
                    {{ session('success') }}
                </div>
            @endif

            <form wire:submit.prevent="save" enctype="multipart/form-data">
                <div class="mb-4">
                    <label for="name" class="block text-sm font-medium text-gray-700">Nama</label>
                    <input type="text" id="name" wire:model="name" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                    @error('name') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                </div>

                <div class="mb-4">
                    <label for="date" class="block text-sm font-medium text-gray-700">Tanggal</label>
                    <input type="date" id="date" wire:model="date" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                    @error('date') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                </div>

                <div class="mb-4">
                    <label for="description" class="block text-sm font-medium text-gray-700">Deskripsi</label>
                    <textarea id="description" wire:model="description" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm"></textarea>
                    @error('description') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                </div>

                <div class="mb-4">
                    <label for="category" class="block text-sm font-medium text-gray-700">Kategori</label>
                    <select id="category" wire:model="category" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                        <option value="">Pilih Kategori</option>
                        <option value="Musik">Musik</option>
                        <option value="Pameran">Pameran</option>
                        <option value="Workshop">Workshop</option>
                    </select>
                    @error('category') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                </div>

                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700">Gambar</label>
                    <input type="file" id="imageInput" wire:model="image" class="mt-1 block w-full" accept="image/*" />
                    @error('image') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                </div>

                <div class="flex justify-end mt-6">
                    <a href="{{ route('event.index') }}" class="mr-3 px-4 py-2 bg-gray-200 text-gray-800 rounded-md hover:bg-gray-300">
                        Batal
                    </a>
                    <button type="submit"
                            class="px-4 py-2 bg-indigo-600 text-white rounded-md hover:bg-indigo-700 disabled:opacity-50"
                            wire:loading.attr="disabled" wire:target="save">
                        <span wire:loading.remove wire:target="save">Simpan</span>
                        <span wire:loading wire:target="save">Menyimpan...</span>
                    </button>
                </div>
            </form>
        </div>
    </div>

</div>
