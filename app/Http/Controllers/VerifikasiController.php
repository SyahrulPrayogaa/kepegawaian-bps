<?php

namespace App\Http\Controllers;

use App\Models\Pegawai;
use App\Models\Uploads;
use App\Models\Usulan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VerifikasiController extends Controller
{
    public function index()
    {
        $dokumen = Usulan::all();
        // dd($dokumen);
        $upload = Uploads::where('pegawai_nip',);
        $usulan = Usulan::where('status', 'on process')->get();
        $acc = Usulan::where('status', 'acc')->get();
        $tolak = Usulan::where('status', 'ditolak')->get();
        return view('verifikasi-berkas-usulan.index', ['usulan' => $usulan, 'acc' => $acc, 'tolak' => $tolak, 'dokumen' => $dokumen]);
    }

    public function verifikasi(Usulan $usulan)
    {
        $usulan->update([
            'status' => 'acc',
            'verifikator' => Auth::user()->name,
        ]);
        return redirect('/verifikasi');
    }

    public function tolak(Request $request, Usulan $usulan)
    {
        $keterangan = $request->input('keterangan');
        $usulan->update([
            'status' => 'ditolak',
            'verifikator' => Auth::user()->name,
            'keterangan' => $keterangan
        ]);
        return redirect()->back();
    }

    public function show(Usulan $usulan)
    {
        $nip = $usulan->pegawai_nip;
        $dok = $usulan->dokumen_usul;

        // Berkas KARPEG
        if ($usulan->layanan_id == 1) {
            $upload = Uploads::where('pegawai_nip', $nip)
                ->where('nama_file', '=', 'SK CPNS')
                ->orWhere('nama_file', '=', 'SK PNS')
                ->orWhere('nama_file', '=', 'STTPL')
                ->orWhere('nama_file', '=', 'PAS FOTO')
                ->orderBy('created_at', 'DESC')
                ->get();
        }
        // Berkas KARIS
        if ($usulan->layanan_id == 2) {
            $upload = Uploads::where('pegawai_nip', $nip)
                ->where('nama_file', '=', 'AKTA NIKAH')
                ->orWhere('nama_file', '=', 'PAS FOTO SUAMI')
                ->orWhere('nama_file', '=', 'SK PNS')
                ->orWhere('nama_file', '=', 'LAPORAN PERKAWINAN')
                ->orderBy('created_at', 'DESC')
                ->get();
        }
        // Berkas KARSU
        if ($usulan->layanan_id == 3) {
            $upload = Uploads::where('pegawai_nip', $nip)
                ->where('nama_file', '=', 'AKTA NIKAH')
                ->orWhere('nama_file', '=', 'PAS FOTO ISTRI')
                ->orWhere('nama_file', '=', 'SK PNS')
                ->orWhere('nama_file', '=', 'LAPORAN PERKAWINAN')
                ->orderBy('created_at', 'DESC')
                ->get();
        }
        // Berkas Kenaikan pangkat
        if ($usulan->layanan_id == 4) {
            $upload = Uploads::where('pegawai_nip', $nip)
                ->where('nama_file', 'LIKE', "%PPK%")
                ->orWhere('nama_file', 'LIKE', "%SKP%")
                ->orWhere('nama_file', 'LIKE', "%SK KP%")
                ->orderBy('created_at', 'DESC')
                ->get();
        }

        // Berkas Kenaikan pangkat Struktural/Fungsional
        if ($usulan->layanan_id == 5) {
            $upload = Uploads::where('pegawai_nip', $nip)
                ->where('nama_file', 'LIKE', "%PPK%")
                ->orWhere('nama_file', 'LIKE', "%SKP%")
                ->orWhere('nama_file', 'LIKE', "%SK JABATAN%")
                ->orWhere('nama_file', 'LIKE', "%SK KP%")
                ->orderBy('created_at', 'DESC')
                ->get();
        }
        return view('verifikasi-berkas-usulan.show', ['upload' => $upload, 'dokumen' => $dok]);
    }
}
