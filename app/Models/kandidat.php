<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kandidat extends Model
{
    protected $table = 'kandidat'; // Nama tabel di database

    protected $fillable = ['nama_kandidat', 'foto','posisi'];

    // Relasi ke tabel event jika ada
    public function event()
    {
        return $this->belongsTo(event::class, 'id_event');
    }
}
