<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Pegawai;
use Illuminate\Http\Request;
use App\Rules\CurrentPassword;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function index()
    {
        $user = Auth::user()->pegawai_id;
        $pegawai = Pegawai::find($user);
        // return $pegawai->user;
        return view('profile', ['pegawai' => $pegawai]);
    }

    public function resetPassword(Request $request)
    {
        $request->validate([
            'current_password' => ['required', new CurrentPassword],
            'new_password' => ['required'],
            'confirm_password' => ['same:new_password'],
        ]);

        User::find(Auth::user()->id)->update(['password' => Hash::make($request->new_password)]);

        return redirect('profile')->with('success', 'Password Berhasil DiUbah');
    }

    public function update(Request $request)
    {
        $user = Auth::user()->pegawai_id;
        $pegawai = Pegawai::find($user);

        // str_replace(' ', '', $request->nip);

        $validateData = $request->validate([
            'nama' => 'min:3|max:50',
            'nip' => 'numeric',
            // 'email' => '',
            'tmp_lahir' => '',
            'tgl_lahir' => '',
            'jk' => '',
            'instansi' => '',
            'satker_id' => '',
            'jabatan' => '',
            'pangkat' => '',
        ]);

        Pegawai::where('id', $pegawai->id)->update($validateData);

        return redirect('profile')->with('success', 'Data Berhasil DiUbah');
    }
}
