<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Gedung Asrama Putra') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h2 class="text-2xl font-bold text-gray-800">Pilih Gedung</h2>
                    <div class="mt-4 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
                        @for ($i = 1; $i <= 10; $i++)
                            <a href="{{ route('asrama.putra.gedung', ['gedung' => 'a0' . $i]) }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                Gedung A0{{ $i }}
                            </a>
                        @endfor
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>