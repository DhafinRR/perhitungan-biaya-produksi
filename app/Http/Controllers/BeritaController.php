<?php

namespace App\Http\Controllers;

// untuk mengakses http
use Illuminate\Support\Facades\Http;

use Illuminate\Http\Request;

class BeritaController extends Controller
{
    // untuk tes response dari API
    public function index()
    {
        $response = Http::get('https://newsapi.org/v2/everything?q=raw material costs&sortBy=popularity&apiKey=3f558041f2004edd94ad9c36372addb6');
        $hasil = json_decode($response);
        // var_dump($hasil);

        if($hasil->status=="ok"){
            echo "Jumlah Status     : ".$hasil->status."<br>";
            echo "Jumlah Results    : ".$hasil->totalResults."<br>";
            echo "Sumber Artikel-1  : ".$hasil->articles[0]->source->name."<br>";
            echo "Nama Artikel-2    : ".$hasil->articles[1]->title."<br>";
            echo "URL Gambar        : ".$hasil->articles[1]->urlToImage."<br>";

            // dapatkan jumlah datanya
            echo "<hr>";
            foreach ($hasil->articles as $row){
                echo $row->source->name."-".$row->author."-".$row->title."-".$row->url."-".$row->description."-".$row->urlToImage;
                echo "<br>"; 
            } 
               
        }
    }

    // untuk galeri berita
    public function getNews(){
        // akses API
        $url = 'https://newsapi.org/v2/everything?q=raw material costs&sortBy=popularity&apiKey=3f558041f2004edd94ad9c36372addb6';
        $response = Http::get($url);
        $hasil = json_decode($response);
        // var_dump($hasil);
        return view(
            'berita.berita',
            [
                'hasil' => $hasil
            ]
        );
    }

    public function getWisatawan()
    {
        $response = Http::get('https://data.jabarprov.go.id/api-backend/bigdata/disparbud/od_15422_jumlah_wisatawan_berdasarkan_kategori');
        $result = json_decode($response);
        return view('wisatawan.wisatawan', ['hasil' => $result]);
    }
}
