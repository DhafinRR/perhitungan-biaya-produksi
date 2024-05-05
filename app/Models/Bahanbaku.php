<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Bahanbaku extends Model
{
    use HasFactory;
    protected $table = 'bahanbaku';
    protected $primaryKey = 'id_bahanbaku';
    protected $fillable = [
        'kode_bahanbaku',
        'nama_bahanbaku',
        'satuan',
        'kuantitas',
        'kategori_bahan'
    ];

    public static function getKodeBahanbaku()
    {
        // query kode perusahaan
        $sql = "SELECT IFNULL(MAX(kode_bahanbaku), 'BB-000') as kode_bahanbaku 
                FROM bahanbaku";
        $kode_bb = DB::select($sql);

        // cacah hasilnya
        foreach ($kode_bb as $kdbb) {
            $ip = $kdbb->kode_bahanbaku;
        }
        // Mengambil substring tiga digit akhir dari string PR-000
        $noawal = substr($ip, -3);
        $noakhir = $noawal + 1; //menambahkan 1, hasilnya adalah integer cth 1

        //menyambung dengan string PR-001
        $noakhir = 'BB-' . str_pad($noakhir, 3, "0", STR_PAD_LEFT);

        return $noakhir;
    }
}
