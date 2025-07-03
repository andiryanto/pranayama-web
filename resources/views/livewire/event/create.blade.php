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
                    <label class="block text-sm font-medium text-gray-700">Nama</label>
                    <input type="text" wire:model="name" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" />
                    @error('name') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                </div>

                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700">Tanggal</label>
                    <input type="date" wire:model="date" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" />
                    @error('date') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                </div>

                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700">Deskripsi</label>
                    <textarea wire:model="description" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm"></textarea>
                    @error('description') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                </div>

                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700">Kategori</label>
                    <input type="text" wire:model="category" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" />
                    @error('category') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                </div>
    

                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700">Gambar</label>
                    <input type="file" wire:model="image" class="mt-1 block w-full" />
                    @error('image') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror

                    @if ($image)
                        <img src="{{ $image->temporaryUrl() }}" class="h-24 mt-2 rounded" alt="Preview">
                    @endif
                </div>

                <button type="submit"
                    class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                    Simpan
                </button>
            </form>
        </div>
    </div>
</div>
