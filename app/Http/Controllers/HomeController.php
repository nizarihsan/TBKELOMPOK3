<?php

namespace App\Http\Controllers;

use App\Models\AuctionItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; // Import Auth

class HomeController extends Controller
{
    public function index()
    {

    $auctionItems = AuctionItem::where('status', 'active')->get();
            return view('home', compact('auctionItems'));
    }


}
