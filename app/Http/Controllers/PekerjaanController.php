<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePekerjaanRequest;
use App\Http\Requests\UpdatePekerjaanRequest;
use App\Models\Pekerjaan;

class PekerjaanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //query data
        $pekerjaan = Pekerjaan::all();
        return view(
            'pekerjaan.view',
            [
                'pekerjaan' => $pekerjaan
            ]
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $pekerjaan = new Pekerjaan();
        // berikan kode pekerjaan secara otomatis
        // 1. query dulu ke db, select max untuk mengetahui posisi terakhir 
        return view(
            'pekerjaan/create',
            [
                'kode_pekerjaan' => $pekerjaan->getKodePekerjaan()
            ]
        );
        // return view('pekerjaan/view');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePekerjaanRequest $request)
    {
        //digunakan untuk validasi kemudian kalau ok tidak ada masalah baru disimpan ke db
        $validated = $request->validate([
            'kode_pekerjaan' => 'required',
            'jenis_pekerjaan' => 'required|min:5|max:255',
            'tarif_per_jam' => 'required',
        ]);

        // masukkan ke db
        Pekerjaan::create($request->all());

        return redirect()->route('pekerjaan.index')->with('success', 'Data Berhasil di Input');
    }

    /**
     * Display the specified resource.
     */
    public function show(Pekerjaan $pekerjaan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pekerjaan $pekerjaan)
    {
        return view('pekerjaan.edit', compact('pekerjaan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePekerjaanRequest $request, Pekerjaan $pekerjaan)
    {
        //digunakan untuk validasi kemudian kalau ok tidak ada masalah baru diupdate ke db
        $validated = $request->validate([
            'id_pekerjaan' => 'required',
            'kode_pekerjaan' => 'required',
            'jenis_pekerjaan' => 'required|min:5|max:255',
            'tarif_per_jam' => 'required',
        ]);

        $pekerjaan->update($validated);

        return redirect()->route('pekerjaan.index')->with('success', 'Data Berhasil di Ubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //hapus dari database
        $pekerjaan = Pekerjaan::findOrFail($id);
        $pekerjaan->delete();

        return redirect()->route('pekerjaan.index')->with('success', 'Data Berhasil di Hapus');
    }
}
