<?php

namespace App\Models;

use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Episode extends Model
{
    use HasFactory;
    protected $fillable = ['number'];
    protected $casts = ['watched' => 'boolean'];

    public function season() {
        // Essa série pertence a uma temporada
        return $this->belongsTo(Season::class);
    }

    public function scopeWatched(Builder $query)
    {
        $query->where('watched', true);
    }


}
