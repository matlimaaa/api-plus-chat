<?php

namespace App\Repositories\User;

use App\Models\User;

interface UserRepositoryContract
{
    public function getUserByEmail(string $email): ?User;
}
