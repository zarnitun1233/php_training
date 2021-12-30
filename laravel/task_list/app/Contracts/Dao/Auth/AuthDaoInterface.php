<?php

namespace App\Contracts\Dao\Auth;

use Illuminate\Http\Request;

/**
 * Interface of Data Access Object for Authentication
 */
interface AuthDaoInterface
{
    /**
     * Create User Account when registered
     * @param array $data
     */
    public function createUser(array $data);
}
