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
            <div class="px-4 py-5 sm:px-6 flex items-center justify-between">
                <div>
                    <h3 class="text-lg font-medium leading-6 text-gray-900">Promo List</h3>
                    <p class="mt-1 max-w-2xl text-sm text-gray-500">Promo Pranayama Social Area</p>
                </div>
                <div>
                    <a href="{{ route('promo.create') }}"
                        class="inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent rounded-md font-semibold text-sm text-white hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                        + Tambah Promo
                    </a>
                </div>
            </div>

            <!-- Promo Cards -->
            <div class="bg-white shadow-xl sm:rounded-lg p-6">
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                    @foreach ($promos as $promo)
                        <div class="bg-white border border-gray-200 rounded-lg shadow overflow-hidden">
                            <img class="w-full h-48 object-cover" src="{{ asset('storage/' . $promo->promo_image) }}" alt="{{ $promo->name }}" />

                            <div class="p-4">
                                <h5 class="text-lg font-semibold tracking-tight text-gray-900 mb-2">
                                    {{ $promo->name }}
                                </h5>

                                <!-- Tanggal -->
                                <p class="text-sm text-gray-600 mb-1">Mulai: {{ $promo->start_date }}</p>
                                <p class="text-sm text-gray-600 mb-3">Berakhir: {{ $promo->expiried_date }}</p>

                                <!-- Tombol Aksi -->
                                <div class="flex justify-end pt-2 mt-auto">
                                    <div class="flex space-x-2">
                                        <!-- Detail -->
                                        <a href="{{ route('promo.show', $promo->id) }}"
                                            class="inline-flex items-center px-3 py-2 bg-blue-600 border border-transparent rounded-md font-semibold text-sm text-white hover:bg-blue-700">
                                            Detail
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

        </div>
    </div>
</div>
