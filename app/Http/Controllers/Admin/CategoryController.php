<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    /**
     * Display a listing of the categories.
     */
    public function index()
    {
        $categories = Category::all();
        return view('admin.categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new category.
     */
    public function create()
    {
        return view('admin.categories.create');
    }

    /**
     * Store a newly created category in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'description' => 'nullable'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        Category::create($request->all());
        return redirect()->route('admin.categories.index')->with('success', 'Category created');
    }

    /**
     * Show the form for editing the specified category.
     */
    public function edit(Category $category)
    {
        return view('admin.categories.edit', compact('category'));
    }

    /**
     * Update the specified category in storage.
     */
    public function update(Request $request, Category $category)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'description' => 'nullable'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $category->update($request->all());
        return redirect()->route('admin.categories.index')->with('success', 'Category updated');
    }

    /**
     * Remove the specified category from storage.
     */
    public function destroy($id)
    {
        $item = Category::findOrFail($id);
        $item->delete();

        return redirect()->route('admin.categories.index')->with('success', 'Category deleted successfully');
    }

    /**
     * Display the specified category with filters.
     */
    public function show(Request $request, Category $category)
    {
        $query = $category->items()->with('category')->where('is_active', true);

        // Apply price filter
        if ($request->filled('min_price')) {
            $query->where('current_price', '>=', $request->min_price);
        }
        if ($request->filled('max_price')) {
            $query->where('current_price', '<=', $request->max_price);
        }

        // Apply status filter
        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        // Get items with pagination
        $items = $query->latest()->paginate(12);

        return view('admin.categories.show', compact('category', 'items'))->with('success', 'Items loaded successfully');
    }
}
