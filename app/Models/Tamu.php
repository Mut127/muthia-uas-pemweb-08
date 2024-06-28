<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tamu extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama',
        'email',
        'telepon'
    ];

    public function reservasis()
    {
        return $this->hasMany(Reservasi::class);
    }
}