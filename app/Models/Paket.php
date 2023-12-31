<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paket extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama_paket',
        'jenis',
        'harga',
        'id_outlet',
    ];

    public function outlet()
    {
        return $this->belongsTo(Outlet::class, 'id_outlet');
    }
}
