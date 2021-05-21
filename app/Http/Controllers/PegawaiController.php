<?php

namespace App\Http\Controllers;

use App\Models\Pegawai;
use Illuminate\Http\Request;

class PegawaiController extends Controller
{

    public function index()
    {
        $pegawai = Pegawai::all();
        return view('pegawai.index', ['pegawai' => $pegawai]);
    }


    public function create()
    {
        return view('pegawai.create');
    }


    public function store(Request $request)
    {
        $validateData = $request->validate([
            'nama' => 'required',
            'nip' => 'required',
            'tmp_lahir' => 'required',
            'tgl_lahir' => 'required',
            'jk' => 'required|in:P,L',
            'instansi' => '',
            'satker_id' => '',
            'jabatan' => '',
            'pangkat' => '',
        ]);

        Pegawai::create($validateData);
        return redirect('pegawai')->with('success', 'Data Pegawai Berhasil Ditambah');
    }

    public function show($id)
    {
        //
    }

    public function edit(Pegawai $pegawai)
    {
        return view('pegawai.edit', ['pegawai' => $pegawai]);
    }

    public function update(Request $request, Pegawai $pegawai)
    {
        $validateData = $request->validate([
            'nama' => 'required',
            'nip' => 'required',
            'tmp_lahir' => 'required',
            'tgl_lahir' => 'required',
            'jk' => 'required|in:P,L',
            'instansi' => '',
            'satker_id' => '',
            'jabatan' => '',
            'pangkat' => '',
        ]);

        $pegawai->update($validateData);
        return redirect('pegawai')->with('success', 'Data Pegawai Berhasil DiUpdate');
    }

    public function destroy(Pegawai $pegawai)
    {
        $pegawai->delete();
        return redirect('pegawai')->with('success', "Data Pegawai $pegawai->nama Berhasil DiHapus");
    }
}
