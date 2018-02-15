<?php

namespace App\Entities;

use App\Services\Traits\Enumerable;

class Roles {

    use Enumerable;

    const USER = 0;
    const ADMIN = 50;
    const SUPER_ADMIN = 100;

}
