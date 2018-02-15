<?php

namespace App\Contracts\Repositories;

use Prettus\Repository\Contracts\RepositoryInterface;

/**
 * Interface UsersRepository
 * @package namespace App\Contracts\Repositories;
 */
interface BaseRepository extends RepositoryInterface {

    /**
     * Get a random set of users.
     * 
     * @param Integer $numberOfRows
     */
    public function getRandom($numberOfRows = 10);
}
