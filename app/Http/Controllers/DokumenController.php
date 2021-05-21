<?php

namespace App\Http\Controllers;

use App\Models\Uploads;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class DokumenController extends Controller
{
    public function index()
    {
        return view('daftar-dokumen');
    }

    public function destroy(Uploads $uploads)
    {
        $uploads->delete(); // hapus data di database
        $nama_file = substr($uploads->path, 9);
        Storage::disk('local')->delete("public/$nama_file"); // hapus data di local storage
        return redirect()->back()->with('success', "Hapus Data Berhasil");
    }

    public function preview(Uploads $uploads)
    {
        $ext = $uploads->ext;
        if ($ext == 'pdf') {
            return view('preview.preview-pdf', ['upload' => $uploads]);
        }
        if ($ext == 'png' or 'jpg' or 'jpeg') {
            return view('preview.preview-photo', ['upload' => $uploads]);
        }
    }

    public function search(Request $request)
    {
        $search = $request->input('search');
        $category = $request->input('category');
        $instansi = $request->input('instansi');
        $jenis_file = $request->input('jenis_file');

        if ($category == 1) {
            if ($jenis_file == 'dokumen') {
                $upload = Uploads::where('nama_file', 'LIKE', '%' . $search . '%')->where('ext', 'pdf')->get();
            }
            if ($jenis_file == 'photo') {
                $upload = Uploads::where('nama_file', 'LIKE', '%' . $search . '%')->where('ext', 'png')->orwhere('ext', 'jpg')->orwhere('ext', 'jpeg')->get();
            }
        }

        if ($category == 2) {
            if ($jenis_file == 'dokumen') {
                $upload = Uploads::where('pegawai_nip', 'LIKE', '%' . $search . '%')->where('ext', 'pdf')->get();
            }
            if ($jenis_file == 'photo') {
                $upload = Uploads::where('pegawai_nip', 'LIKE', '%' . $search . '%')->where('ext', 'png')->orwhere('ext', 'jpg')->orwhere('ext', 'jpeg')->get();
            }
        }
        return view('daftar-dokumen', ['upload' => $upload, 'category' => $category, 'search' => $search, 'jenis_file' => $jenis_file]);
    }
}
