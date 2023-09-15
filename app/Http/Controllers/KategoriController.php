<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Kategori;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreKategoriRequest;
use App\Http\Requests\UpdateKategoriRequest;

class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();
        $kategori = Kategori::all();

        return view('AdminLTE.kategori', [
            'title' => 'Data Kategori',
            'user' => $user,
            'kategoris' => $kategori
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('AdminLTE.crud.create.kategori', [
            'title' => 'Tambah Data Kategori'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreKategoriRequest $request)
    {
        $userAuth = Auth::user();
        $user = User::find($userAuth->id);

        if (!$user->isAdmin() && !$user->isManager()) {
            return response()->json(['message' => 'Unauthorized'], 401);
        }

        $kategori = new Kategori([
            'nama_kategori' => $request->input('nama_kategori')
        ]);
        $kategori->save();

        return redirect()->route('kategori.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Kategori $kategori)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $kategori = Kategori::findOrFail($id);

        return view('AdminLTE.crud.edit.kategori', [
            'title' => 'Edit Data Kategori',
            'kategori' => $kategori
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateKategoriRequest $request, $id)
    {
        $kategori = Kategori::findOrFail($id);

        $validatedData = $request->validated();

        $kategori->update([
            'nama_kategori' => $validatedData['nama_kategori'],
            // Jika ada kolom-kolom lain yang perlu diupdate, tambahkan di sini
        ]);

        return redirect()->route('kategori.index')->with('success', 'Data Kategori berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $userAuth = Auth::user();
        $user = User::find($userAuth->id);

        if (!$user->isAdmin()) {
            return response()->json(['message' => 'Unauthorized'], 401);
        }

        $kategori = Kategori::findOrFail($id);

        if ($kategori->delete()) {
            return redirect()->route('kategori.index')->with('delete_success', 'Data berhasil dihapus.');
        } else {
            return redirect()->route('kategori.index')->with('delete_error', 'Terjadi kesalahan saat menghapus data.');
        }
    }
}
