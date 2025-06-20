<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class event extends Model
{
    use HasFactory;
    protected $table = 'nama_events'; // Sesuaikan dengan nama tabel yang telah Anda buat
    protected $primaryKey = 'id_event';
    protected $fillable = [
        'nama_event',
        'deskripsi',
        'active',
        'kuota_vote',
        'sembunyikan_foto',
    ];
    public function kandidats()
    {
        return $this->hasMany(Kandidat::class);
    }

    public function tokens()
    {
        return $this->hasMany(Token::class);
    }
 
}
