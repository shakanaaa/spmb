<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Smbp extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_beasiswa',
        'deskripsi',
        'jumlah_beasiswa',
        'penyelenggara',
        'tanggal_mulai',
        'tanggal_selesai',
        'status',
        'persyaratan',
        'kontak_person',
        'email_kontak',
        'no_telepon',
        'website',
        'poster_path',
    ];

    protected $casts = [
        'tanggal_mulai' => 'date',
        'tanggal_selesai' => 'date',
        'jumlah_beasiswa' => 'decimal:2',
    ];

    public function pemohons()
    {
        return $this->hasMany(PemohonSmbp::class);
    }

    public function scopeAktif($query)
    {
        return $query->where('status', 'Aktif');
    }

    public function scopeMasihBerlaku($query)
    {
        return $query->where('tanggal_mulai', '<=', now())
                    ->where('tanggal_selesai', '>=', now());
    }

    public function isAvailable()
    {
        return $this->status === 'Aktif' && 
               $this->tanggal_mulai <= now() && 
               $this->tanggal_selesai >= now();
    }
}
