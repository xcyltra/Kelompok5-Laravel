<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\Pegawai;
use App\Models\PenilaianKerja;
use App\Models\SkalaNilai;
use App\Models\User;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StorePenilaianKerjaRequest;
use App\Http\Requests\UpdatePenilaianKerjaRequest;

class PenilaianKerjaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();
        $penilaianKerja = PenilaianKerja::with(['pegawai', 'user', 'kategori', 'skalaNilai'])->where('evaluator', $user->id)->get();

        return view('AdminLTE.penilaianKerja', [
            'title' => 'Penilaian Kinerja',
            'user' => $user,
            'penilaianKerja' => $penilaianKerja
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $pegawais = Pegawai::all();
        $user = Auth::user();
        $kategoris = Kategori::all();
        $nilais = SkalaNilai::all();

        return view('AdminLTE.crud.create.penilaianKerja', [
            'title' => 'Tambah Data Penilaian Kerja',
            'pegawais' => $pegawais,
            'user' => $user,
            'kategoris' => $kategoris,
            'nilais' => $nilais,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePenilaianKerjaRequest $request)
    {
        $validatedData = $request->validate([
            'pegawai_id' => 'required|exists:pegawais,id',
            'tgl_review' => 'required',
            'evaluator' => 'required|exists:users,id',
            'kategori_id' => 'required|exists:kategoris,id',
            'nilai_id' => 'required|exists:skala_nilais,id',
            'komentar' => 'required|max:255',
        ]);

        $userAuth = Auth::user();
        $user = User::find($userAuth->id);

        if (!$user->isAdmin() && !$user->isEvaluator()) {
            return response()->json(['message' => 'Unauthorized'], 401);
        }

        $penilaianData = [
            'tgl_review' => $validatedData['tgl_review'],
            'komentar' => $validatedData['komentar'],
        ];

        $penilaianKerja = new PenilaianKerja($penilaianData);

        $penilaianKerja->pegawai()->associate($validatedData['pegawai_id']);
        $penilaianKerja->user()->associate($validatedData['evaluator']);
        $penilaianKerja->kategori()->associate($validatedData['kategori_id']);
        $penilaianKerja->skalaNilai()->associate($validatedData['nilai_id']);

        $penilaianKerja->save();

        return redirect()->route('penilaianKerja.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(PenilaianKerja $penilaianKerja)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $penilaianKerja = PenilaianKerja::with(['pegawai', 'user', 'kategori', 'skalaNilai'])->findOrFail($id);
        $pegawais = Pegawai::all();
        $users = User::all();
        $kategoris = Kategori::all();
        $skalaNilai = SkalaNilai::all();

        return view('AdminLTE.crud.edit.penilaianKerja', [
            'title' => 'Edit Data Penilaian Kinerja',
            'penilaianKerja' => $penilaianKerja,
            'pegawais' => $pegawais,
            'users' => $users,
            'kategoris' => $kategoris,
            'skalaNilai' => $skalaNilai,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePenilaianKerjaRequest $request, $id)
    {
        $penilaianKerja = PenilaianKerja::findOrFail($id);

        dd($request->all());

        $validatedData = $request->validated();

        $penilaianKerja->update([
            'pegawai_id' => $validatedData['pegawai_id'],
            'tgl_review' => $validatedData['tgl_review'],
            'evaluator' => $validatedData['evaluator'],
            'kategori_id' => $validatedData['kategori_id'],
            'nilai_id' => $validatedData['nilai_id'],
            'komentar' => $validatedData['komentar'],
        ]);

        return redirect()->route('penilaianKerja.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PenilaianKerja $penilaianKerja)
    {
        //
    }
}
