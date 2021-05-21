<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Format;
use App\Models\Uploads;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $dokumen = Format::where('file', 'pdf')->orderBy('namaDokumen', 'asc')->get();
        $foto = Format::where('file', 'jpg')->orderBy('namaDokumen', 'asc')->get();
        return view('dashboard', ['dokumen' => $dokumen, 'foto' => $foto]);
    }

    public function uploadFile(Request $request)
    {
        $file = $request->file('file');
        $namaFileOri = $file->getClientOriginalName();
        $ext = $file->getClientOriginalExtension();
        $namaFile = pathinfo($namaFileOri, PATHINFO_FILENAME);
        $nip = substr($namaFile, -18);
        $slug = substr($namaFile, 0, -19);
        $namaFile = str_replace("_", " ", $slug);
        if ($ext == 'pdf') {
            $file->storeAs('public', $namaFileOri);
            $path = "/storage/$namaFileOri";
        } elseif ($ext == 'png' or 'jpg' or 'jpeg') {
            $file->storeAs('public/img', $namaFileOri);
            $path = "/storage/img/$namaFileOri";
        }

        Uploads::create([
            'nama_file' => $namaFile,
            'slug' => $slug,
            'path' => $path,
            'ext' => $ext,
            'user_id' => Auth::user()->id,
            'pegawai_nip' => $nip
        ]);
        return response()->json(['success' => $namaFile]);
    }
}
