<?php

namespace App\Http\Controllers;

use App\Models\PenilaianKerja;
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

        return view('AdminLTE.penilaianKerja', [
            'title' => 'Penilaian Kerja'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePenilaianKerjaRequest $request)
    {
        //
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
    public function edit(PenilaianKerja $penilaianKerja)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePenilaianKerjaRequest $request, PenilaianKerja $penilaianKerja)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PenilaianKerja $penilaianKerja)
    {
        //
    }
}
