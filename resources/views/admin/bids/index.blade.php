@extends('layouts.app')

@section('content')
    <div class="container mx-auto p-6">
        <h2 class="text-2xl font-bold mb-4">Manage Bids</h2>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($bids as $bid)
                <div class="bg-white p-4 rounded-lg shadow-lg">
                    <h3 class="text-xl font-semibold">Bid by {{ $bid->user->name }}</h3>
                    <p>Amount: ${{ number_format($bid->amount, 2) }}</p>
                    <p>Item: {{ $bid->auctionItem->name }}</p>
                </div>
            @endforeach
        </div>
    </div>
@endsection
