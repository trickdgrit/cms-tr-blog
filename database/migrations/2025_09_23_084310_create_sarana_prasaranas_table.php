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
        Schema::create('saranas', function (Blueprint $table) {
            $table->id();
            $table->string('nama_sarana');
            $table->string('kategori'); // Contoh: Pasar, Olahraga, Transportasi
            $table->string('kondisi'); // Contoh: Baik, Cukup Baik, Rusak
            $table->unsignedInteger('jumlah');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sarana_prasaranas');
    }
};

