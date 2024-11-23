<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MembersModel;

class MembersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('members.index', [
            'members' => MembersModel::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('members.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi data
        $request->validate([
            'name' => 'required|string|max:255',
            'national_id_number' => 'required|numeric|digits:16|unique:members,national_id_number',
            'phone_number' => 'required|numeric|digits:12|unique:members,phone_number',
            'address' => 'required|string',
            'join_date' => 'required|date',
        ]);

        // Membuat member baru
        MembersModel::create([
            'name' => $request->name,
            'national_id_number' => $request->national_id_number,
            'phone_number' => $request->phone_number,
            'address' => $request->address,
            'join_date' => $request->join_date,
        ]);

        // Redirect ke halaman lain setelah sukses
        return redirect()->route('members.index')->with('success', 'Member created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $member = MembersModel::with(['books.categories'])->findOrFail($id);
        return view('members.show', compact('member'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $member = MembersModel::findOrFail($id);
        return view('members.edit', compact('member'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Validasi input
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'national_id_number' => 'required|numeric|digits:16|unique:members,national_id_number,' . $id,
            'phone_number' => 'required|numeric|digits:12|unique:members,phone_number,' . $id,
            'address' => 'required|string',
            'join_date' => 'required|date',
        ]);

        // Cari member berdasarkan ID
        $member = MembersModel::findOrFail($id);

        // Update data member
        $member->update($validated);

        // Kembali ke halaman list member dengan pesan sukses
        return redirect()->route('members.index')->with('success', 'Member updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $member = MembersModel::findOrFail($id);
        $member->delete();
        return redirect()->route('members.index')->with('success', 'Member deleted successfully.');
    }
}
