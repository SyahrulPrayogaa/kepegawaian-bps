<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nominatif extends Model
{
    use HasFactory;
    protected $fillable = [
        'agenda_id',
        'pegawai_id'
    ];

    public function agenda()
    {
        return $this->belongsTo('App\Models\Agenda');
    }

    public function pegawai()
    {
        return $this->belongsTo('App\Models\Pegawai');
    }
}
