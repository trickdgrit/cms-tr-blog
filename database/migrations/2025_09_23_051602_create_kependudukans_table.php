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
        Schema::create('kependudukans', function (Blueprint $table) {
            $table->id();
            $table->string('nama_kecamatan');
            $table->unsignedInteger('jumlah_penduduk');
            $table->unsignedInteger('pria');
            $table->unsignedInteger('wanita');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kependudukans');
    }
};

