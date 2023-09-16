<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Season extends Model
{
    use HasFactory;

    protected $fillable = ['number'];

    public function series() {
        // Essa série pertence a uma temporada
        return $this->belongsTo(Serie::class);
    }

    public function episodes() {
        // 1 Temporada tem vários episodios
        return $this->hasMany(Episode::class);
    }

    public function numberOfWatchedEpisode(): int
    {
        return $this->episodes
            ->filter(fn ($episode) => $episode->watched)
            ->count();
    }
}
