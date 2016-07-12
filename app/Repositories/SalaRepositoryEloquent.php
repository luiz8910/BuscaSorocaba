<?php

namespace BuscaSorocaba\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use BuscaSorocaba\Repositories\SalaRepository;
use BuscaSorocaba\Models\Sala;
use BuscaSorocaba\Validators\SalaValidator;

/**
 * Class SalaRepositoryEloquent
 * @package namespace Excel\Repositories;
 */
class SalaRepositoryEloquent extends BaseRepository implements SalaRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Sala::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
