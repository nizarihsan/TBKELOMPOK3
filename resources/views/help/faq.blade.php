@extends('user.layout.app')

@section('content')
    <div class="container mx-auto p-6">
        <h2 class="text-2xl font-bold mb-4">Help & FAQ</h2>

        <div class="bg-white p-6 rounded-lg shadow-lg">
            <h3 class="text-xl font-semibold">How to Participate in an Auction</h3>
            <p class="text-gray-600">To participate in an auction, you need to register and place a bid on the items you're interested in.</p>

            <h3 class="text-xl font-semibold mt-4">Common Questions</h3>
            <ul>
                <li class="mt-2"><strong>How do I make a bid?</strong> You can place a bid by clicking on the item and entering your bid amount.</li>
                <li class="mt-2"><strong>How do I pay for items I win?</strong> After winning an auction, go to the checkout page to make the payment.</li>
                <li class="mt-2"><strong>Can I return an item?</strong> Returns are handled according to the auction's terms and conditions.</li>
            </ul>
        </div>
    </div>
@endsection
