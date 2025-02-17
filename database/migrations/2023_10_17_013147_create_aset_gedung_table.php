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
        Schema::create('aset_gedung', function (Blueprint $table) {
            $table->id('id_aset_gedung');
            $table->unsignedBigInteger('id_status_aset');
            $table->foreign('id_status_aset')->references('id_status_aset')->on('status_aset');
            $table->string('kode_aset')->unique();
            $table->string('nama', 50);
            $table->date('tanggal_inventarisir')->default(now());
            $table->string('kondisi');
            $table->string('bertingkat');
            $table->string('beton');
            $table->decimal('luas_lantai')->nullable();
            $table->string('lokasi');
            $table->integer('tahun_dok');
            $table->string('nomor_dok')->nullable();
            $table->decimal('luas')->nullable();
            $table->string('hak');
            $table->integer('harga');
            $table->string('keterangan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('aset_gedung');
    }
};