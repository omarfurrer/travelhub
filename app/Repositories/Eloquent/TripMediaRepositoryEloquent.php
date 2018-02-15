<?php

namespace App\Repositories\Eloquent;

use Prettus\Repository\Criteria\RequestCriteria;
use App\Contracts\Repositories\TripMediaRepository;
use App\TripMedia;
use App\Validators\TripMediaValidator;
use Illuminate\Support\Collection;

/**
 * Class TripMediaRepositoryEloquent
 * @package namespace App\Repositories\Eloquent;
 */
class TripMediaRepositoryEloquent extends BaseRepositoryEloquent implements TripMediaRepository {

    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return TripMedia::class;
    }

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }

}
