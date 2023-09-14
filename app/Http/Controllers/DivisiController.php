<?php

namespace App\Http\Controllers;

use App\Models\Divisi;
use App\Models\User;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreDivisiRequest;
use App\Http\Requests\UpdateDivisiRequest;

class DivisiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();
        $divisi = Divisi::all();

        return view('AdminLTE.divisi', [
            'title' => 'Data Divisi',
            'user' => $user,
            'divisions' => $divisi
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('AdminLTE.crud.create.divisi', [
            'title' => 'Tambah Data Divisi'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreDivisiRequest $request)
    {
        $userAuth = Auth::user();
        $user = User::find($userAuth->id);

        if (!$user->isAdmin() && !$user->isManager()) {
            return response()->json(['message' => 'Unauthorized'], 401);
        }

        $divisi = new Divisi([
            'nama_divisi' => $request->input('nama_divisi')
        ]);
        $divisi->save();

        return redirect()->route('divisi.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Divisi $divisi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Divisi $divisi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateDivisiRequest $request, Divisi $divisi)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Divisi $divisi)
    {
        //
    }
}
