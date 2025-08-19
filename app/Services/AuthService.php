<?php

/**
 * Created By: JISHNU T K
 * Date: 2025/08/19
 * Time: 21:47:18
 * Description: AuthService.php
 */

namespace App\Services;

use App\Exceptions\ModelException;

use App\Repositories\AuthRepository;

use App\Repositories\UserRepository;
use Illuminate\Support\Facades\Auth;

class AuthService
{
    protected $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function loginWeb(string $email, string $password)
    {
        try {
            $user = $this->userRepository->attemptLogin($email, $password);

            Auth::login($user);

            return ['user' => $user];
        } catch (ModelException $e) {
            return ['error' => $e->getMessage()];
        }
    }
}
