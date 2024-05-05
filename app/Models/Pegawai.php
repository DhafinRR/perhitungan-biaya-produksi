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
    protected $fillable = ['kode_pegawai', 'nama_pegawai', 'alamat'];

    // query nilai max dari kode pegawai untuk generate otomatis kode pegawai

    public function getKodePegawai()
    {
        // query kode pegawai
        $sql = "SELECT IFNULL(MAX(kode_pegawai), 'PG-000') as kode_pegawai 
                FROM pegawai";
        $kode_pegawai = DB::select($sql);

        // cacah hasilnya
        foreach ($kode_pegawai as $kp) {
            $ip = $kp->kode_pegawai;
        }
        // Mengambil substring tiga digit akhir dari string PG-000
        $noawal = substr($ip, -3);
        $noakhir = $noawal + 1; //menambahkan 1, hasilnya adalah integer cth 1

        //menyambung dengan string PR-001
        $noakhir = 'PG-' . str_pad($noakhir, 3, "0", STR_PAD_LEFT);

        return $noakhir;
    }
}
