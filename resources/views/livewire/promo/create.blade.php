<div class="max-w-2xl mx-auto p-6 bg-white rounded-lg shadow">
    <h2 class="text-xl font-bold mb-6">Tambah Promo Baru</h2>

    <form wire:submit.prevent="save" enctype="multipart/form-data" class="space-y-6">
        <!-- Nama -->
        <div>
            <label class="block text-sm font-medium">Nama Promo</label>
            <input type="text" wire:model.defer="name" class="mt-1 block w-full rounded-md border-gray-300 focus:ring focus:ring-indigo-200">
            @error('name') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <!-- Deskripsi -->
        <div>
            <label class="block text-sm font-medium">Deskripsi</label>
            <textarea wire:model.defer="description" rows="3" class="mt-1 block w-full rounded-md border-gray-300 focus:ring focus:ring-indigo-200"></textarea>
            @error('description') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <!-- Tanggal Mulai -->
        <div>
            <label class="block text-sm font-medium">Tanggal Mulai</label>
            <input type="date" wire:model.defer="start_date" class="mt-1 block w-full rounded-md border-gray-300 focus:ring focus:ring-indigo-200">
            @error('start_date') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <!-- Tanggal Berakhir -->
        <div>
            <label class="block text-sm font-medium">Tanggal Berakhir</label>
            <input type="date" wire:model.defer="expiried_date" class="mt-1 block w-full rounded-md border-gray-300 focus:ring focus:ring-indigo-200">
            @error('expiried_date') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <!-- Gambar -->
        <div>
            <label class="block text-sm font-medium">Gambar Promo</label>
            <input type="file" wire:model="promo_image" class="mt-1 block w-full text-sm text-gray-500
                file:mr-4 file:py-2 file:px-4
                file:rounded-md file:border-0
                file:text-sm file:font-semibold
                file:bg-indigo-50 file:text-indigo-700
                hover:file:bg-indigo-100">
            @error('promo_image') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror

            @if ($promo_image)
                <p class="text-xs text-gray-500 mt-2">Preview:</p>
                <img src="{{ $promo_image->temporaryUrl() }}" class="w-32 h-32 rounded border object-cover mt-1">
            @endif
        </div>

        <!-- Tombol Simpan -->
        <div class="flex justify-end">
            <a href="{{ route('promo.index') }}" class="mr-3 px-4 py-2 bg-gray-200 text-gray-800 rounded-md hover:bg-gray-300">
                Batal
            </a>
            <button type="submit" class="px-4 py-2 bg-indigo-600 text-white rounded-md hover:bg-indigo-700">
                Simpan Promo
            </button>
        </div>
    </form>
</div>
