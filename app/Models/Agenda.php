<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agenda extends Model
{
    use HasFactory;
    protected $fillable = [
        'no_usul',
        'dokumen_pengantar',
        'layanan_id',
        'jumlah_nominatif'
    ];

    public function layanan()
    {
        return $this->belongsTo('App\Models\Layanan');
    }
}
