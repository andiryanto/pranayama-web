<div>
    <!-- Message -->
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
                    <h1 class="text-xl font-bold text-gray-900">Event List</h1>
                    <p class="text-sm text-gray-500">Event Pranayama Social Area</p>
                </div>

                <div class="flex flex-col sm:flex-row gap-4 mt-4 sm:mt-0">
                    <input
                        type="text"
                        wire:model.live.debounce.300ms="search"
                        placeholder="Cari event..."
                        class="form-input w-full sm:w-64 px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition"
                    >
                    <a href="{{ route('event.create') }}"
                        class="inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent rounded-md font-semibold text-sm text-white hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                        + Tambah Event
                    </a>
                </div>
            </div>

            <!-- Event Cards -->
            <div class="bg-white shadow-xl sm:rounded-lg p-6">
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                    @foreach ($events as $event)
                        <!-- Event Card -->
                        <div class="bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 overflow-hidden">
                            <img class="w-full h-48 object-cover" src="{{ asset('storage/' . $event->image) }}" alt="{{ $event->name }}" />

                            <div class="p-4 flex flex-col space-y-2">
                                <!-- Nama -->
                                <h5 class="text-lg font-semibold tracking-tight text-gray-900 dark:text-white">
                                    {{ $event->name }}
                                </h5>

                                <!-- Tanggal -->
                                <span class="inline-block bg-green-100 text-green-800 text-xs font-medium px-2.5 py-0.5 rounded dark:bg-green-900 dark:text-green-300">
                                    {{ $event->date }}
                                </span>

                                <!-- Deskripsi -->
                                <p class="text-sm text-gray-600 dark:text-gray-300">
                                    {{ Str::limit($event->description, 100) }}
                                </p>

                                <!-- Kategori -->
                                <span class="inline-block bg-yellow-100 text-yellow-800 text-xs font-semibold px-2.5 py-0.5 rounded dark:bg-yellow-900 dark:text-yellow-300">
                                    {{ $event->category }}
                                </span>

                                <!-- Lokasi dan Button -->
                                <div class="flex items-center justify-between pt-2">
                                    <span class="text-sm font-semibold text-gray-900 dark:text-white">
                                        {{ $event->location }}
                                    </span>
                                    <a href="{{ route('event.show', $event->id) }}"
                                       class="text-white bg-blue-600 hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-md text-sm px-4 py-2 dark:bg-blue-500 dark:hover:bg-blue-600 dark:focus:ring-blue-700">
                                        Detail
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

        </div>
    </div>
</div>
