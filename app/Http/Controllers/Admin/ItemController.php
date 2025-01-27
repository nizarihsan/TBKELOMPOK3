<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Item;
use App\Models\Category;

class ItemController extends Controller
{
    /**
     * Display a listing of the items.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $items = Item::latest()->get();
        return view('admin.items.index', compact('items'));
    }

    /**
     * Show the form for creating a new item.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function create()
    {
        $categories = Category::all();
        return response()->view('admin.items.create', compact('categories'));
    }

    /**
     * Store a newly created item in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|max:255',
            'description' => 'required',
            'price' => 'required|numeric|min:0',
            'starting_price' => 'required|numeric|min:0',
            'status' => 'required|in:available,sold,pending',
            'brand' => 'nullable|max:255',
            'weight' => 'nullable|numeric|min:0',
            'category_id' => 'required|exists:categories,id',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048'
        ]);

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('items', 'public');
            $validated['image_path'] = $imagePath;
        }

        Item::create($validated);

        return redirect()->route('admin.items.index')
            ->with('success', 'Item created successfully.');
    }

    /**
     * Display the specified item.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function show($id)
    {
        $item = Item::findOrFail($id);
        return view('admin.items.show', compact('item'));
    }

    /**
     * Show the form for editing the specified item.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit($id)
    {
        $item = Item::findOrFail($id);
        $categories = Category::all();
        return view('admin.items.edit', compact('item', 'categories'));
    }

    /**
     * Update the specified item in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|max:255',
            'description' => 'required',
            'price' => 'required|numeric|min:0',
            'starting_price' => 'required|numeric|min:0',
            'status' => 'required|in:available,sold,pending',
            'brand' => 'nullable|max:255',
            'weight' => 'nullable|numeric|min:0',
            'category_id' => 'required|exists:categories,id',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048'
        ]);

        $item = Item::findOrFail($id);

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('items', 'public');
            $item->image_path = $imagePath;
        }

        $item->update($request->all());

        return redirect()->route('admin.items.index')->with('success', 'Item updated successfully');
    }

    /**
     * Remove the specified item from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $item = Item::findOrFail($id);
        $item->delete();

        return redirect()->route('admin.items.index')->with('success', 'Item deleted successfully');
    }
}
