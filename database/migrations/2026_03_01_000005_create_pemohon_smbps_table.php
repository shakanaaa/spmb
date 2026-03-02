<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePemohonSmbpsTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('pemohon_smbps', function (Blueprint $table) {
            $table->id();
            $table->foreignId('smbp_id')->constrained()->onDelete('cascade');
            $table->foreignId('pendaftaran_id')->constrained()->onDelete('cascade');
            $table->enum('status', ['Diajukan', 'Diproses', 'Diterima', 'Ditolak'])->default('Diajukan');
            $table->text('catatan')->nullable();
            $table->decimal('nilai_total', 5, 2);
            $table->integer('peringkat')->nullable();
            $table->string('dokumen_pendukung_path')->nullable();
            $table->timestamp('tanggal_pengajuan')->useCurrent();
            $table->timestamp('tanggal_proses')->nullable();
            $table->timestamp('tanggal_keputusan')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pemohon_smbps');
    }
}
