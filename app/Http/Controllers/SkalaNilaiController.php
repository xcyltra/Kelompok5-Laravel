<?php

namespace App\Http\Controllers;

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

        return view('AdminLTE.skalaNilai', [
            'title' => 'Data Skala Nilai'
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
    public function store(StoreSkalaNilaiRequest $request)
    {
        //
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
