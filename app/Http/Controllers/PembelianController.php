<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePembelianRequest;
use App\Http\Requests\UpdatePembelianRequest;
use App\Models\Bahanbaku;
use App\Models\Pembelian;
use Illuminate\Support\Facades\DB;

class PembelianController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //query data
        $pembelian = DB::table('pembelian as a')
            ->leftjoin('bahanbaku as b', 'a.id_bahanbaku', '=', 'b.id_bahanbaku')
            ->select('a.*', 'b.nama_bahanbaku')
            ->get();
        return view(
            'pembelian.view',
            [
                'pembelian' => $pembelian
            ]
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $pembelian = new Pembelian();
        $bahanbaku = Bahanbaku::all();
        // berikan kode pembelian secara otomatis
        // 1. query dulu ke db, select max untuk mengetahui posisi terakhir 
        return view(
            'pembelian/create',
            [
                'nomor_pembelian' => $pembelian->getNomorPembelian(),
                'bahanbaku' => $bahanbaku
            ]
        );
        // return view('pembelian/view');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePembelianRequest $request)
    {
        //digunakan untuk validasi kemudian kalau ok tidak ada masalah baru disimpan ke db
        $validated = $request->validate([
            'nomor_pembelian' => 'required',
            'tanggal_pembelian' => 'required',
            'id_bahanbaku' => 'required',
            'harga' => 'required',
            'kuantitas' => 'required',
        ]);

        // masukkan ke db
        Pembelian::create($request->all());

        return redirect()->route('pembelian.index')->with('success', 'Data Berhasil di Input');
    }

    /**
     * Display the specified resource.
     */
    public function show(pembelian $pembelian)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(pembelian $pembelian)
    {
        return view('pembelian.edit', ['pembelian' => $pembelian, 'bahanbaku' => Bahanbaku::all()]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePembelianRequest $request, Pembelian $pembelian)
    {
        //digunakan untuk validasi kemudian kalau ok tidak ada masalah baru diupdate ke db
        $validated = $request->validate([
            'nomor_pembelian' => 'required',
            'tanggal_pembelian' => 'required',
            'id_bahanbaku' => 'required',
            'harga' => 'required',
            'kuantitas' => 'required',
        ]);

        $pembelian->update($validated);

        return redirect()->route('pembelian.index')->with('success', 'Data Berhasil di Ubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //hapus dari database
        $pembelian = Pembelian::findOrFail($id);
        $pembelian->delete();

        return redirect()->route('pembelian.index')->with('success', 'Data Berhasil di Hapus');
    }
}
