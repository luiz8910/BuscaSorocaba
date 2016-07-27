<?php

namespace BuscaSorocaba\Models;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class Shopping extends Model implements Transformable
{
    use TransformableTrait;

    protected $fillable = [
        'nome', 'info', 'cinema', 'cep', 'logradouro', 'numero', 'bairro', 'cidade'
    ];

    public function salas()
    {
       return $this->hasMany(Sala::class);
    }

    public function sessao()
    {
       return $this->hasMany(Sessao::class);
    }


}
