<?php

namespace App\Repositories\Eloquent;

use Prettus\Repository\Criteria\RequestCriteria;
use App\Contracts\Repositories\DestinationsRepository;
use App\Destination;
use App\Validators\DestinationsValidator;
use Illuminate\Support\Collection;

/**
 * Class DestinationsRepositoryEloquent
 * @package namespace App\Repositories\Eloquent;
 */
class DestinationsRepositoryEloquent extends BaseRepositoryEloquent implements DestinationsRepository {

    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Destination::class;
    }

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }

  

}
