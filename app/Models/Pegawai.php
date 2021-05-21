<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Satker;

class Pegawai extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'nip',
        'tmp_lahir',
        'tgl_lahir',
        'jk',
        'instansi',
        'satker_id',
        'jabatan',
        'pangkat',
    ];

    public function user()
    {
        return $this->hasOne('App\Models\User', 'pegawai_id', 'id');
    }

    public function satker()
    {
        return $this->belongsTo('App\Models\Satker');
    }
}
