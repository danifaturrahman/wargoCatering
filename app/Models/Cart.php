<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    // Relasi dengan model User (Cart dimiliki oleh User)
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relasi dengan model Menu (Cart dimiliki oleh Menu)
    public function menu()
    {
        return $this->belongsTo(Menu::class);
    }
}
