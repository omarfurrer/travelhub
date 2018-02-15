<?php

namespace App\Repositories\Eloquent;

use Prettus\Repository\Criteria\RequestCriteria;
use App\Contracts\Repositories\DestinationMediaRepository;
use App\DestinationMedia;
use App\Validators\DestinationMediaValidator;
use Illuminate\Support\Collection;

/**
 * Class DestinationMediaRepositoryEloquent
 * @package namespace App\Repositories\Eloquent;
 */
class DestinationMediaRepositoryEloquent extends BaseRepositoryEloquent implements DestinationMediaRepository {

    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return DestinationMedia::class;
    }

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }

}
