<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class CategoryController extends Controller
{
    public function index(Request $request): View
    {
        $search = $request->input('search');

        $query = Category::query();

        if ($search) {
            $query->where('name', 'like', "%{$search}%");
        }

        $categories = $query->paginate(10)->appends(['search' => $search]);

        return view('admin.category.index', compact('categories', 'search'));
    }

    public function edit($id)
    {
        $category = Category::find($id);

        if (!$category) {
            return redirect()
                ->route('dashboard.category.index')
                ->with('status', 'Category not found.');
        }

        return view('admin.category.create', compact('category'));
    }

    public function create(): View
    {
        return view('admin.category.create');
    }

    public function store(Request $request)
    {
        Log::debug($request);

        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
        ]);

        Category::create($validatedData);

        return redirect()
            ->route('dashboard.category.index')
            ->with('status', 'Category created successfully');
    }

    public function update(Request $request, $id)
    {
        $category = Category::find($id);

        if (!$category) {
            return redirect()
                ->route('dashboard.category.index')
                ->with('status', 'Category not found.');
        }

        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $category->name = $request->name;
        $category->save();

        return redirect()
            ->route('dashboard.category.index')
            ->with('status', 'Category updated successfully.');
    }

    public function destroy($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();

        return redirect()
            ->route('dashboard.category.index')
            ->with('status', 'Category deleted successfully.');
    }
}
