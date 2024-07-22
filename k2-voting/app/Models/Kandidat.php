<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kandidat extends Model
{
    use HasFactory;
    protected $fillable = [
        'name', 'description', 'photo', 'kategori_id'
    ];

    public function pemilihans()
    {
        return $this->hasMany(Pemilihan::class);
    }

    public function kategori()
    {
        return $this->belongsTo(Kategori::class);
    }
}
