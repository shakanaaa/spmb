<?php

namespace App\Http\Controllers;

use App\Models\Pendaftaran;
use Illuminate\Http\Request;

class PendaftaranController extends Controller
{
    /**
     * Show the registration form.
     */
    public function create()
    {
        return view('pendaftaranPage');
    }

    /**
     * Store a new registration in the database.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_lengkap' => 'required|string|max:255',
            'nik' => 'required|digits:16|unique:pendaftarans,nik',
            'tempat_lahir' => 'required|string|max:255',
            'tanggal_lahir' => 'required|date',
            'jenis_kelamin' => 'required|in:Laki-laki,Perempuan',
            'agama' => 'required|string|max:100',
            'kewarganegaraan' => 'required|string|max:100',
            'alamat' => 'required|string',
            'email' => 'required|email|unique:pendaftarans,email',
            'no_hp' => 'required|string|max:20',
            'nama_sekolah' => 'required|string|max:255',
            'jenis_sekolah' => 'required|string|max:100',
            'jurusan_sekolah' => 'required|string|max:100',
            'tahun_lulus' => 'required|digits:4',
            'nilai_rata' => 'required|numeric|min:0|max:100',
            'pilihan1' => 'required|string|max:255',
            'pilihan2' => 'nullable|string|max:255',
            'pas_foto' => 'required|image|max:2048',
            'ijazah' => 'required|file|max:2048',
            'akta_kelahiran' => 'required|file|max:2048',
            'rapor' => 'required|file|max:2048',
        ]);

        // store files
        $validated['pas_foto_path'] = $request->file('pas_foto')->store('pendaftarans', 'public');
        $validated['ijazah_path'] = $request->file('ijazah')->store('pendaftarans', 'public');
        $validated['akta_kelahiran_path'] = $request->file('akta_kelahiran')->store('pendaftarans', 'public');
        $validated['rapor_path'] = $request->file('rapor')->store('pendaftarans', 'public');

        // create record
        Pendaftaran::create($validated);

        return redirect()->back()->with('success', 'Pendaftaran berhasil dikirim.');
    }
}
