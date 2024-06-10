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
                                <th class="px-4 py-2 text-center">Lantai</th>
                                <th class="px-4 py-2 text-center">Kamar</th>
                                <th class="px-4 py-2 text-center">NIM Penghuni</th>
                                <th class="px-4 py-2 text-center">Nama Penghuni</th>
                                <th class="px-4 py-2 text-center">Jurusan</th>
                                <th class="px-4 py-2 text-center">Nomor Telepon</th>
                                 <!-- Kolom baru -->
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($rooms as $room)
                                <tr>
                                    <td class="border px-4 py-2 text-center">{{ $room->lantai }}</td>
                                    <td class="border px-4 py-2 text-center">{{ $room->kamar }}</td>
                                    <td class="border px-4 py-2 text-center">{{ $room->penghuni }}</td>
                                    <td class="border px-4 py-2 text-center">{{ $room->user ? $room->user->name : 'Tidak ada penghuni' }}</td>
                                    <td class="border px-4 py-2 text-center">{{ $room->user ? $room->user->jurusan : 'Tidak ada jurusan' }}</td> <!-- Data jurusan -->
                                    <td class="border px-4 py-2 text-center">{{ $room->user ? $room->user->nomor_telepon : 'Tidak ada nomor telepon' }}</td>
                                    
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
