<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index() {
        $categories = Category::all();
        return view('categories', ['categories' => $categories]);
    }

    public function show(Category $category) {
        return view('category-show', ['category' => $category]);
    }

     public function create() {
        return view('category-create');
    }

    public function store(Request $request) {
        $request->validate([
            'name' => 'required|min:3|max:255',
            'description' => 'max:500'
        ]);

        Category::create($request->only(['name', 'description']));
        return redirect('/categories')->with('success', 'Категория успешно создана!');
    }

    public function edit(Category $category) {     
        return view('category-edit', ['category' => $category]);
    }

    public function update(Request $request, Category $category) {
        $request->validate([
            'name' => 'required|min:3|max:255',
            'description' => 'max:500'
        ]);

        $category->update($request->only(['name', 'description']));
        return redirect('/categories')->with('success', 'Категория успешно обновлена!');
    }

    public function destroy(Category $category) {
        $category->delete();
        return redirect('/categories')->with('success', 'Категория успешно удалена!');
    }

    public function apiIndex() {
        return response()->json(Category::all());
    }
}
