<?php

namespace BuscaSorocaba\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use BuscaSorocaba\Repositories\SubCategoriaRepository;
use BuscaSorocaba\Models\SubCategoria;
use BuscaSorocaba\Validators\SubCategoriaValidator;

/**
 * Class SubCategoriaRepositoryEloquent
 * @package namespace Excel\Repositories;
 */
class SubCategoriaRepositoryEloquent extends BaseRepository implements SubCategoriaRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return SubCategoria::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
