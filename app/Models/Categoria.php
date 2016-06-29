<?php

namespace BuscaSorocaba\Models;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class Categoria extends Model implements Transformable
{
    use TransformableTrait;

    protected $fillable = ['nome'];
    protected $table = 'categorias';

    public function subCategoria()
    {
        return $this->hasMany(SubCategoria::class);
    }

}
