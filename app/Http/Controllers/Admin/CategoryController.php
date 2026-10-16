<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::orderBy('id', 'DESC')->paginate(10);

        return view('admin.categories.index', compact('categories'));
    }

    public function create()
    {
        return view('admin.categories.create');
    }

    public function store(Request $request)
    {
        Category::create([
            'name' => $request->name,
        ]);

        return redirect()->route('admin.categories.index');
    }

    public function edit(string $id)
    {
        $category = Category::find($id);

        return view('admin.categories.edit', compact('category'));
    }

    public function update(Request $request, string $id)
    {
        $category = Category::find($id);

        $category->update([
            'name' => $request->name,
        ]);

        return redirect()->route('admin.categories.index');
    }

    public function destroy(string $id)
    {
        $category = Category::find($id);

        $category->delete();

        return redirect()->route('admin.categories.index');
    }
}