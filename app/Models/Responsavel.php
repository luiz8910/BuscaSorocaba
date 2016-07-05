<?php

namespace BuscaSorocaba\Models;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;
use Illuminate\Database\Eloquent\SoftDeletes;

class Responsavel extends Model implements Transformable
{
    use TransformableTrait, SoftDeletes;

    protected $fillable = [
        'estabelecimentos_id', 'nome', 'telefone', 'email',
        'cep', 'logradouro', 'numero', 'bairro', 'cidade',
        'cpf', 'rg', 'cargo'
    ];

    protected $table = 'responsaveis';

    protected $dates = ['deleted_at'];

    public function estabelecimentos()
    {
        return $this->belongsTo(Estabelecimentos::class);
    }

}
