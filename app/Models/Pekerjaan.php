<?php

namespace App\Models;

use GuzzleHttp\Psr7\Request;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Support\Facades\DB;

class Pekerjaan extends Model
{
    use HasFactory;
    protected $table = 'pekerjaan';
    protected $primaryKey = 'id_pekerjaan';
    // list kolom yang bisa diisi
    protected $fillable = ['kode_pekerjaan', 'jenis_pekerjaan', 'tarif_per_jam'];

    // query nilai max dari kode perusahaan untuk generate otomatis kode perusahaan

    public function getKodePekerjaan()
    {
        // query kode perusahaan
        $sql = "SELECT IFNULL(MAX(kode_pekerjaan), 'PJ-000') as kode_pekerjaan
                FROM pekerjaan";
        $kode_pekerjaan = DB::select($sql);

        // cacah hasilnya
        foreach ($kode_pekerjaan as $kdp) {
            $ip = $kdp->kode_pekerjaan;
        }
        // Mengambil substring tiga digit akhir dari string PJ-000
        $noawal = substr($ip, -3);
        $noakhir = $noawal + 1; //menambahkan 1, hasilnya adalah integer cth 1

        //menyambung dengan string PJ-001
        $noakhir = 'PJ-' . str_pad($noakhir, 3, "0", STR_PAD_LEFT);

        return $noakhir;
    }
}
