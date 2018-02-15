<?php

namespace App\Repositories\Eloquent;

use Prettus\Repository\Criteria\RequestCriteria;
use App\Contracts\Repositories\TripItemsRepository;
use App\TripItem;
use App\Validators\TripItemsValidator;
use Illuminate\Support\Collection;

/**
 * Class AgenciesRepositoryEloquent
 * @package namespace App\Repositories\Eloquent;
 */
class TripItemsRepositoryEloquent extends BaseRepositoryEloquent implements TripItemsRepository {

    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return TripItem::class;
    }

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }

}
