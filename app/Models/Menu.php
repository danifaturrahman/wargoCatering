<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function kategori()
    {
        return $this->belongsTo(Kategori::class);
    }

    // Relasi dengan model Cart (Menu dimiliki oleh banyak Cart)
    public function carts()
    {
        return $this->hasMany(Cart::class);
    }
}
