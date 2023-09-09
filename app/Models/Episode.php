<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Episode extends Model
{
    use HasFactory;
    protected $fillable = ['number'];

    public function season() {
        // Essa série pertence a uma temporada
        return $this->belongsTo(Season::class);
    }
}
