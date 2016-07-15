<?php

namespace BuscaSorocaba\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use BuscaSorocaba\Repositories\AvaliacaoRepository;
use BuscaSorocaba\Models\Avaliacao;
use BuscaSorocaba\Validators\AvaliacaoValidator;

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
