<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservasi extends Model
{
    use HasFactory;
    protected $fillable = [
        'tanggal_checkin',
        'tanggal_checkout',
        'kamar_id',
        'tamu_id'
    ];

    public function kamars()
    {
        return $this->belongsTo(Kamar::class);
    }
    public function tamus()
    {
        return $this->belongsTo(Tamu::class);
    }
}
