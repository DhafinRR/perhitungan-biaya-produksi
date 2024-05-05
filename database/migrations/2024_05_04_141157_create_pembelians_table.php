<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('pembelian', function (Blueprint $table) {
            $table->id();
            $table->string('nomor_pembelian');
            $table->date('tanggal_pembelian');
            $table->unsignedBigInteger('id_bahanbaku');
            $table->integer('harga');
            $table->integer('kuantitas');
            $table->timestamps();

            $table->foreign('id_bahanbaku')->references('id_bahanbaku')->on('bahanbaku');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pembelian');
    }
};
