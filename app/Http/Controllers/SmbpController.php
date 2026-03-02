<?php

namespace App\Http\Controllers;

use App\Models\Smbp;
use App\Models\PemohonSmbp;
use App\Models\Pendaftaran;
use Illuminate\Http\Request;

class SmbpController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $smbps = Smbp::withCount('pemohons')
                    ->orderBy('created_at', 'desc')
                    ->get();
        
        return view('smbp.index', compact('smbps'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('smbp.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_beasiswa' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'jumlah_beasiswa' => 'required|numeric|min:0',
            'penyelenggara' => 'required|string|max:255',
            'tanggal_mulai' => 'required|date|after_or_equal:today',
            'tanggal_selesai' => 'required|date|after:tanggal_mulai',
            'status' => 'required|in:Aktif,Tidak Aktif,Ditutup',
            'persyaratan' => 'required|string',
            'kontak_person' => 'required|string|max:255',
            'email_kontak' => 'required|email',
            'no_telepon' => 'required|string|max:20',
            'website' => 'nullable|url',
            'poster' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('poster')) {
            $validated['poster_path'] = $request->file('poster')->store('smbp_posters', 'public');
        }

        Smbp::create($validated);

        return redirect()->route('smbp.index')
                        ->with('success', 'Program beasiswa berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Smbp $smbp)
    {
        $smbp->load(['pemohons.pendaftaran']);
        
        return view('smbp.show', compact('smbp'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Smbp $smbp)
    {
        return view('smbp.edit', compact('smbp'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Smbp $smbp)
    {
        $validated = $request->validate([
            'nama_beasiswa' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'jumlah_beasiswa' => 'required|numeric|min:0',
            'penyelenggara' => 'required|string|max:255',
            'tanggal_mulai' => 'required|date',
            'tanggal_selesai' => 'required|date|after:tanggal_mulai',
            'status' => 'required|in:Aktif,Tidak Aktif,Ditutup',
            'persyaratan' => 'required|string',
            'kontak_person' => 'required|string|max:255',
            'email_kontak' => 'required|email',
            'no_telepon' => 'required|string|max:20',
            'website' => 'nullable|url',
            'poster' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('poster')) {
            $validated['poster_path'] = $request->file('poster')->store('smbp_posters', 'public');
        }

        $smbp->update($validated);

        return redirect()->route('smbp.index')
                        ->with('success', 'Program beasiswa berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Smbp $smbp)
    {
        $smbp->delete();

        return redirect()->route('smbp.index')
                        ->with('success', 'Program beasiswa berhasil dihapus.');
    }

    /**
     * Display available scholarships for public.
     */
    public function daftarBeasiswa()
    {
        $smbps = Smbp::aktif()
                    ->masihBerlaku()
                    ->orderBy('tanggal_selesai', 'asc')
                    ->get();

        return view('smbp.daftar', compact('smbps'));
    }

    /**
     * Show application form for specific scholarship.
     */
    public function formPengajuan(Smbp $smbp)
    {
        if (!$smbp->isAvailable()) {
            return redirect()->back()
                            ->with('error', 'Beasiswa ini tidak tersedia untuk pengajuan.');
        }

        $pendaftaran = auth()->user()->pendaftaran ?? null;

        if (!$pendaftaran) {
            return redirect()->route('pendaftaran.create')
                            ->with('info', 'Silakan lengkapi data pendaftaran terlebih dahulu.');
        }

        return view('smbp.pengajuan', compact('smbp', 'pendaftaran'));
    }

    /**
     * Submit scholarship application.
     */
    public function ajukanBeasiswa(Request $request, Smbp $smbp)
    {
        $pendaftaran = auth()->user()->pendaftaran;

        if (!$pendaftaran) {
            return redirect()->back()
                            ->with('error', 'Data pendaftaran tidak ditemukan.');
        }

        $existingApplication = PemohonSmbp::where('smbp_id', $smbp->id)
                                         ->where('pendaftaran_id', $pendaftaran->id)
                                         ->first();

        if ($existingApplication) {
            return redirect()->back()
                            ->with('error', 'Anda sudah mengajukan beasiswa ini.');
        }

        $validated = $request->validate([
            'dokumen_pendukung' => 'nullable|file|max:2048',
            'catatan' => 'nullable|string|max:1000',
        ]);

        if ($request->hasFile('dokumen_pendukung')) {
            $validated['dokumen_pendukung_path'] = $request->file('dokumen_pendukung')
                                                          ->store('dokumen_pendukung', 'public');
        }

        PemohonSmbp::create([
            'smbp_id' => $smbp->id,
            'pendaftaran_id' => $pendaftaran->id,
            'status' => 'Diajukan',
            'nilai_total' => $pendaftaran->nilai_rata,
            'catatan' => $validated['catatan'] ?? null,
            'dokumen_pendukung_path' => $validated['dokumen_pendukung_path'] ?? null,
        ]);

        return redirect()->route('smbp.daftar')
                        ->with('success', 'Pengajuan beasiswa berhasil dikirim.');
    }

    /**
     * Display applicant management page.
     */
    public function kelolaPemohon(Smbp $smbp)
    {
        $pemohons = $smbp->pemohons()
                        ->with('pendaftaran')
                        ->orderBy('created_at', 'desc')
                        ->get();

        return view('smbp.pemohon', compact('smbp', 'pemohons'));
    }

    /**
     * Update application status.
     */
    public function updateStatus(Request $request, PemohonSmbp $pemohon)
    {
        $validated = $request->validate([
            'status' => 'required|in:Diajukan,Diproses,Diterima,Ditolak',
            'catatan' => 'nullable|string|max:1000',
            'peringkat' => 'nullable|integer|min:1',
        ]);

        $pemohon->update($validated);

        if (in_array($validated['status'], ['Diterima', 'Ditolak'])) {
            $pemohon->update(['tanggal_keputusan' => now()]);
        } elseif ($validated['status'] === 'Diproses') {
            $pemohon->update(['tanggal_proses' => now()]);
        }

        return redirect()->back()
                        ->with('success', 'Status pemohon berhasil diperbarui.');
    }
}
