<div>
    <!-- Flash Message -->
    @if (session()->has('message'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
            <strong class="font-bold">Success!</strong>
            <span class="block sm:inline">{{ session('message') }}</span>
        </div>
    @endif

    <!-- Header -->
    <div class="py-4">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between mb-6 gap-4">
                <div>
                    <h3 class="text-xl font-bold leading-6 text-gray-900">Promo List</h3>
                    <p class="mt-1 max-w-2xl text-sm text-gray-500">Promo Pranayama Social Area</p>
                </div>

                <div class="flex flex-col sm:flex-row gap-4 w-full sm:w-auto">
                    <!-- Search Form -->
                    <form method="GET" action="{{ route('promo.index') }}" class="w-full sm:w-auto">
                        <input
                            type="text"
                            name="search"
                            value="{{ request('search') }}"
                            placeholder="Cari Promo..."
                            class="form-input w-full sm:w-64 px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition"
                        >
                    </form>

                    <!-- Tambah Promo -->
                    <a href="{{ route('promo.create') }}"
                        class="inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent rounded-md font-semibold text-sm text-white hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                        + Tambah Promo
                    </a>
                </div>
            </div>

            <!-- Promo Cards -->
            <div class="bg-white shadow-xl sm:rounded-lg p-6">
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                    @forelse ($promos as $promo)
                        <div class="bg-white border border-gray-200 rounded-lg shadow overflow-hidden flex flex-col justify-between h-full">
                            <img 
                                class="w-full h-48 object-cover" 
                                src="{{ $promo->promo_image ? asset('storage/' . $promo->promo_image) : asset('default-image.jpg') }}" 
                                alt="{{ $promo->name }}" 
                            />

                            <div class="flex flex-col flex-1 justify-between p-4">
                                <div>
                                    <h5 class="text-lg font-semibold tracking-tight text-gray-900 mb-2">
                                        {{ $promo->name }}
                                    </h5>
                                    <!-- Tanggal -->
                                    <p class="text-sm text-gray-600 mb-1">Mulai: {{ $promo->start_date }}</p>
                                    <p class="text-sm text-gray-600 mb-1">Berakhir: {{ $promo->expiried_date }}</p>
                                </div>

                                <!-- Tombol Detail di kanan bawah -->
                                <div class="flex justify-end mt-4">
                                    <a href="{{ route('promo.show', $promo->id) }}"
                                        class="inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent rounded-md font-semibold text-sm text-white hover:bg-blue-700">
                                        Detail
                                    </a>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="col-span-full text-center text-gray-500">
                            Tidak ada promo ditemukan.
                        </div>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</div>
