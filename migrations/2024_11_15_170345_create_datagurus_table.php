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
        Schema::create('datagurus', function (Blueprint $table) {
            $table->id();
        $table->string('nama'); // nama si guru
        $table->string('nip')->unique(); // nomor induk pegawai si guru (unik)
        $table->text('alamat'); // alamat tempat tinggal si guru
        $table->string('telepon', 15); // nomor telp si guru (panjang 15 karakter)
        $table->string('mata_pelajaran'); // pelajaran yang diajarkan si guru
        $table->enum('jenis_kelamin', ['L', 'P']); // gender si guru
        $table->date('tanggal_lahir'); // tanggal lahir si guru
        $table->enum('status', ['aktif', 'tidak aktif']); // status aktif mengajar atau tidak
        $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('datagurus');
    }
};
