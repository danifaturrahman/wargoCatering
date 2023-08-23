<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailPeminjamanAlat extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function peminjamanAlat()
    {
        return $this->belongsTo(PeminjamanAlat::class, 'peminjaman_alat_id');
    }
}
