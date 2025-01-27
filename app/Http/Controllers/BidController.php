<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bid;

class BidController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $bids = Bid::with(['user', 'auctionItem'])->paginate(10);
        return view('admin.bids.index', compact('bids'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Not typically used for bids as they're created through auctions
        abort(404);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Typically handled through AuctionController
        abort(404);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $bid = Bid::with(['user', 'auctionItem'])->findOrFail($id);
        return view('admin.bids.show', compact('bid'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        // Bids are typically not editable
        abort(404);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Bids are typically not updatable
        abort(404);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $bid = Bid::findOrFail($id);
        $bid->delete();
        
        return redirect()->route('admin.bids.index')
            ->with('success', 'Bid deleted successfully');
    }
}
