<?php

namespace App\Http\Controllers;

use App\Models\AuctionItem;
use App\Models\Bid;
use Illuminate\Http\Request;

class AuctionController extends Controller
{
    public function index()
    {
        $auctionItems = AuctionItem::all();
        return view('auction\index', compact('auctionItems'));
    }

    public function show($id)
    {
        $auctionItem = AuctionItem::with('bids.user')->findOrFail($id);
        return view('auction.show', compact('auctionItem'));
    }

    public function bid(Request $request, $id)
    {
        $auctionItem = AuctionItem::findOrFail($id);

        $request->validate([
            'bid_amount' => 'required|numeric|min:' . $auctionItem->starting_bid,
        ]);

        $bid = new Bid();
        $bid->user_id = auth()->id();
        $bid->auction_item_id = $auctionItem->id;
        $bid->amount = $request->bid_amount;
        $bid->save();

        return redirect()->route('auction.show', $auctionItem->id)->with('success', 'Bid placed successfully!');
    }

    public function auctionHistory()
    {
        $bids = Bid::where('user_id', auth()->id())->get();
        return view('auction-history', compact('bids'));
    }

    public function profile()
    {
        $auctionHistory = auth()->user()->bids()->with('auctionItem')->get();
        return view('user.profile', compact('auctionHistory'));
    }

    public function notifications()
    {
        $user = auth()->user();
        $notifications = $user->notifications ?? collect(); // Ensure it's a collection
        return view('user.notifications', compact('notifications'));
    }

    public function search(Request $request)
    {
        $query = $request->input('query');
        $auctionItems = AuctionItem::where('name', 'LIKE', "%{$query}%")
            ->orWhere('description', 'LIKE', "%{$query}%")
            ->get();

        return view('auction.index', compact('auctionItems'));
    }


    public function placeBid(Request $request, $id)
    {
        $request->validate([
            'bid_amount' => 'required|numeric|min:0',
        ]);

        $item = AuctionItem::findOrFail($id);
        $item->bids()->create([
            'user_id' => auth()->id(),
            'amount' => $request->bid_amount,
        ]);

        return redirect()->route('auction.show', $item->id)->with('success', 'Bid placed successfully.');
    }
}