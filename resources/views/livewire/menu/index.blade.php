<div>
    <!-- Success Message -->
    @if (session()->has('message'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
            <strong class="font-bold">Success!</strong>
            <span class="block sm:inline">{{ session('message') }}</span>
        </div>
    @endif

    <!-- Header -->
    <div class="py-4">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between mb-6">
                <div>
                    <h1 class="text-xl font-bold text-gray-900">Menu List</h1>
                    <p class="text-sm text-gray-500">Menu Produk Pranayama Social Area</p>
                </div>

                <div class="flex flex-col sm:flex-row gap-4 mt-4 sm:mt-0">
                    <input
                        type="text"
                        wire:model.live.debounce.300ms="search"
                        placeholder="Cari Produk..."
                        class="form-input w-full sm:w-64 px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition"
                    >
                    <a href="{{ route('menu.create') }}"
                        class="inline-flex items-center justify-center px-4 py-2 bg-blue-600 border border-transparent rounded-md font-semibold text-sm text-white hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                        + Tambah Menu
                    </a>
                </div>
            </div>

            <!-- Menu Cards -->
            <div class="bg-white shadow-xl sm:rounded-lg p-6">
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                    @foreach ($menus as $menu)
                        <!-- Menu Card -->
                        <div class="bg-white border border-gray-200 rounded-lg shadow overflow-hidden">
                            <img class="w-full h-48 object-cover" src="{{ asset('storage/' . $menu->image) }}" alt="{{ $menu->name }}" />

                            <div class="p-4 flex flex-col h-full">
                                <h5 class="text-lg font-semibold tracking-tight text-gray-900 mb-2">
                                    {{ $menu->name }}
                                </h5>

                                <!-- Category -->
                                <span class="inline-block bg-blue-100 text-blue-800 text-xs font-medium px-2.5 py-0.5 rounded mb-2">
                                    {{ $menu->category }}
                                </span>

                                <!-- Price -->
                                <div class="mb-4">
                                    <span class="text-gray-900 font-bold text-lg">
                                        Rp. {{ number_format($menu->price, 0, ',', '.') }}
                                    </span>
                                </div>

                                <!-- Action Buttons -->
                                <div class="mt-auto pt-2">
                                    <a href="{{ route('menu.show', $menu->id) }}"
                                        class="text-white bg-blue-600 hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-md text-sm px-4 py-2">
                                        Detail
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <!-- End Menu Cards -->
        </div>
    </div>
</div>
