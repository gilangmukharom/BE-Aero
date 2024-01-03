<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
// Contoh migrasi
public function up()
{
    Schema::create('products', function (Blueprint $table) {
        $table->id();
        $table->string('nama_maskapai');
        $table->string('tujuan');
        $table->date('tanggal_keberangkatan')->default(now()); // Tambahkan 'default(now())'
        $table->time('jam_keberangkatan');
        $table->decimal('harga', 10, 2);
        $table->timestamps();
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};