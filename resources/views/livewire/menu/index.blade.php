<div>
    <!-- Messege -->
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
                     <h3 class="text-lg font-medium leading-6 text-gray-900">Menu List</h3>
                     <p class="mt-1 max-w-2xl text-sm text-gray-500">Here you can find all available menu items.</p>
                 </div>
                 <div>
                     <a href="{{ route('menu.create') }}"
                     class="inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent rounded-md font-semibold text-sm text-white hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                         + Tambah Menu
                     </a>
                 </div>
             </div>
            <div class="bg-white shadow-xl sm:rounded-lg p-6">
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                    @foreach ($menus as $menu)
                        <!-- Menu Card -->
                        <div class="bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 overflow-hidden">
                            <img class="w-full h-48 object-cover" src="{{ asset('storage/' . $menu->image) }}" alt="{{ $menu->name }}" />

                            <div class="p-4">
                                <h5 class="text-lg font-semibold tracking-tight text-gray-900 dark:text-white mb-2">
                                    {{ $menu->name }}
                                </h5>

                                <!-- Category -->
                                <div class="flex items-center mb-4">
                                    <span class="inline-block bg-blue-100 text-blue-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-blue-900 dark:text-blue-300">
                                        {{ $menu->category }}
                                    </span>
                                </div>
                                <!-- Price -->
                                <div class="flex items-center mb-4">
                                    <span class="text-gray-900 dark:text-white font-bold text-lg">
                                        Rp. {{ number_format($menu->price, 0, ',', '.') }}
                                    </span>
                                </div>
                                <!-- Detail and delete -->
                                <div class="flex justify-between items-center">
                                    <div class="flex space-x-2">
                                       <!-- Button Detail -->
                                        <a href="{{ route('menu.show', $menu->id) }}" class="inline-flex items-center px-3 py-2 bg-blue-600 border border-transparent rounded-md font-semibold text-sm text-white hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                                            Detail
                                        </a>
                                    </div>
                                </div>    
                            </div>
                        </div>
                        <!-- End Card -->
                    @endforeach
                </div>
            </div>

        </div>
    </div>

</div>
