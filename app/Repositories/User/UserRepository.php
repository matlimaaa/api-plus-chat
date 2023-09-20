<?php

namespace App\Repositories\User;

use App\Models\User;

class UserRepository implements UserRepositoryContract
{
    public function __construct(
        private User $user,
    ) {
    }

    public function getUserByEmail(string $email): ?User
    {
        return $this->user->where('email', $email)->firstOrFail();
    }
}
