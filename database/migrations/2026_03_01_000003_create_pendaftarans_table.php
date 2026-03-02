<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePendaftaransTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('pendaftarans', function (Blueprint $table) {
            $table->id();
            $table->string('nama_lengkap');
            $table->string('nik', 16)->unique();
            $table->string('tempat_lahir');
            $table->date('tanggal_lahir');
            $table->enum('jenis_kelamin', ['Laki-laki', 'Perempuan']);
            $table->string('agama');
            $table->string('kewarganegaraan')->default('WNI');
            $table->text('alamat');
            $table->string('email')->unique();
            $table->string('no_hp');
            $table->string('nama_sekolah');
            $table->string('jenis_sekolah');
            $table->string('jurusan_sekolah');
            $table->year('tahun_lulus');
            $table->decimal('nilai_rata', 5, 2);
            $table->string('pilihan1');
            $table->string('pilihan2')->nullable();
            $table->string('pas_foto_path');
            $table->string('ijazah_path');
            $table->string('akta_kelahiran_path');
            $table->string('rapor_path');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pendaftarans');
    }
}
