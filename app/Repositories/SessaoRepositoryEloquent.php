<?php

namespace BuscaSorocaba\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use BuscaSorocaba\Repositories\SessaoRepository;
use BuscaSorocaba\Models\Sessao;
use BuscaSorocaba\Validators\SessaoValidator;

/**
 * Class SessaoRepositoryEloquent
 * @package namespace Excel\Repositories;
 */
class SessaoRepositoryEloquent extends BaseRepository implements SessaoRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Sessao::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
