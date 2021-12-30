<?php

namespace App\Contracts\Services\Auth;

use Illuminate\Http\Request;

/**
 * Interface for authentication service.
 */
interface AuthServiceInterface
{
    /**
     * Create User Account when registered
     * @param array $data
     */
    public function createUser(array $data);  
}
