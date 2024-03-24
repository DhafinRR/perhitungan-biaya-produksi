<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migration.
     */
    public function up(): void
    {
        Schema::create('biayalainnya', function (Blueprint $table) {
            $table->id();
            $table->string('kode_biayalainnya');
            $table->string('nama_biayalainnya');
            $table->string('jumlah');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migration.
     */
    public function down(): void
    {
        Schema::dropIfExists('biayalainnya');
    }
};
