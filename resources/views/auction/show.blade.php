@extends('user.layout.app')

@section('content')
<div class="container mx-auto p-6">
    <div class="bg-white p-6 rounded-lg shadow-lg">
        <img src="{{ asset('storage/'.$auctionItem->image) }}" alt="{{ $auctionItem->name }}" class="w-full h-64 object-cover rounded-md">
        <h2 class="text-3xl font-bold mt-4">{{ $auctionItem->name }}</h2>
        <p class="text-gray-600 mt-2">{{ $auctionItem->description }}</p>
        <p class="text-lg font-bold mt-4">Rentang Harga: ${{ number_format($auctionItem->starting_bid, 2) }}</p>
        <p class="text-sm text-gray-500">Waktu Tersisa: {{ $auctionItem->time_remaining }} menit</p>

        <form action="{{ route('auction.bid', $auctionItem->id) }}" method="POST" class="mt-4">
            @csrf
            <div class="flex flex-col">
                <label for="bid_amount" class="text-lg font-bold mb-2">Masukkan Penawaran:</label>
                <input type="number" id="bid_amount" name="bid_amount" class="w-full p-2 border rounded-md mb-4" placeholder="Enter your bid" required>
                <button type="submit" class="bg-green-500 text-white py-2 px-4 rounded-md">Pasang Penawaran</button>
            </div>
        </form>

        <h3 class="text-xl font-semibold mt-6">Riwayat Penawaran</h3>
        <ul>
            @foreach($auctionItem->bids as $bid)
                <li class="mt-2">{{ $bid->user->name }}: ${{ number_format($bid->amount, 2) }}</li>
            @endforeach
        </ul>
    </div>
</div>
@endsection

