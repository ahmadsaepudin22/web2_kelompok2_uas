<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    use HasFactory;
    protected $fillable = [
        'name'
    ];

    public function kandidats()
    {
        return $this->hasMany(Kandidat::class, 'kategori_id');
    }
    public function pemilihans()
    {
        return $this->hasManyThrough(Pemilihan::class, Kandidat::class);
    }
}
