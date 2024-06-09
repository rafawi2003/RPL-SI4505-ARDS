<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Daftar Pemintaan') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    @if(session('success'))
                        <script>
                            document.addEventListener('DOMContentLoaded', function() {
                                toastr.success('{{ session('success') }}');
                            });
                        </script>
                    @endif

                    <h1 class="mb-4 text-xl font-bold text-center">Daftar Permintaan Bantuan Anda</h1>

                    <div class="flex justify-start mb-4">
                        <a href="{{ route('help.create') }}" class="px-4 py-2 bg-red-500 text-white rounded-md hover:bg-red-600">Buat Permintaan</a>
                    </div>

                    <div class="overflow-x-auto">
                        <table class="min-w-full bg-white border">
                            <thead class="bg-gray-100">
                                <tr>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider border">No</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider border">Permintaan</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider border">Status</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider border">Updated At</th> <!-- Kolom baru untuk Updated At -->
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @forelse($helps as $index => $help)
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap border">{{ $loop->iteration }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap border">{{ $help->permintaan }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap border">
                                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full 
                                                @if($help->status == 'menunggu persetujuan') bg-yellow-100 text-yellow-800
                                                @elseif($help->status == 'dikerjakan') bg-amber-100 text-amber-800
                                                @elseif($help->status == 'selesai') bg-green-100 text-green-800
                                                @else bg-red-100 text-red-800
                                                @endif">
                                                {{ ucwords($help->status) }}
                                            </span>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap border">{{ $help->updated_at }}</td> <!-- Kolom baru untuk Updated At -->
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5" class="px-6 py-4 text-center text-gray-500">
                                            Tidak ada data permintaan.
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
