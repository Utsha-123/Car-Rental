<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    public function index()
    {
        $data = Category::all();
        return view("admin.categories", compact('data'));
    }

    public function create()
    {
        return view('admin.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'slug' => 'required|string|max:255|unique:categories,slug',
            'description' => 'nullable|string'
        ]);

        $imagePaths = [];
        if ($request->hasFile('product_images')) {
            foreach ($request->file('product_images') as $image) {
                $path = $image->store('products', 'public');
                $imagePaths[] = $path;
            }
        }
        Category::create([
            'name' => $request->name,
            'slug' => $request->slug,
            'description' => $request->description,
            'product_images' => json_encode($imagePaths),

        ]);


        return redirect('categories')->with('status', 'Category Created');
    }

    public function edit(int $id)
    {
        $category = Category::findOrFail($id);
        return view('admin.edit', compact('category'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string',
            'slug' => 'required|string|max:255|unique:categories,slug,' . $id,
            'description' => 'nullable|string'
        ]);

        Category::findOrFail($id)->update([
            'name' => $request->name,
            'slug' => $request->slug,
            'description' => $request->description,
        ]);
        return redirect('categories')->with('status', 'Category Updated');
    }

    public function delete(int $id)
    {
        Category::destroy($id);
        return redirect('categories')->with('status', 'Category Delete');
    }
}
