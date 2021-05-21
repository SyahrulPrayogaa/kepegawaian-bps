<?php

namespace App\Http\Controllers;

use App\Models\Usulan;
use Illuminate\Http\Request;

class UsulanController extends Controller
{
    public function index()
    {
        return view('berkas-usulan.index');
    }

    public function search(Request $request)
    {
        $search = $request->input('search');
        $category = $request->input('category');
        $status = $request->input('status');

        if ($category == 1) {
            if ($status == 'semua') {
                $usulan = Usulan::where('pegawai_nip', 'LIKE', '%' . $search . '%')->get();
            }
            if ($status == 'acc') {
                $usulan = Usulan::where('pegawai_nip', 'LIKE', '%' . $search . '%')->where('status', 'acc')->get();
            }
            if ($status == 'on-process') {
                $usulan = Usulan::where('pegawai_nip', 'LIKE', '%' . $search . '%')->where('status', 'on process')->get();
            }
            if ($status == 'ditolak') {
                $usulan = Usulan::where('pegawai_nip', 'LIKE', '%' . $search . '%')->where('status', 'ditolak')->get();
            }
        }
        if ($category == 2) {
            if ($status == 'semua') {
                $usulan = Usulan::where('no_usul', 'LIKE', '%' . $search . '%')->get();
            }
            if ($status == 'acc') {
                $usulan = Usulan::where('no_usul', 'LIKE', '%' . $search . '%')->where('status', 'acc')->get();
            }
            if ($status == 'on-process') {
                $usulan = Usulan::where('no_usul', 'LIKE', '%' . $search . '%')->where('status', 'on process')->get();
            }
            if ($status == 'ditolak') {
                $usulan = Usulan::where('no_usul', 'LIKE', '%' . $search . '%')->where('status', 'ditolak')->get();
            }
        }
        if ($category == 3) {
            // $usulan = Usulan::where('pegawai_nip', 'LIKE', '%' . $search . '%')->get();
            if ($status == 'semua') {
                $usulan = Usulan::whereHas('layanan', function ($query) use ($search) {
                    $query->where('layanan', 'like', '%' . $search . '%');
                })->get();
            }
            if ($status == 'acc') {
                $usulan = Usulan::whereHas('layanan', function ($query) use ($search) {
                    $query->where('layanan', 'like', '%' . $search . '%')->where('status', 'acc');
                })->get();
            }
            if ($status == 'on-process') {
                $usulan = Usulan::whereHas('layanan', function ($query) use ($search) {
                    $query->where('layanan', 'like', '%' . $search . '%')->where('status', 'on process');
                })->get();
            }
            if ($status == 'ditolak') {
                $usulan = Usulan::whereHas('layanan', function ($query) use ($search) {
                    $query->where('layanan', 'like', '%' . $search . '%')->where('status', 'ditolak');
                })->get();
            }
        }
        return view('berkas-usulan.index', ['search' => $search, 'category' => $category, 'usulan' => $usulan]);
    }
}
