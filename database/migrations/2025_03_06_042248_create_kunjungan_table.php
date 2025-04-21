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
        Schema::create('kunjungan', function (Blueprint $table) {
            $table->id();
            $table->string('instansi');
            $table->string('tujuan');
            $table->string('name');
            $table->string('jabatan');
            $table->string('jenis');
            $table->string('jumlah');
            $table->string('hp');
            $table->string('surel');
            $table->date('tanggal');
            $table->string('waktu');
            $table->string('pdf_file')->nullable();
            $table->string('mentor')->nullable();
            $table->text('ulasan')->nullable();
            $table->string('status')->default('Pending');
            $table->text('mail')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kunjungan');
    }
};
