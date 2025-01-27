@extends('layouts.app')

@section('content')
    <div class="container mx-auto p-6">
        <div class="bg-white p-4 rounded-lg shadow-md">
            <img src="{{ $auctionItem->image_url }}" alt="{{ $auctionItem->name }}" class="w-full h-48 object-cover rounded-t-lg">
            <h2 class="text-3xl font-semibold mt-4">{{ $auctionItem->name }}</h2>
            <p class="text-gray-700 mt-2">{{ $auctionItem->description }}</p>
            <p class="text-lg font-bold mt-2">Starting Price: ${{ number_format($auctionItem->starting_price, 2) }}</p>
            <form method="POST" action="{{ route('auction.bid', $auctionItem->id) }}" class="mt-4">
                @csrf
                <input type="number" name="bid_amount" class="border p-2 rounded-md" placeholder="Enter your bid" required>
                <button type="submit" class="mt-2 w-full bg-green-500 text-white py-2 rounded-lg">Place Bid</button>
            </form>
        </div>
    </div>
@endsection

<script>
    const auctionEndTime = new Date("{{ $auctionItem->auction_end_time }}").getTime();
    
    const countdownTimer = setInterval(() => {
        const now = new Date().getTime();
        const timeLeft = auctionEndTime - now;
        
        if (timeLeft <= 0) {
            clearInterval(countdownTimer);
            document.getElementById('countdown').innerHTML = "Auction Ended";
        } else {
            const hours = Math.floor((timeLeft % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            const minutes = Math.floor((timeLeft % (1000 * 60 * 60)) / (1000 * 60));
            const seconds = Math.floor((timeLeft % (1000 * 60)) / 1000);
            
            document.getElementById('countdown').innerHTML = `${hours}h ${minutes}m ${seconds}s`;
        }
    }, 1000);
</script>
<p id="countdown" class="text-lg font-bold mt-4"></p>

