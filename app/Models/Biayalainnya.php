<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Support\Facades\DB;

class Biayalainnya extends Model
{
    use HasFactory;
    protected $table = 'biayalainnya';
    // list kolom yang bisa diisi
    protected $fillable = ['kode_biayalainnya','nama_biayalainnya','jumlah'];

    // query nilai max dari kode perusahaan untuk generate otomatis kode perusahaan
    static public function getKodeBiayalainnya()
    {
        // query kode perusahaan
        $sql = "SELECT IFNULL(MAX(kode_biayalainnya), 'BP-000') as kode_biayalainnya
                FROM biayalainnya";
        $kodebiayalainnya= DB::select($sql);

        // cacah hasilnya
        foreach ($kodebiayalainnya as $kdprsh) {
            $kd = $kdprsh->kode_biayalainnya;
        }
        // Mengambil substring tiga digit akhir dari string PR-000
        $noawal = substr($kd,-3);
        $noakhir = $noawal+1; //menambahkan 1, hasilnya adalah integer cth 1
        
        //menyambung dengan string PR-001
        $noakhir = 'BP-'.str_pad($noakhir,3,"0",STR_PAD_LEFT); 

        return $noakhir;

    }
}