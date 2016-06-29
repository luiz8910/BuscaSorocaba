<?php

namespace BuscaSorocaba\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use BuscaSorocaba\Repositories\EstabelecimentosRepository;
use BuscaSorocaba\Models\Estabelecimentos;
use BuscaSorocaba\Validators\EstabelecimentosValidator;

/**
 * Class EstabelecimentosRepositoryEloquent
 * @package namespace Excel\Repositories;
 */
class EstabelecimentosRepositoryEloquent extends BaseRepository implements EstabelecimentosRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Estabelecimentos::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
