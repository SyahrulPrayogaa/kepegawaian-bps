<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usulan extends Model
{
    use HasFactory;

    protected $fillable = [
        'no_usul',
        'pegawai_nip',
        'layanan_id',
        'status',
        'verifikator',
        'keterangan',
        'dokumen_usul',
        'pengusul'
    ];
    public function layanan()
    {
        return $this->belongsTo('App\Models\Layanan');
    }

    public function pegawai()
    {
        return $this->belongsTo('App\Models\Pegawai', 'pegawai_nip', 'nip');
    }

    public function upload()
    {
        return $this->belongsTo('App\Models\Uploads', 'pegawai_nip', 'pegawai_nip');
    }
}
