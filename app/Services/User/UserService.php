<?php

namespace App\Services\User;

use App\Models\User;
use App\Repositories\User\UserRepositoryContract;

class UserService implements UserServiceContract
{
    public function __construct(
        protected UserRepositoryContract $userRepository,
    ) {
    }

    public function getUserByEmail(string $email): User
    {
        return $this->userRepository->getUserByEmail($email);
    }
}
