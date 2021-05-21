<?php

namespace App\Http\Controllers;

use App\Models\Pegawai;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class OperatorController extends Controller
{

    public function index()
    {
        $user = User::all();
        return view('operator.index', ['user' => $user]);
    }

    public function create()
    {
        $pegawai = Pegawai::all();
        return view('operator.create', ['pegawai' => $pegawai]);
    }

    public function store(Request $request)
    {
        $validateData = $request->validate([
            'name' => 'required',
            'username' => 'required',
            'email' => 'required',
            'password' => 'required',
            'level' => 'required',
            'pegawai_id' => 'required',
        ]);

        User::create([
            'name' => $validateData['name'],
            'username' => $validateData['username'],
            'email' => $validateData['email'],
            'password' => Hash::make($validateData['password']),
            'level' => $validateData['level'],
            'pegawai_id' => $validateData['pegawai_id'],
        ]);
        return redirect('operator')->with('success', 'Operator Berhasil Ditambah');

        // User::create([
        //     'nama_file' => $namaFile,
        //     'path' => "/storage/$namaFileOri",
        //     'user_id' => Auth::user()->id,
        //     'pegawai_nip' => $nip
        // ]);
    }

    public function reset(User $user)
    {
        $password = Hash::make('12345678');

        $user->update([
            'password' => $password,
        ]);

        return redirect('operator')->with('success', 'Password Berhasil Direset');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy(User $user)
    {
        $user->delete();
        return redirect('operator')->with('success', 'Operator Berhasil Dihapus');
    }
}
