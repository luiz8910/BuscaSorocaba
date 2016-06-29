<?php

namespace BuscaSorocaba\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use BuscaSorocaba\Repositories\CategoriaRepository;
use BuscaSorocaba\Models\Categoria;
use BuscaSorocaba\Validators\CategoriaValidator;

/**
 * Class CategoriaRepositoryEloquent
 * @package namespace BuscaSorocaba\Repositories;
 */
class CategoriaRepositoryEloquent extends BaseRepository implements CategoriaRepository
{
    /*public function lists($nome, $id)
    {
        return $this->model->lists('nome', 'id');
    }*/

    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Categoria::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
