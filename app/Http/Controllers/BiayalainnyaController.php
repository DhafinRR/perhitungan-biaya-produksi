<?php

namespace App\Http\Controllers;

use App\Models\Biayalainnya;
use App\Http\Requests\StoreBiayalainnyaRequest;
use App\Http\Requests\UpdateBiayalainnyaRequest;

class BiayalainnyaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //query data
        $biayalainnya = Biayalainnya::all();
        return view('biayalainnya.view',
                    [
                        'biayalainnya' => $biayalainnya
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
         // berikan kode biayalainnya secara otomatis
        // 1. query dulu ke db, select max untuk mengetahui posisi terakhir 
        
        return view('biayalainnya/create',
                    [
                        'kode_biayalainnya' => Biayalainnya::getKodeBiayalainnya()
                    ]
                  );
        // return view('biayalainnya/view');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreBiayalainnyaRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBiayalainnyaRequest $request)
    {
        //digunakan untuk validasi kemudian kalau ok tidak ada masalah baru disimpan ke db
        $validated = $request->validate([
            'kode_biayalainnya' => 'required',
            'nama_biayalainnya' => 'required',
            'jumlah' => 'required',
        
        ]);

        // masukkan ke db
        Biayalainnya::create($request->all());
        
        return redirect()->route('biayalainnya.index')->with('success','Data Berhasil di Input');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Biayalainnya  $biayalainnya
     * @return \Illuminate\Http\Response
     */
    public function show(Biayalainnya $biayalainnya)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Biayalainnya  $biayalainnya
     * @return \Illuminate\Http\Response
     */
    public function edit(Biayalainnya $biayalainnya)
    {
        return view('biayalainnya.edit', compact('biayalainnya'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateBiayalainnyaRequest  $request
     * @param  \App\Models\Biayalainnya  $biayalainnya
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateBiayalainnyaRequest $request, Biayalainnya $biayalainnya)
    {
        //digunakan untuk validasi kemudian kalau ok tidak ada masalah baru diupdate ke db
        $validated = $request->validate([
            'kode_biayalainnya' => 'required',
            'nama_biayalainnya' => 'required',
            'jumlah' => 'required',
            
        
        ]);
    
        $biayalainnya->update($validated);
    
        return redirect()->route('biayalainnya.index')->with('success','Data Berhasil di Ubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Biayalainnya  $biayalainnya
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //hapus dari database
        $biayalainnya = Biayalainnya::findOrFail($id);
        $biayalainnya->delete();

        return redirect()->route('biayalainnya.index')->with('success','Data Berhasil di Hapus');
    }
}
