<?php

namespace App\Helpers;

use App\Entities\Roles;

class BladeHelper {

    /**
     * Retrieve role name from value in blade
     * 
     * @param Integer $role
     * @return String
     */
    public static function userRoleName($role)
    {
        return ucwords(strtolower(Roles::StringKeyByvalue($role)));
    }

}
