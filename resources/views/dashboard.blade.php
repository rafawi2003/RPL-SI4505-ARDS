<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    @if(Auth::check() && Auth::user()->kamar == NULL)
                        @if(Auth::check() && Auth::user()->status == 'Belum Melakukan Check-in')
                            <p>Silahkan Melakukan Check-in untuk Mendapatkan Kamar</p>
                            <form action="{{ route('profile.checkin') }}" method="POST">
                                @csrf
                                <button type="submit" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
                                    Check In
                                </button>
                            </form>
                        @elseif(Auth::check() && Auth::user()->status == 'Menunggu Update oleh Admin')
                            <p>Anda sudah melakukan Check-in, namun kamar Anda sedang menunggu update oleh Admin.</p>
                        @endif
                    @else
                        <p>Selamat datang penghuni kamar {{ Auth::user()->kamar }} !</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>