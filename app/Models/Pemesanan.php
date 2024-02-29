<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pemesanan extends Model
{
    use HasFactory;
    protected $table = 'pemesanan';
    public function pengguna()
    {
        return $this->belongsTo(Pengguna::class, 'pengguna_id');
    }

    // Relasi belongsTo dengan Ambulance
    public function ambulance()
    {
        return $this->belongsTo(Ambulance::class, 'ambulance_id');
    }

    // Relasi belongsTo dengan Peti
    public function peti()
    {
        return $this->belongsTo(Peti::class, 'peti_id');
    }
}
