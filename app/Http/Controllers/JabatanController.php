<?php

namespace App\Http\Controllers;

use App\Models\Divisi;
use App\Models\Jabatan;
use App\Models\User;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreJabatanRequest;
use App\Http\Requests\UpdateJabatanRequest;

class JabatanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();
        $jabatan = Jabatan::with('divisi')->get();

        return view('AdminLTE.jabatan', [
            'title' => 'Data Jabatan',
            'user' => $user,
            'jabatans' => $jabatan
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $divisis = Divisi::all();

        return view('AdminLTE/crud/create/jabatan', [
            'title' => 'Tambah Data Jabatan',
            'divisis' => $divisis
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreJabatanRequest $request)
    {
        $validatedData = $request->validate([
            'nama_jabatan' => 'required|max:100',
            'divisi_id' => 'required|exists:divisis,id', // Pastikan divisi_id sesuai dengan ID di tabel divisis
        ]);

        $userAuth = Auth::user();
        $user = User::find($userAuth->id);

        if (!$user->isAdmin() && !$user->isManager()) {
            return response()->json(['message' => 'Unauthorized'], 401);
        }

        $jabatan = new Jabatan([
            'nama_jabatan' => $validatedData['nama_jabatan'],
        ]);

        $divisi = Divisi::find($validatedData['divisi_id']);
        $divisi->jabatans()->save($jabatan);

        return redirect()->route('jabatan.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Jabatan $jabatan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $jabatan = Jabatan::with('divisi')->findOrFail($id);
        $divisis = Divisi::all();

        return view('AdminLTE.crud.edit.jabatan', [
            'title' => 'Edit Data Jabatan',
            'jabatan' => $jabatan,
            'divisis' => $divisis
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateJabatanRequest $request, $id)
    {
        $jabatan = Jabatan::findOrFail($id);

        $validatedData = $request->validated();

        $jabatan->update([
            'nama_jabatan' => $validatedData['nama_jabatan'],
        ]);

        $divisi = $jabatan->divisi;

        $divisi->update([
            'divisi_id' => $validatedData['divisi_id'],
            // Tambahkan atribut-atribut lain yang perlu diperbarui di divisi
        ]);

        return redirect()->route('jabatan.index')->with('success', 'Data jabatan berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Jabatan $jabatan)
    {
        //
    }
}
