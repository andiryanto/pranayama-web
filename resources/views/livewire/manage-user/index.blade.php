<div>
@if (session()->has('message'))
    <div class="mb-4 p-3 bg-green-100 text-green-800 rounded shadow">
        {{ session('message') }}
    </div>
@endif
<div>
    {{-- Because she competes with no one, no one can compete with her. --}}
    <div class="px-8">
        <div class="container mx-auto px-4 py-8">

            <!-- Header -->
            <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 mb-6">
                <div>
                    <h1 class="text-xl font-bold text-gray-900">User</h1>
                    <p class="text-sm text-gray-500">Daftar Pengguna</p>
                </div>

                <!-- Search & Tambah -->
                <div class="flex items-center gap-4 w-full sm:w-auto">
                    <input
                        type="text"
                        wire:model.live.debounce.300ms="search"
                        placeholder="Cari nama atau email..."
                        class="form-input w-full sm:w-64 px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition"
                    >
                    <a href="{{ route('users.create') }}"
                       class="flex items-center gap-2 bg-blue-600 text-white px-4 py-2 rounded-lg shadow hover:bg-blue-700 transition duration-300 ease-in-out">
                        <span class="font-medium">+ Tambah User</span>
                    </a>
                </div>
            </div>

            <!-- Success Alert -->
            @if (session()->has('success'))
                <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-4 rounded-md shadow-sm" role="alert">
                    <p class="font-bold">Sukses!</p>
                    <p>{{ session('success') }}</p>
                </div>
            @endif

            <!-- User Cards -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
              @forelse($users as $user)
        <div wire:key="{{ $user->id }}" class="bg-white border border-gray-200 rounded-xl shadow-lg overflow-hidden transition-transform transform hover:-translate-y-1">
            <div class="p-6">
                <div class="flex items-center gap-4">
                    <div class="w-16 h-16 rounded-full bg-gray-200 flex items-center justify-center font-bold text-xl text-gray-500">
                        {{ substr($user->name, 0, 1) }}
                    </div>
                <div class="flex-1">
                    <h3 class="text-xl font-semibold text-gray-900">{{ $user->name }}</h3>
                    <p class="text-gray-500 text-sm">{{ $user->email }}</p>
                    <p class="text-gray-500 text-sm mt-1">
                        {{ $user->role === 'admin' ? 'Admin' : 'User' }}
                    </p>
                </div>
            </div>
        </div>

        
        <!-- Tombol Detail -->
        <div class="bg-gray-50 px-6 py-3 flex justify-end items-center">
            <a href="{{ route('users.show', $user->id) }}"
            class="px-4 py-2 text-white bg-indigo-600 hover:bg-indigo-700 rounded-md text-sm transition">
                Detail
            </a>
        </div>
    </div>
@empty
    <div class="col-span-1 md:col-span-2 lg:col-span-3 text-center py-12">
        <p class="text-gray-500 text-lg">Tidak ada user yang ditemukan.</p>
    </div>
@endforelse
</div>
