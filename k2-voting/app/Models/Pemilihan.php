<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pemilihan extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id', 'kandidat_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function kandidat()
    {
        return $this->belongsTo(Kandidat::class);
    }
}
