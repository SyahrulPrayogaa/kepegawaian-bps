<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Uploads extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama_file',
        'slug',
        'path',
        'ext',
        'user_id',
        'pegawai_nip'
    ];

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function pegawai()
    {
        return $this->belongsTo('App\Models\Pegawai', 'pegawai_nip', 'nip');
    }
}
