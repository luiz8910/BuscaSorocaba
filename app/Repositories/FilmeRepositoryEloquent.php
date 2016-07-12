<?php

namespace BuscaSorocaba\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use BuscaSorocaba\Repositories\FilmeRepository;
use BuscaSorocaba\Models\Filme;
use BuscaSorocaba\Validators\FilmeValidator;

/**
 * Class FilmeRepositoryEloquent
 * @package namespace Excel\Repositories;
 */
class FilmeRepositoryEloquent extends BaseRepository implements FilmeRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Filme::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
