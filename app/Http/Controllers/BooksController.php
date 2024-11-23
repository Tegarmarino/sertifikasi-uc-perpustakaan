<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BooksModel;
use App\Models\BookCategoriesModel;
use App\Models\MembersModel;

class BooksController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // Query awal untuk mengambil buku dengan relasi
        $query = BooksModel::with(['member', 'categories']);

        // Filter berdasarkan member
        if ($request->has('member_id') && $request->member_id) {
            $query->where('member_id', $request->member_id);
        }

        // Filter berdasarkan kategori
        if ($request->has('category_id') && $request->category_id) {
            $query->whereHas('categories', function ($q) use ($request) {
                $q->where('id', $request->category_id);
            });
        }

        // Ambil data buku berdasarkan filter
        $books = $query->get();

        // Ambil data members dan categories untuk dropdown filter
        $members = MembersModel::all();
        $categories = BookCategoriesModel::all();

        return view('books.index', compact('books', 'members', 'categories'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Fetch all categories and members to populate in the form
        $categories = BookCategoriesModel::all();
        $members = MembersModel::all();

        return view('books.create', compact('categories', 'members'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the request data
        $request->validate([
            'title' => 'required|string|max:255|unique:books,title',
            'author' => 'required|string|max:255',
            'publisher' => 'required|string|max:255',
            'published_date' => 'required|date',
            'number_of_pages' => 'required|integer|min:1',
            'member_id' => 'nullable|exists:members,id',
            'categories' => 'array',
            'categories.*' => 'exists:book_categories,id',
        ]);

        // Create the book
        $book = BooksModel::create($request->only([
            'title',
            'author',
            'publisher',
            'published_date',
            'number_of_pages',
            'member_id',
        ]));

        // Attach categories to the book
        $book->categories()->attach($request->categories);

        return redirect()->route('books.index')->with('success', 'Book created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        // Pastikan relasi 'member' dan 'categories' ada di BooksModel
        $book = BooksModel::with(['member', 'categories'])->findOrFail($id);
        return view('books.show', compact('book'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        // Fetch the book along with its categories and members
        $book = BooksModel::with(['categories'])->findOrFail($id);
        $categories = BookCategoriesModel::all();
        $members = MembersModel::all();

        return view('books.edit', compact('book', 'categories', 'members'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Validasi data
        $request->validate([
            'title' => 'required|string|max:255|unique:books,title,' . $id,
            'author' => 'required|string|max:255',
            'publisher' => 'required|string|max:255',
            'published_date' => 'required|date',
            'number_of_pages' => 'required|integer|min:1',
            'member_id' => 'nullable|exists:members,id',
            'categories' => 'required|array',
            'categories.*' => 'exists:book_categories,id',
        ]);

        // Cari buku yang akan diperbarui
        $book = BooksModel::findOrFail($id);

        // Perbarui data buku
        $book->update($request->only([
            'title',
            'author',
            'publisher',
            'published_date',
            'number_of_pages',
            'member_id',
        ]));

        // Sinkronisasi kategori dengan buku
        $book->categories()->sync($request->categories);

        return redirect()->route('books.index')->with('success', 'Book updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        // Cari buku yang akan dihapus
        $book = BooksModel::findOrFail($id);

        // Hapus hubungan dengan kategori
        $book->categories()->detach();

        // Hapus buku
        $book->delete();

        return redirect()->route('books.index')->with('success', 'Book deleted successfully.');
    }
}
