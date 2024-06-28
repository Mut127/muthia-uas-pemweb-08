<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use LDAP\Result;

class Kamar extends Model
{
    use HasFactory;
    protected $fillable = [
        'nomor_kamar',
        'tipe_kamar',
        'harga',
        'hotel_id'
    ];

    public function hotels()
    {
        return $this->belongsTo(Hotel::class);
    }
    public function reservasis()
    {
        return $this->hasMany(Reservasi::class);
    }
}
