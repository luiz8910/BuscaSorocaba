<?php

namespace Excel\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use Excel\Repositories\AvaliacaoRepository;
use Excel\Models\Avaliacao;
use Excel\Validators\AvaliacaoValidator;

/**
 * Class AvaliacaoRepositoryEloquent
 * @package namespace Excel\Repositories;
 */
class AvaliacaoRepositoryEloquent extends BaseRepository implements AvaliacaoRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Avaliacao::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
