<?php

/**
 * Created By: JISHNU T K
 * Date: 2025/08/19
 * Time: 21:47:18
 * Description: AuthService.php
 */

namespace App\Services;

use App\Exceptions\ModelException;

use App\Repositories\UserRepository;

use Illuminate\Support\Facades\Auth;

class AuthService
{
    protected $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    /**
     * @param string $email
     * @param string $password
     *
     * @return [type]
     */
    public function loginAdminWeb(string $email, string $password)
    {
        try {
            $user = $this->userRepository->attemptAdminLogin($email, $password);

            Auth::login($user);

            return ['user' => $user];
        } catch (ModelException $e) {
            return ['error' => $e->getMessage()];
        }
    }

    /**
     * @param string $email
     * @param string $password
     *
     * @return [type]
     */
    public function loginUserWeb(string $email, string $password)
    {
        try {
            $user = $this->userRepository->attemptUserLogin($email, $password);

            Auth::login($user);

            return ['user' => $user];
        } catch (ModelException $e) {
            return ['error' => $e->getMessage()];
        }
    }
}
