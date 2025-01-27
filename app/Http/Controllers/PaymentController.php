<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AuctionItem;
use App\Models\Payment;
use App\Models\Transaction;
use Illuminate\Support\Facades\Validator;

class PaymentController extends Controller
{
    public function checkout($id)
    {
        $item = AuctionItem::findOrFail($id);
        return view('checkout', compact('item'));
    }

    public function processPayment(Request $request, $id)
    {
        // Validate the request data
        $validator = Validator::make($request->all(), [
            'amount' => 'required|numeric|min:0',
            'transaction_id' => 'required|string|unique:payments,transaction_id',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Create a new payment record
        $payment = Payment::create([
            'transaction_id' => $request->transaction_id,
            'user_id' => auth()->id(),
            'amount' => $request->amount,
            'status' => 'pending',
        ]);

        // Create a new transaction record
        $transaction = Transaction::create([
            'payment_id' => $payment->id,
            'auction_item_id' => $id,
            'status' => 'pending',
        ]);

        // Redirect with success message
        return redirect()->route('auction.show', $id)->with('success', 'Payment processed successfully!');
    }

    public function index()
    {
        $payments = Payment::with(['user', 'transaction'])
                         ->latest()
                         ->paginate(10);
        return view('admin.payments.index', compact('payments'));
    }

    public function updateStatus(Request $request, Payment $payment)
    {
        $request->validate([
            'status' => 'required|in:pending,approved,rejected'
        ]);

        $payment->update(['status' => $request->status]);
        return redirect()->back()->with('success', 'Payment status updated');
    }
}
