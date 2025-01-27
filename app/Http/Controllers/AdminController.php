<?php

namespace App\Http\Controllers;

use App\Models\AuctionItem;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Bid;
use App\Models\Transaction;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function showDashboard()
    {
        $stats = [
            'newUsers' => User::whereDate('created_at', today())->count(),
            'totalOrders' => Transaction::count(),
            'availableProducts' => AuctionItem::where('status', 'active')->count(),
        ];

        $users = User::select('users.*',
                            DB::raw('(SELECT COUNT(*) FROM transactions WHERE transactions.user_id = users.id) as order_count'))
                     ->latest()
                     ->paginate(10);

        return view('admin.dashboard', compact('stats', 'users'));
    }

    public function managePayments()
    {
        $payments = Transaction::with('user')->latest()->get();
        return view('admin.payments.index', compact('payments'));
    }

    public function manageItem($id)
    {
        $item = AuctionItem::findOrFail($id);
        return view('admin.manage-item', compact('item'));
    }

    public function updateItem(Request $request, $id)
    {
        $item = AuctionItem::findOrFail($id);
        $item->update($request->all());
        return redirect()->route('admin.dashboard')->with('success', 'Item updated successfully');
    }

    public function index()
    {
        $items = AuctionItem::all();
        return view('admin.items.index', compact('items'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('admin.items.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'starting_price' => 'required|numeric|min:0',
            'status' => 'required|string',
            'price' => 'required|numeric',
            'brand' => 'required|string',
            'weight' => 'required|numeric',
            'category_id' => 'required|string',      ]);

        AuctionItem::create($request->all());
        return redirect()->route('admin.items.index')->with('success', 'Item created successfully.');
    }

    public function edit($id)
    {
        $item = AuctionItem::findOrFail($id);
        return view('admin.items.edit', compact('item'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'starting_price' => 'required|numeric|min:0',
            'status' => 'required|string',
        ]);

        $item = AuctionItem::findOrFail($id);
        $item->update($request->all());

        return redirect()->route('admin.items.index')->with('success', 'Item updated successfully.');
    }

    public function destroy($id)
    {
        $item = AuctionItem::findOrFail($id);
        $item->delete();

        return redirect()->route('admin.items.index')->with('success', 'Item deleted successfully.');
    }

    public function show($id)
    {
        $item = AuctionItem::findOrFail($id);
        return view('admin.items.show', compact('item'));
    }

    public function auctionHistory()
    {
        $transactions = Transaction::all();
        return view('admin.auction-history', compact('transactions'));
    }

    public function manageBids()
    {
        $bids = Bid::all();
        return view('admin.bids.index', compact('bids'));
    }

    public function transactionReports()
    {
        $transactions = Transaction::all();
        return view('admin.transactions.index', compact('transactions'));
    }

    // User Management Methods
    public function listUsers()
    {
        $users = User::all();
        return view('admin.users.index', compact('users'));
    }

    public function createUser()
    {
        return view('admin.users.create');
    }

    public function storeUser(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
            'role' => 'required|string|in:admin,user',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'role' => $request->role,
        ]);

        return redirect()->route('admin.users.index')->with('success', 'User created successfully.');
    }

    public function editUser($id)
    {
        $user = User::findOrFail($id);
        return view('admin.users.edit', compact('user'));
    }

    public function updateUser(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $id,
            'password' => 'nullable|string|min:8',
            'role' => 'required|string|in:admin,user',
        ]);

        $user = User::findOrFail($id);
        $user->name = $request->name;
        $user->email = $request->email;
        if ($request->password) {
            $user->password = bcrypt($request->password);
        }
        $user->role = $request->role;
        $user->save();

        return redirect()->route('admin.users.index')->with('success', 'User updated successfully.');
    }

    public function deleteUser($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('admin.users.index')->with('success', 'User deleted successfully.');
    }
}
