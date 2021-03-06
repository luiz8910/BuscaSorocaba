<?php

namespace BuscaSorocaba\Models;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;
use Illuminate\Database\Eloquent\SoftDeletes;

class Sala extends Model implements Transformable
{
    use TransformableTrait, SoftDeletes;

    protected $fillable = [
        'shopping_id', 'numero', 'tipo'
    ];

    protected $dates = ['deleted_at'];

    public function shopping()
    {
        return $this->belongsTo(Shopping::class);
    }

    public function filme()
    {
        return $this->belongsToMany(Filme::class);
    }

    public function sessao()
    {
        return $this->hasMany(Sessao::class, 'salas_id');
    }
}
