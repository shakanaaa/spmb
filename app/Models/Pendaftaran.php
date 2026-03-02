<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pendaftaran extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_lengkap',
        'nik',
        'tempat_lahir',
        'tanggal_lahir',
        'jenis_kelamin',
        'agama',
        'kewarganegaraan',
        'alamat',
        'email',
        'no_hp',
        'nama_sekolah',
        'jenis_sekolah',
        'jurusan_sekolah',
        'tahun_lulus',
        'nilai_rata',
        'pilihan1',
        'pilihan2',
        'pas_foto_path',
        'ijazah_path',
        'akta_kelahiran_path',
        'rapor_path',
    ];
}
