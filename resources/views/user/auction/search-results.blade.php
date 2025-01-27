@extends('user.layout.app')

@section('content')
    <div class="container mx-auto p-6">
        <h1 class="text-3xl font-bold mb-4">Hasil Pencarian</h1>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            @foreach($auctionItems as $item)
                <div class="bg-white p-4 rounded-lg shadow-md">
                    <img src="{{ $item->image_url }}" alt="{{ $item->name }}" class="w-full h-48 object-cover rounded-t-lg">
                    <h2 class="text-xl font-semibold mt-4">{{ $item->name }}</h2>
                    <p class="text-gray-700 mt-2">{{ $item->description }}</p>
                    <p class="text-lg font-bold mt-2">Rentang Harga: ${{ number_format($item->starting_price, 2) }}</p>
                    <a href="{{ route('auction.show', $item->id) }}" class="mt-4 block text-center bg-blue-500 text-white py-2 rounded-lg">Lihat Detail</a>
                </div>
            @endforeach
        </div>
    </div>
@endsection
