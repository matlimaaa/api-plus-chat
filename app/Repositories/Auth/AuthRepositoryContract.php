<?php

namespace App\Repositories\Auth;

use App\Models\User;

interface AuthRepositoryContract
{
    public function revokeTokens(User $user): void;

    public function createToken(User $user, string $deviceName): string;
}
