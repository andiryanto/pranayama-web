<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-full mx-auto sm:px-6 lg:px-8">
            <div class="bg-white p-6 rounded-md shadow border border-gray-300 flex items-center gap-6">
                <!-- Avatar -->
                <img src="{{ Auth::user()->profile_photo_url }}" alt="Avatar" class="w-20 h-20 rounded-full object-cover" />

                <!-- Teks Profil -->
                <div>
                    <div class="font-bold text-lg">{{ Auth::user()->name }}</div>
                    <div class="text-gray-600 text-sm">{{ Auth::user()->email }}</div>
                    <div class="text-gray-400 text-sm italic">{{ Auth::user()->role }}</div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
