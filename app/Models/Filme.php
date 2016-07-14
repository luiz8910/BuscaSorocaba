<?php

namespace BuscaSorocaba\Models;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;
use Illuminate\Database\Eloquent\SoftDeletes;

class Filme extends Model implements Transformable
{
    use TransformableTrait, SoftDeletes;

    protected $fillable = [
        'nome', 'duracao', 'classificacao'
    ];

    protected $dates = ['deleted_at'];

    public function salas()
    {
        return $this->belongsToMany(Sala::class);
    }

    public function sessao()
    {
        return $this->hasMany(Sessao::class, 'filme_id');
    }
}
