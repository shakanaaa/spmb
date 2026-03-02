<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PemohonSmbp extends Model
{
    use HasFactory;

    protected $fillable = [
        'smbp_id',
        'pendaftaran_id',
        'status',
        'catatan',
        'nilai_total',
        'peringkat',
        'dokumen_pendukung_path',
        'tanggal_pengajuan',
        'tanggal_proses',
        'tanggal_keputusan',
    ];

    protected $casts = [
        'tanggal_pengajuan' => 'datetime',
        'tanggal_proses' => 'datetime',
        'tanggal_keputusan' => 'datetime',
        'nilai_total' => 'decimal:2',
    ];

    public function smpb()
    {
        return $this->belongsTo(Smbp::class, 'smbp_id');
    }

    public function smbp()
    {
        return $this->belongsTo(Smbp::class, 'smbp_id');
    }

    public function pendaftaran()
    {
        return $this->belongsTo(Pendaftaran::class);
    }

    public function scopeDiajukan($query)
    {
        return $query->where('status', 'Diajukan');
    }

    public function scopeDiterima($query)
    {
        return $query->where('status', 'Diterima');
    }

    public function scopeDitolak($query)
    {
        return $query->where('status', 'Ditolak');
    }
}
