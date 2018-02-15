<?php

namespace App\Entities;

use App\Services\Traits\Enumerable;

class TripTypes {

    use Enumerable;

    const HONEYMOON = 0;
    const LEISURE = 1;
    const BUSINESS = 2;

}
