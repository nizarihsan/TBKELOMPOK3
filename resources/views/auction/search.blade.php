@extends('user.layout.app')

@section('content')
    <div class="container mx-auto p-6">
        <h2 class="text-2xl font-bold mb-4">Hasil Pencarian Untuk "{{ $query }}"</h2>

        @if($items->isEmpty())
            <p class="text-gray-500">Barang Tidak ditemukan.</p>
        @else
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach($items as $item)
                    <div class="bg-white p-4 rounded-lg shadow-lg">
                        <img src="{{ asset('storage/'.$item->image) }}" alt="{{ $item->name }}" class="w-full h-48 object-cover rounded-md">
                        <h3 class="text-xl font-semibold mt-4">{{ $item->name }}</h3>
                        <p class="text-gray-600">Starting Price: ${{ number_format($item->starting_price, 2) }}</p>
                        <a href="{{ route('auction.details', $item->id) }}" class="text-blue-500 hover:underline">Lihat Detail</a>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
@endsection
