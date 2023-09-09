<?php

namespace App\Models;

use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Series extends Model
{
    use HasFactory;

    protected $fillable = ['name'];
    protected $with = ['season']; // Sempre que vc trazer uma série vem as temporadas relacionadas

    public function season() {
        // 1 Série tem várias temporadas
            // * Classe Relacionada
            // * Chave Estrangeira
            // * Referenciar qual campo? => 'id' é padrão
        return $this->hasMany(Season::class, 'series_id');
    }

    protected static function booted() {
        // Será chamado toda vez que realizar alguma consulta dentro da Model
        self::addGlobalScope('order', function(Builder $query) {
            $query->orderBy('name', 'desc');
        });

    }

    public function scopeActive(Builder $query) {

        return $query->where('active', true);
    }
}
