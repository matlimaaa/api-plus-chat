<?php

namespace App\Services\User;

use App\Models\User;

interface UserServiceContract
{
    public function getUserByEmail(string $email): User;
}
