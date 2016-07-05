<?php

namespace BuscaSorocaba\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use BuscaSorocaba\Repositories\ResponsavelRepository;
use BuscaSorocaba\Models\Responsavel;
use BuscaSorocaba\Validators\ResponsavelValidator;

/**
 * Class ResponsavelRepositoryEloquent
 * @package namespace Excel\Repositories;
 */
class ResponsavelRepositoryEloquent extends BaseRepository implements ResponsavelRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Responsavel::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
