<?php

namespace App\Repositories\Auth;

use App\Models\User;

class AuthRepository implements AuthRepositoryContract
{
    public function revokeTokens(User $user): void
    {
        $user->tokens()->delete();
    }

    public function createToken(User $user, string $deviceName): string
    {
        return $user->createToken($deviceName)->plainTextToken;
    }
}
