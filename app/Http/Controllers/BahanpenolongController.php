<?php

namespace App\Http\Controllers;

use App\Models\Bahanpenolong;
use App\Http\Requests\StoreBahanpenolongRequest;
use App\Http\Requests\UpdateBahanpenolongRequest;

class BahanpenolongController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //query data
        $bahanpenolong = Bahanpenolong::all();
        return view(
            'bahanpenolong.view',
            [
                'bahanpenolong' => $bahanpenolong
            ]
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // berikan kode bahanpenolong secara otomatis
        // 1. query dulu ke db, select max untuk mengetahui posisi terakhir 

        return view(
            'bahanpenolong/create',
            [
                'kode_bahanpenolong' => Bahanpenolong::getKodeBahanpenolong()
            ]
        );
        // return view('bahanpenolong/view');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreBahanpenolongRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBahanpenolongRequest $request)
    {
        //digunakan untuk validasi kemudian kalau ok tidak ada masalah baru disimpan ke db
        $validated = $request->validate([
            'kode_bahanpenolong' => 'required',
            'nama_bahanpenolong' => 'required',
            'satuan' => 'required',
            'kuantitas' => 'required',

        ]);

        // masukkan ke db
        Bahanpenolong::create($request->all());

        return redirect()->route('bahanpenolong.index')->with('success', 'Data Berhasil di Input');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Bahanpenolong  $bahanpenolong
     * @return \Illuminate\Http\Response
     */
    public function show(Bahanpenolong $bahanpenolong)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Bahanpenolong  $bahanpenolong
     * @return \Illuminate\Http\Response
     */
    public function edit(Bahanpenolong $bahanpenolong)
    {
        return view('bahanpenolong.edit', compact('bahanpenolong'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateBahanpenolongRequest  $request
     * @param  \App\Models\Bahanpenolong  $bahanpenolong
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateBahanpenolongRequest $request, Bahanpenolong $bahanpenolong)
    {
        //digunakan untuk validasi kemudian kalau ok tidak ada masalah baru diupdate ke db
        $validated = $request->validate([
            'kode_bahanpenolong' => 'required',
            'nama_bahanpenolong' => 'required',
            'satuan' => 'required',
            'kuantitas' => 'required',

        ]);

        $bahanpenolong->update($validated);

        return redirect()->route('bahanpenolong.index')->with('success', 'Data Berhasil di Ubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Bahanpenolong  $bahanpenolong
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //hapus dari database
        $bahanpenolong = Bahanpenolong::findOrFail($id);
        $bahanpenolong->delete();

        return redirect()->route('bahanpenolong.index')->with('success', 'Data Berhasil di Hapus');
    }
}
