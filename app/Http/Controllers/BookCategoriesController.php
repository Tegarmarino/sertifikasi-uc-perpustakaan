<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BookCategoriesModel;

class BookCategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = BookCategoriesModel::all();
        return view('book_categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('book_categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi data
        $request->validate([
            'name' => 'required|string|max:255|unique:book_categories,name',
        ]);

        // Simpan kategori baru
        BookCategoriesModel::create([
            'name' => $request->name,
        ]);

        return redirect()->route('book_categories.index')->with('success', 'Category created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $category = BookCategoriesModel::with('books')->findOrFail($id);
        return view('book_categories.show', compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $category = BookCategoriesModel::findOrFail($id);
        return view('book_categories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Validasi data
        $request->validate([
            'name' => 'required|string|max:255|unique:book_categories,name,' . $id,
        ]);

        // Cari dan update kategori
        $category = BookCategoriesModel::findOrFail($id);
        $category->update([
            'name' => $request->name,
        ]);

        return redirect()->route('book_categories.index')->with('success', 'Category updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $category = BookCategoriesModel::findOrFail($id);
        $category->books()->detach(); // Hapus relasi dengan buku
        $category->delete();

        return redirect()->route('book_categories.index')->with('success', 'Category deleted successfully.');
    }
}
