<?php

namespace App\Repositories\Eloquent;

use Prettus\Repository\Criteria\RequestCriteria;
use App\Contracts\Repositories\UsersRepository;
use App\User;
use App\Validators\UsersValidator;
use Illuminate\Support\Collection;

/**
 * Class UsersRepositoryEloquent
 * @package namespace App\Repositories\Eloquent;
 */
class UsersRepositoryEloquent extends BaseRepositoryEloquent implements UsersRepository {

    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return User::class;
    }

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }

    /**
     * Override create method.
     * 
     * @param array $attributes
     */
    public function create(array $attributes)
    {
        if (isset($attributes['password'])) {
            $attributes['password'] = bcrypt($attributes['password']);
        }

        return parent::create($attributes);
    }

  

}
