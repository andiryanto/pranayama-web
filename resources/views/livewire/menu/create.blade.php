<div>
    {{-- Close your eyes. Count to one. That is how long forever feels. --}}
    <div class="py-12">
        <div class="max-w-2xl mx-auto p-6 bg-white rounded shadow">
            <h2 class="text-xl font-bold mb-4">Tambah Menu</h2>

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
                    <label class="block text-sm font-medium text-gray-700">Deskripsi</label>
                    <textarea wire:model="description" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm"></textarea>
                    @error('description') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                </div>

                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700">Harga</label>
                    <input type="number" step="0.01" wire:model="price" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" />
                    @error('price') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                </div>

                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700">Kategori</label>
                    <select wire:model="category" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                        <option value="">Pilih Kategori</option>
                        <option value="Coffee">Coffee</option>
                        <option value="Non Coffee">Non Coffee</option>
                        <option value="Ricebowl">Ricebowl</option>
                        <option value="Snack">Snack</option>
                        <option value="Manual Brew">Manual Brew</option>
                    </select>
                    @error('category') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                </div>
                <div class="form-group">
                <input type="hidden" name="is_recommended" value="0">
                <label>
                <input type="checkbox" wire:model="is_recommended">
                 Tandai sebagai Recommended
                 </label>
                </div>
                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700">Gambar</label>
                    <input type="file" wire:model="image" class="mt-1 block w-full" />
                    @error('image') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                </div>
                <div class="flex justify-end">
                        <a href="{{ route('about.index') }}" class="mr-3 px-4 py-2 bg-gray-200 text-gray-800 rounded-md hover:bg-gray-300">
                            Batal
                        </a>
                <button type="submit"
                    class="px-4 py-2 bg-indigo-600 text-white rounded-md hover:bg-indigo-700">
                    Simpan
                </button>
            </form>
        </div>
    </div>
</div>
