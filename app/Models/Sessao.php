<?php

namespace BuscaSorocaba\Models;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;
use Illuminate\Database\Eloquent\SoftDeletes;

class Sessao extends Model implements Transformable
{
    use TransformableTrait, SoftDeletes;

    protected $fillable = [
        'filme_id', 'salas_id', 'shopping_id', 'horario', 'audio', 'qualidade', 'preco'
    ];

    protected $table = 'filme_sala';

    protected $dates = ['deleted_at'];

    public function filme()
    {
        return $this->belongsTo(Filme::class);
    }

    public function salas()
    {
        return $this->belongsTo(Sala::class);
    }

    public function shopping()
    {
        return $this->belongsTo(Shopping::class);
    }

//    public function transform()
//    {
//        return [
//          'sessao' => $this->id
//        ];
//    }

}
