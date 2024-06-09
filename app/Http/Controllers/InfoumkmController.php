<?php

namespace App\Http\Controllers;

// untuk mengakses http
use Illuminate\Support\Facades\Http;

use Illuminate\Http\Request;

class InfoumkmController extends Controller
{
    // untuk tes response dari API
    public function index()
    {
        $response = Http::get('https://newsdata.io/api/1/news?apikey=pub_44833e51d941a99f6cd13b1a7821ac3a7e65e&q=Usaha%20Mikro%20Kecil%20dan%20Menengah&country=id&language=id  ');
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
        $url = 'https://newsdata.io/api/1/news?apikey=pub_44833e51d941a99f6cd13b1a7821ac3a7e65e&q=Usaha%20Mikro%20Kecil%20dan%20Menengah&country=id&language=id  ';
        $response = Http::get($url);
        $hasil = json_decode($response);
        // var_dump($hasil);
        return view(
            'infoumkm.berita',
            [
                'hasil' => $hasil
            ]
        );
    }
}
