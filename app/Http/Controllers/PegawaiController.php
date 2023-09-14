<?php

namespace App\Http\Controllers;

use App\Models\Jabatan;
use App\Models\Pegawai;
use App\Models\User;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StorePegawaiRequest;
use App\Http\Requests\UpdatePegawaiRequest;

class PegawaiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();
        $pegawai = Pegawai::with('jabatan')->get();

        return view('AdminLTE.pegawai', [
            'title' => 'Data Pegawai',
            'user' => $user,
            'pegawais' => $pegawai
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $jabatans = Jabatan::all();

        return view('AdminLTE.crud.create.pegawai', [
            'title' => 'Tambah Data Pegawai',
            'jabatans' => $jabatans
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePegawaiRequest $request)
    {
        $validatedData = $request->validate([
            'nama_pegawai' => 'required|max:100',
            'jk' => 'required',
            'tanggal_masuk' => 'required',
            'jabatan_id' => 'required|exists:jabatans,id', // Pastikan divisi_id sesuai dengan ID di tabel divisis
        ]);

        $userAuth = Auth::user();
        $user = User::find($userAuth->id);

        if (!$user->isAdmin() && !$user->isManager()) {
            return response()->json(['message' => 'Unauthorized'], 401);
        }

        $pegawai = new Pegawai([
            'nama_pegawai' => $validatedData['nama_pegawai'],
            'jk' => $validatedData['jk'],
            'tanggal_masuk' => $validatedData['tanggal_masuk'],
        ]);

        $jabatan = Jabatan::find($validatedData['jabatan_id']);
        $pegawai->jabatan()->associate($jabatan);

        $pegawai->save();

        return redirect()->route('pegawai.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Pegawai $pegawai)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pegawai $pegawai)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePegawaiRequest $request, Pegawai $pegawai)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pegawai $pegawai)
    {
        //
    }
}
