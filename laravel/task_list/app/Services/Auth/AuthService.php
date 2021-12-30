<?php

namespace App\Services\Auth;

use App\Contracts\Dao\Auth\AuthDaoInterface;
use App\Contracts\Services\Auth\AuthServiceInterface;
use Carbon\Carbon;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

/**
 * Service class for authentication.
 */
class AuthService implements AuthServiceInterface
{
    /**
     * auth Dao
     */
    private $authDao;

    /**
     * Class Constructor
     * @param AuthDaoInterface
     * @return
     */
    public function __construct(AuthDaoInterface $authDao)
    {
        $this->authDao = $authDao;
    }

    /**
     * Create User Account when registered
     * @param Array $data
     */
    public function createUser(array $data)
    {
        return $this->authDao->createUser($data);
    }
}
