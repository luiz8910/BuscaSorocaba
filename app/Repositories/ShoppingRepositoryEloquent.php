<?php

namespace BuscaSorocaba\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use BuscaSorocaba\Repositories\ShoppingRepository;
use BuscaSorocaba\Models\Shopping;
use BuscaSorocaba\Validators\ShoppingValidator;

/**
 * Class ShoppingRepositoryEloquent
 * @package namespace Excel\Repositories;
 */
class ShoppingRepositoryEloquent extends BaseRepository implements ShoppingRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Shopping::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
