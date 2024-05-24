<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tentang Asrama') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-gray-100 border-b border-gray-200">
                    <h1 class="text-3xl font-bold text-gray-800">Gedung Asrama</h1>
                    <p class="mt-2 text-lg text-gray-600"></p>
                </div>
                <div class="p-6 bg-gray-100 border-t border-gray-200">
                    <h2 class="text-xl font-semibold text-gray-800 mb-4"></h2>
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
                        <a href="{{ route('putra.index') }}" class="bg-white rounded-lg shadow-md p-4 block hover:bg-gray-50 transition duration-200">
                            <h3 class="text-lg font-semibold text-gray-800">Gedung Asrama Putra</h3>
                            <p class="text-gray-600"></p>
                        </a>
                        <a href="{{ route('putri.index') }}" class="bg-white rounded-lg shadow-md p-4 block hover:bg-gray-50 transition duration-200">
                            <h3 class="text-lg font-semibold text-gray-800">Gedung Asrama Putri</h3>
                            <p class="text-gray-600"></p>
                        </a>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>