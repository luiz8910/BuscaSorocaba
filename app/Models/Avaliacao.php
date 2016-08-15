<?php

namespace BuscaSorocaba\Models;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class Avaliacao extends Model implements Transformable
{
    use TransformableTrait;

    protected $fillable = [
        'estabelecimentos_id', 'estrela_1', 'estrela_2', 'estrela_3','estrela_4', 'estrela_5'
    ];

    protected $table = 'avaliacaos';

    public function estabelecimentos()
    {
        return $this->belongsTo(Estabelecimentos::class);
    }

}
