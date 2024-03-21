<?php

namespace App\Models;

use GuzzleHttp\Psr7\Request;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Support\Facades\DB;

class Pegawai extends Model
{
    use HasFactory;
    protected $table = 'pegawai';
    protected $primaryKey = 'id_pegawai';
    // list kolom yang bisa diisi
    protected $fillable = ['id_pegawai', 'kode_pegawai', 'nama_pegawai', 'alamat'];

    // query nilai max dari kode perusahaan untuk generate otomatis kode perusahaan

    public function getKodePegawai()
    {
        // query kode perusahaan
        $sql = "SELECT IFNULL(MAX(id_pegawai), 'PR-000') as id_pegawai 
                FROM pegawai";
        $idpegawai = DB::select($sql);

        // cacah hasilnya
        foreach ($idpegawai as $idp) {
            $ip = $idp->id_pegawai;
        }
        // Mengambil substring tiga digit akhir dari string PR-000
        $noawal = substr($ip, -3);
        $noakhir = $noawal + 1; //menambahkan 1, hasilnya adalah integer cth 1

        //menyambung dengan string PR-001
        $noakhir = 'PR-' . str_pad($noakhir, 3, "0", STR_PAD_LEFT);

        return $noakhir;
    }
}
