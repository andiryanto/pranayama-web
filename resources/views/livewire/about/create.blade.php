<div>
    <div class="py-12">
<div class="max-w-2xl mx-auto p-6 bg-white rounded-lg shadow">
    <h2 class="text-xl font-bold mb-6">Tambah Crew Baru</h2>

    <form wire:submit.prevent="save" enctype="multipart/form-data" class="space-y-6">
        <!-- Nama -->
        <div>
            <label class="block text-sm font-medium">Nama</label>
            <input type="text" wire:model.defer="name" class="mt-1 block w-full rounded-md border-gray-300 focus:ring focus:ring-indigo-200">
            @error('name') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>
        
        <!-- Gender -->
        <div>
            <label class="block text-sm font-medium">Jenis Kelamin</label>
            <select wire:model.defer="gender" class="mt-1 block w-full rounded-md border-gray-300 focus:ring focus:ring-indigo-200">
                <option value="">Pilih jenis kelamin</option>
                <option value="male">Laki-laki</option>
                <option value="female">Perempuan</option>
            </select>
            @error('gender') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <!-- Posisi -->
        <div>
            <label class="block text-sm font-medium">Posisi / Jabatan</label>
            <input type="text" wire:model.defer="position" class="mt-1 block w-full rounded-md border-gray-300 focus:ring focus:ring-indigo-200">
            @error('position') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <!-- Instagram -->
        <div>
            <label class="block text-sm font-medium">Instagram</label>
            <input type="url" wire:model.defer="instagram" placeholder="https://instagram.com/username"
                class="mt-1 block w-full rounded-md border-gray-300 focus:ring focus:ring-indigo-200">
            @error('instagram') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <!-- Foto -->
        <div>
            <label class="block text-sm font-medium">Foto Crew</label>
            <input type="file" wire:model="photo" class="mt-1 block w-full text-sm text-gray-500
                file:mr-4 file:py-2 file:px-4
                file:rounded-md file:border-0
                file:text-sm file:font-semibold
                file:bg-indigo-50 file:text-indigo-700
                hover:file:bg-indigo-100">
            @error('photo') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror

            @if ($photo)
                <p class="text-xs text-gray-500 mt-2">Preview:</p>
                <img src="{{ $photo->temporaryUrl() }}" class="w-32 h-32 rounded border object-cover mt-1">
            @endif
        </div>

        <!-- Tombol -->
        <div class="flex justify-end">
            <a href="{{ route('about.index') }}" class="mr-3 px-4 py-2 bg-gray-200 text-gray-800 rounded-md hover:bg-gray-300">
                Batal
            </a>
            <button type="submit" class="px-4 py-2 bg-indigo-600 text-white rounded-md hover:bg-indigo-700">
                Simpan
            </button>
        </div>
    </form>
</div>
