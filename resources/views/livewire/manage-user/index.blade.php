<div>
    {{-- Because she competes with no one, no one can compete with her. --}}
    <div class="px-8">
        <div class="container mx-auto px-4 py-8">

            <div class="flex flex-col sm:flex-row justify-between items-center mb-6 gap-4">
                <h1 class="text-3xl font-bold text-gray-800">
                    Kelola User
                </h1>
                <div class="flex items-center gap-4 w-full sm:w-auto">
                    <input
                        type="text"
                        wire:model.live.debounce.300ms="search"
                        placeholder="Cari nama atau email..."
                        class="form-input w-full sm:w-64 px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition"
                    >
                    <a href="{{ route('users.create') }}" class="flex items-center gap-2 bg-blue-600 text-white px-4 py-2 rounded-lg shadow hover:bg-blue-700 transition duration-300 ease-in-out">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" clip-rule="evenodd" />
                        </svg>
                        <span class="font-medium">Tambah</span>
                    </a>
                </div>
            </div>

            @if (session()->has('success'))
                <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-4 rounded-md shadow-sm" role="alert">
                    <p class="font-bold">Sukses!</p>
                    <p>{{ session('success') }}</p>
                </div>
            @endif

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
                        <div class="bg-gray-50 px-6 py-3 flex justify-end items-center gap-4">
                            <a href="{{ route('user.edit', $user->id) }}" class="text-gray-600 hover:text-blue-600 transition" title="Edit">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                    <path d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z" />
                                    <path fill-rule="evenodd" d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z" clip-rule="evenodd" />
                                </svg>
                            </a>
                            <button
                                wire:click="confirmUserDeletion({{ $user->id }})"
                                class="text-gray-600 hover:text-red-600 transition"
                                title="Hapus"
                            >
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm4 0a1 1 0 012 0v6a1 1 0 11-2 0V8z" clip-rule="evenodd" />
                                </svg>
                            </button>
                        </div>
                    </div>
                @empty
                    <div class="col-span-1 md:col-span-2 lg:col-span-3 text-center py-12">
                        <p class="text-gray-500 text-lg">Tidak ada user yang ditemukan.</p>
                    </div>
                @endforelse
            </div>

            <div class="mt-8">
                {{ $users->links() }}
            </div>

        </div>

        @if($confirmingUserDeletion)
        <div class="fixed inset-0 bg-black bg-opacity-50 z-50 flex items-center justify-center" x-data="{ open: @entangle('confirmingUserDeletion') }" x-show="open" x-transition.opacity>
            <div class="bg-white rounded-lg shadow-xl p-6 w-full max-w-md mx-4">
                <h2 class="text-2xl font-bold mb-4">Hapus User?</h2>
                <p class="text-gray-600 mb-6">Apakah Anda yakin ingin menghapus user ini? Tindakan ini tidak dapat dibatalkan.</p>
                <div class="flex justify-end gap-4">
                    <button
                        wire:click="$set('confirmingUserDeletion', null)"
                        class="px-4 py-2 bg-gray-200 text-gray-800 rounded-lg hover:bg-gray-300"
                    >
                        Batal
                    </button>
                    <button
                        wire:click="deleteUser"
                        wire:loading.attr="disabled"
                        wire:loading.class="opacity-50 cursor-not-allowed"
                        class="px-4 py-2 bg-red-600 text-white rounded-lg hover:bg-red-700"
                    >
                        <span wire:loading.remove wire:target="deleteUser">Ya, Hapus</span>
                        <span wire:loading wire:target="deleteUser">Menghapus...</span>
                    </button>
                </div>
            </div>
        </div>
        @endif
    </div>
</div>
