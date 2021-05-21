<?php

namespace App\Http\Controllers;

use App\Models\Agenda;
use App\Models\Layanan;
use App\Models\Nominatif;
use App\Models\Pegawai;
use App\Models\Usulan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;


class AgendaController extends Controller
{
    public function index()
    {
        $agenda = Agenda::all();
        return view('agenda.index', ['agenda' => $agenda]);
    }

    public function create()
    {
        $layanan = Layanan::all();
        return view('agenda.create', ['layanan' => $layanan]);
    }

    public function store(Request $request)
    {
        $validateData = $request->validate([
            'dokumen_pengantar' => 'required|file|mimes:pdf'
        ]);
        $no_usul = $request->input('no_usul');
        $layanan = $request->input('layanan');
        $jumlah_nominatif = $request->input('jumlah_nominatif');

        $file = $validateData['dokumen_pengantar'];
        $namaFile = $file->getClientOriginalName();
        $path = "/storage/agenda/$namaFile";
        $file->storeAs('public/agenda', $namaFile);

        Agenda::create([
            'no_usul' => $no_usul,
            'dokumen_pengantar' => $path,
            'layanan_id' => $layanan,
            'jumlah_nominatif' => $jumlah_nominatif,
        ]);
        return redirect('agenda')->with('success', 'Agenda Berhasil Ditambah');
    }

    public function show($id)
    {
        //
    }

    public function edit(Agenda $agenda)
    {
        $layanan = Layanan::all();
        return view('agenda.edit', ['agenda' => $agenda, 'layanan' => $layanan]);
    }

    public function update(Request $request, Agenda $agenda)
    {
        $no_usul = $request->input('no_usul');
        $layanan = $request->input('layanan');
        $jumlah_nominatif = $request->input('jumlah_nominatif');
        $file = $request->file('dokumen_pengantar');

        if ($file == null) {
            $agenda->update([
                'no_usul' => $no_usul,
                'layanan_id' => $layanan,
                'jumlah_nominatif' => $jumlah_nominatif,
            ]);
        } else {
            $nama_file = substr($agenda->dokumen_pengantar, 9);
            Storage::disk('local')->delete("public/$nama_file");
            $namaFile = $file->getClientOriginalName();
            $path = "/storage/agenda/$namaFile";
            $file->storeAs('public/agenda', $namaFile);

            $agenda->update([
                'no_usul' => $no_usul,
                'dokumen_pengantar' => $path,
                'layanan_id' => $layanan,
                'jumlah_nominatif' => $jumlah_nominatif,
            ]);
        }

        return redirect('agenda')->with('success', 'Agenda Berhasil Diedit');
    }

    public function destroy(Agenda $agenda)
    {
        $agenda->delete(); // hapus data di database
        $nama_file = substr($agenda->dokumen_pengantar, 9);
        Storage::disk('local')->delete("public/$nama_file"); // hapus data di local storage
        return redirect()->back()->with('success', "Hapus Data Berhasil");
    }

    public function nominatif(Agenda $agenda)
    {
        $nominatif = Nominatif::where('agenda_id', $agenda->id)->get();
        return view('agenda.nominatif', ['agenda' => $agenda, 'nominatif' => $nominatif]);
    }

    public function search(Request $request, Agenda $agenda)
    {
        $search = $request->input('search');
        $nominatif = Nominatif::where('agenda_id', $agenda->id)->get();

        $pegawai = Pegawai::where('nip', $search)->get();
        return view('agenda.nominatif', ['agenda' => $agenda, 'pegawai' => $pegawai, 'search' => $search, 'nominatif' => $nominatif]);
    }

    public function nominatifStore(Request $request, Agenda $agenda)
    {
        $pegawai = $request->input('pegawai_id');
        $agenda_id = $agenda->id;

        Nominatif::create([
            'agenda_id' => $agenda_id,
            'pegawai_id' => $pegawai
        ]);
        return redirect("agenda/nominatif/$agenda->id");
    }

    public function nominatifDestroy(Nominatif $nominatif)
    {
        $nominatif->delete();
        return redirect()->back()->with('success', "Hapus Data Berhasil");
    }

    public function usulanStore(Request $request, Agenda $agenda)
    {
        $noUsul = $request->input('no_usul');
        $dokUsul = $request->input('dokumen_usul');
        $nip = $request->input('pegawai_nip');
        $layanan = $request->input('layanan_id');

        for ($i = 0; $i < count($noUsul); $i++) {
            Usulan::create([
                'no_usul' => $noUsul[$i],
                'dokumen_usul' => $dokUsul[$i],
                'pegawai_nip' => $nip[$i],
                'layanan_id' => $layanan[$i],
                'status' => "on process",
                'pengusul' => Auth::user()->name,
            ]);
        }
        $agenda->delete();
        DB::table('nominatifs')
            ->where('agenda_id', $agenda->id)
            ->delete();
        return redirect('/agenda');
    }
}
