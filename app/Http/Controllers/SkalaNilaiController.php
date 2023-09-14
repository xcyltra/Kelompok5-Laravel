<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\SkalaNilai;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreSkalaNilaiRequest;
use App\Http\Requests\UpdateSkalaNilaiRequest;

class SkalaNilaiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();
        $skalaNilai = SkalaNilai::all();

        return view('AdminLTE.skalaNilai', [
            'title' => 'Data Skala Nilai',
            'user' => $user,
            'skalanilai' => $skalaNilai
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('AdminLTE.crud.create.skalaNilai', [
            'title' => 'Tambah Data Skala Nilai'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreSkalaNilaiRequest $request)
    {
        $userAuth = Auth::user();
        $user = User::find($userAuth->id);

        if (!$user->isAdmin() && !$user->isManager()) {
            return response()->json(['message' => 'Unauthorized'], 401);
        }

        $skala = new SkalaNilai([
            'nama_skala' => $request->input('nama_skala'),
            'nilai_min' => $request->input('nilai_min'),
            'nilai_max' => $request->input('nilai_max')
        ]);
        $skala->save();

        return redirect()->route('skalaNilai.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(SkalaNilai $skalaNilai)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(SkalaNilai $skalaNilai)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSkalaNilaiRequest $request, SkalaNilai $skalaNilai)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SkalaNilai $skalaNilai)
    {
        //
    }
}
