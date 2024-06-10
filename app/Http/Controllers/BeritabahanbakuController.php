<?php

namespace App\Http\Controllers;

// untuk mengakses http
use Illuminate\Support\Facades\Http;

use Illuminate\Http\Request;

class BeritabahanbakuController extends Controller
{
    // untuk tes response dari API
    public function index()
    {
        $response = Http::get('https://newsapi.org/v2/everything?q=bahan baku&from=2024-05-10&sortBy=publishedAt&apiKey=43d973d223d544648316305e499d2b44');
        $hasil = json_decode($response);
        // var_dump($hasil);

        if ($hasil->status == "ok") {
            echo "Jumlah Status     : " . $hasil->status . "<br>";
            echo "Jumlah Results    : " . $hasil->totalResults . "<br>";
            echo "Sumber Artikel-1  : " . $hasil->articles[0]->source->name . "<br>";
            echo "Nama Artikel-2    : " . $hasil->articles[1]->title . "<br>";
            echo "URL Gambar        : " . $hasil->articles[1]->urlToImage . "<br>";

            // dapatkan jumlah datanya
            echo "<hr>";
            foreach ($hasil->articles as $row) {
                echo $row->source->name . "-" . $row->author . "-" . $row->title . "-" . $row->url . "-" . $row->description . "-" . $row->urlToImage;
                echo "<br>";
            }
        }
    }

    // untuk galeri berita
    public function getNews()
    {
        // akses API
        $url = 'https://newsapi.org/v2/everything?q= bahan baku&from=2024-05-10&sortBy=publishedAt&apiKey=43d973d223d544648316305e499d2b44';
        $response = Http::get($url);
        $hasil = json_decode($response);
        // var_dump($hasil);
        return view(
            'beritabahanbaku.berita',
            [
                'hasil' => $hasil
            ]
        );
    }
}
