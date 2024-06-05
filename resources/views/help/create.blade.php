<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Buat Permintaan') }}
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

                    <h1 class="mb-4">Buat Permintaan</h1>

                    <form action="{{ route('help.store') }}" method="POST">
                        @csrf
                        <div class="mb-4">
                            <label for="nim" class="block text-sm font-medium text-gray-700">NIM</label>
                            <input type="text" name="nim" id="nim" value="{{ Auth::user()->nim }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-red-300 focus:ring focus:ring-red-200 focus:ring-opacity-50" readonly style="background-color: #f4f4f4; opacity: 1; color: #666;" />
                        </div>
                        
                        <div class="mb-4">
                            <label for="room_number" class="block text-sm font-medium text-gray-700">Nomor Kamar</label>
                            <input type="text" name="room_number" id="room_number" value="{{ Auth::user()->kamar }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-red-300 focus:ring focus:ring-red-200 focus:ring-opacity-50" readonly style="background-color: #f4f4f4; opacity: 1; color: #666;" />
                        </div>

                        <div class="mb-4">
                            <label for="permintaan" class="block text-sm font-medium text-gray-700">Permintaan Bantuan</label>
                            <textarea name="permintaan" id="permintaan" rows="3" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-red-300 focus:ring focus:ring-red-200 focus:ring-opacity-50" required></textarea>
                        </div>
                        
                        <div class="mb-4">
                            <button type="submit" class="px-4 py-2 bg-red-500 text-white rounded-md">Submit</button>
                        </div>
                    </form>
                    
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
