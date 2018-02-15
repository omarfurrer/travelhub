<?php

namespace App\Repositories\Eloquent;

use App\Agency;
use App\Contracts\Repositories\BaseRepository as BaseRepositoryContract;
use Illuminate\Support\Facades\Storage;
use Prettus\Repository\Eloquent\BaseRepository;

/**
 * Class AgenciesRepositoryEloquent
 * @package namespace App\Repositories\Eloquent;
 */
abstract class BaseRepositoryEloquent extends BaseRepository implements BaseRepositoryContract {

    /**
     * Get a random set of users.
     *
     * @param Integer $numberOfRows
     */
    public function getRandom($numberOfRows = 10)
    {
        return $this->model->inRandomOrder()->limit($numberOfRows)->get();
    }

}
