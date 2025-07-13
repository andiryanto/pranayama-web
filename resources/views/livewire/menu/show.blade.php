<div>
    @if (session()->has('message'))
        <div class="bg-green-100 text-green-800 p-2 rounded mb-4">
            {{ session('message') }}
        </div>
    @endif

    <div class="py-4">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="bg-white shadow-xl sm:rounded-lg p-6">
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                    <div>
                        <img class="w-full h-96 object-cover rounded-lg"
                             src="{{ $menu->image ? asset('storage/' . $menu->image) : asset('images/default-menu.jpg') }}"
                             alt="{{ $menu->image ? $menu->name : 'Default Image' }}">
                    </div>
                    <div>
                        <h2 class="text-2xl font-bold mb-2">{{ $name }}</h2>
                        <p class="text-gray-600 mb-4">{{ $menu->description }}</p>
                        <span class="text-xl font-bold text-gray-900">
                            Rp. {{ number_format($menu->price, 0, ',', '.') }}
                        </span>

                        <div class="mt-4 flex flex-wrap gap-2">
                            <a href="{{ route('menu.edit', $menu->id) }}"
                               class="inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent rounded-md font-semibold text-sm text-white hover:bg-blue-700">
                                Edit Menu
                            </a>

                            <!-- ✅ Trigger SweetAlert via Livewire emit -->
                           <button wire:click="delete({{ $menu->id }})"
                                    class="inline-flex items-center px-4 py-2 bg-red-600 text-white rounded-md hover:bg-red-700">
                                Hapus
                            </button>
                            <a href="{{ route('menu.index') }}"
                               class="inline-flex items-center px-4 py-2 bg-gray-500 border border-transparent rounded-md font-semibold text-sm text-white hover:bg-gray-600">
                                Kembali ke Daftar Menu
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
