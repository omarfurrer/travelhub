<?php

namespace App\Repositories\Eloquent;

use Prettus\Repository\Criteria\RequestCriteria;
use App\Contracts\Repositories\TripsRepository;
use App\Trip;
use App\Validators\TripsValidator;
use Illuminate\Support\Collection;

/**
 * Class TripsRepositoryEloquent
 * @package namespace App\Repositories\Eloquent;
 */
class TripsRepositoryEloquent extends BaseRepositoryEloquent implements TripsRepository {

    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Trip::class;
    }

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }

   

}
