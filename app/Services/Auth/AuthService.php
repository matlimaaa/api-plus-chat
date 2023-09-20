<?php

namespace App\Services\Auth;

use App\Models\User;
use App\Repositories\Auth\AuthRepositoryContract;
use App\Services\User\UserServiceContract;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\UnauthorizedException;

class AuthService implements AuthServiceContract
{
    public function __construct(
        protected AuthRepositoryContract $authRepository,
        protected UserServiceContract $userService,
    ) {
    }

    public function authenticateUser(string $email, string $password, string $deviceName): string
    {
        $user = $this->userService->getUserByEmail($email);

        $this->checkPassword(
            requestPassword: $password,
            userPassword: $user->password,
        );

        $this->revokeTokens($user);

        return $this->createToken(
            user: $user,
            deviceName: $deviceName
        );
    }

    private function checkPassword(string $requestPassword, string $userPassword): void
    {
        if (! Hash::check($requestPassword, $userPassword)) {
            throw new UnauthorizedException();
        }
    }

    public function revokeTokens(User $user): void
    {
        $this->authRepository->revokeTokens($user);
    }

    public function createToken(User $user, string $deviceName): string
    {
        return $this->authRepository->createToken($user, $deviceName);
    }
}
