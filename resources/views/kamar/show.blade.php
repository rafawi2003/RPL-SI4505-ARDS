<!-- resources/views/asrama/show.blade.php -->
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Informasi Penghuni') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-gray-100 border-b border-gray-200">
                    <h1 class="text-3xl font-bold text-gray-800">Gedung Asrama {{ $gender === 'putra' ? 'Putra' : 'Putri' }} - {{ $gedung }}</h1>
                </div>
                <div class="p-6 bg-gray-100 border-t border-gray-200">
                    <table class="table-auto w-full">
                        <thead>
                            <tr>
                                <th class="px-4 py-2">Lantai</th>
                                <th class="px-4 py-2">Kamar</th>
                                <th class="px-4 py-2">Tempat Tidur 1</th>
                                <th class="px-4 py-2">Tempat Tidur 2</th>
                                <th class="px-4 py-2">Tempat Tidur 3</th>
                                <th class="px-4 py-2">Tempat Tidur 4</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($rooms as $room)
                                <tr>
                                    <td class="border px-4 py-2">{{ $room->lantai }}</td>
                                    <td class="border px-4 py-2">{{ $room->kamar }}</td>
                                    <td class="border px-4 py-2">{{ $room->bed1User ? $room->bed1User->$name : '' }}</td>
                                    <td class="border px-4 py-2">{{ $room->bed2User ? $room->bed2User->$name : '' }}</td>
                                    <td class="border px-4 py-2">{{ $room->bed3User ? $room->bed3User->$name : '' }}</td>
                                    <td class="border px-4 py-2">{{ $room->bed4User ? $room->bed4User->$name : '' }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>