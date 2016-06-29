<?php

namespace BuscaSorocaba\Models;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class SubCategoria extends Model implements Transformable
{
    use TransformableTrait;

    protected $fillable = ['categoria_id', 'nome', '24h', 'emergencia'];
    protected $table = 'subcategorias';

    public function categoria()
    {
        return $this->belongsTo(Categoria::class, 'categoria_id');
    }

    public function estabelecimentos()
    {
        return $this->belongsToMany(Estabelecimentos::class);
    }
}
