<?php

/**
 * Created By: JISHNU T K
 * Date: 2025/08/19
 * Time: 21:46:28
 * Description: UserRepository.php
 */

namespace App\Repositories;

use App\Models\User;

use App\Exceptions\ModelException;

use Illuminate\Support\Facades\Hash;

class UserRepository
{
    public function attemptLogin(string $email, string $password)
    {
        $user = User::where('email', $email)->first();

        if (!$user) {
            throw new ModelException("User not found", 404);
        }

        if (!Hash::check($password, $user->password)) {
            throw new ModelException("Invalid credentials", 401);
        }

        return $user;
    }
}
