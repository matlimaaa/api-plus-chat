<?php

namespace App\Services\Auth;

use App\Models\User;

interface AuthServiceContract
{
    public function authenticateUser(string $email, string $password, string $deviceName): string;

    public function revokeTokens(User $user): void;

    public function createToken(User $user, string $deviceName): string;
}
