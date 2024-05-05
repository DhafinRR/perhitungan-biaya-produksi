<?php

namespace App\Http\Controllers;

use App\Models\Bahanbaku;
use App\Http\Requests\StoreBahanbakuRequest;
use App\Http\Requests\UpdateBahanbakuRequest;

class BahanbakuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $bahanbaku = Bahanbaku::all();
        return view('bahanbaku.view', ['bahanbaku' => $bahanbaku]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('bahanbaku.create', ['kode_bahanbaku' => Bahanbaku::getKodeBahanbaku()]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBahanbakuRequest $request)
    {
        $validated = $request->validate([
            'nama_bahanbaku' => 'required',
            'satuan' => 'required',
            'kuantitas' => 'required',
            'kategori_bahan' => 'required'
        ]);

        Bahanbaku::create($request->all());
        return redirect()->route('bahanbaku.index')->with('success', 'Data Berhasil di Input');
    }

    /**
     * Display the specified resource.
     */
    public function show(Bahanbaku $bahanbaku)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Bahanbaku $bahanbaku)
    {
        return view('bahanbaku.edit', compact('bahanbaku'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBahanbakuRequest $request, Bahanbaku $bahanbaku)
    {
        $validated = $request->validate([
            'nama_bahanbaku' => 'required',
            'satuan' => 'required',
            'kuantitas' => 'required',
            'kategori_bahan' => 'required'
        ]);

        $bahanbaku->update($validated);
        return redirect()->route('bahanbaku.index')->with('success', 'Data Berhasil di Ubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $bahanbaku = Bahanbaku::findOrFail($id);
        $bahanbaku->delete();
        return redirect()->route('bahanbaku.index')->with('success', 'Data Berhasil di Hapus');
    }
}
