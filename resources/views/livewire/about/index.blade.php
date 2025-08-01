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
                    <h1 class="text-xl font-bold text-gray-900">Our Crew</h1>
                    <p class="text-sm text-gray-500">Crew Pranayama Social Area</p>
                </div>

                <div class="flex flex-col sm:flex-row gap-4 mt-4 sm:mt-0">
                    <input
                        type="text"
                        wire:model.live.debounce.300ms="search"
                        placeholder="Cari Crew..."
                        class="form-input w-full sm:w-64 px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition"
                    >
                    <a href="{{ route('about.create') }}"
                        class="inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent rounded-md font-semibold text-sm text-white hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                        + Tambah Crew
                    </a>
                </div>
            </div>

            <!-- Crew Cards -->
            <div class="bg-white shadow-xl sm:rounded-lg p-6">
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                    @foreach ($abouts as $crew)
                        <div class="bg-white border border-gray-200 rounded-lg shadow overflow-hidden text-center">
                            <img class="w-full h-48 object-cover" src="{{ asset('storage/' . $crew->photo) }}" alt="{{ $crew->name }}" />

                            <div class="p-4 space-y-1">
                                <h5 class="text-lg font-bold text-gray-900">
                                    {{ $crew->name }}
                                </h5>
                                <p class="text-sm text-gray-600">
                                    {{ $crew->gender === 'male' ? 'Laki-laki' : 'Perempuan' }}
                                </p>
                                <p class="text-sm text-gray-600">
                                    {{ $crew->position }}
                                </p>

                                <!-- Sosial Media -->
                                <div class="mt-2 flex justify-center gap-3">
                                    @if ($crew->instagram)
                                        <a href="{{ $crew->instagram }}" target="_blank" class="text-pink-600 hover:text-pink-800">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="currentColor" viewBox="0 0 24 24">
                                                <path d="M12 2.2c3.2 0 3.6 0 4.9.1 1.2.1 1.8.2 2.2.4.5.2.9.5 1.3.9.4.4.7.8.9 1.3.2.4.3 1 .4 2.2.1 1.3.1 1.7.1 4.9s0 3.6-.1 4.9c-.1 1.2-.2 1.8-.4 2.2-.2.5-.5.9-.9 1.3-.4.4-.8.7-1.3.9-.4.2-1 .3-2.2.4-1.3.1-1.7.1-4.9.1s-3.6 0-4.9-.1c-1.2-.1-1.8-.2-2.2-.4-.5-.2-.9-.5-1.3-.9-.4-.4-.7-.8-.9-1.3-.2-.4-.3-1-.4-2.2-.1-1.3-.1-1.7-.1-4.9s0-3.6.1-4.9c.1-1.2.2-1.8.4-2.2.2-.5.5-.9.9-1.3.4-.4.8-.7 1.3-.9.4-.2 1-.3 2.2-.4C8.4 2.2 8.8 2.2 12 2.2zm0 1.8c-3.1 0-3.5 0-4.7.1-1 .1-1.5.2-1.8.3-.4.1-.6.3-.9.6-.3.3-.5.5-.6.9-.1.3-.3.8-.3 1.8-.1 1.2-.1 1.6-.1 4.7s0 3.5.1 4.7c.1 1 .2 1.5.3 1.8.1.4.3.6.6.9.3.3.5.5.9.6.3.1.8.3 1.8.3 1.2.1 1.6.1 4.7.1s3.5 0 4.7-.1c1-.1 1.5-.2 1.8-.3.4-.1.6-.3.9-.6.3-.3.5-.5.6-.9.1-.3.3-.8.3-1.8.1-1.2.1-1.6.1-4.7s0-3.5-.1-4.7c-.1-1-.2-1.5-.3-1.8-.1-.4-.3-.6-.6-.9-.3-.3-.5-.5-.9-.6-.3-.1-.8-.3-1.8-.3-1.2-.1-1.6-.1-4.7-.1zm0 3.5a5.3 5.3 0 1 1 0 10.6 5.3 5.3 0 0 1 0-10.6zm0 1.8a3.5 3.5 0 1 0 0 7 3.5 3.5 0 0 0 0-7zm5.6-2.2a1.2 1.2 0 1 1-2.4 0 1.2 1.2 0 0 1 2.4 0z"/>
                                            </svg>
                                        </a>
                                    @endif
                                </div>

                                <div class="pt-3">
                                    <a href="{{ route('about.show', $crew->id) }}"
                                       class="text-white bg-blue-600 hover:bg-blue-700 font-medium rounded-md text-sm px-4 py-2">
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
