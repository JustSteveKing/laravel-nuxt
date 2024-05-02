<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api\Auth;

use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Auth\AuthManager;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

final readonly class UserController
{
    public function __construct(
        private AuthManager $auth,
    ) {
    }

    public function __invoke(Request $request): JsonResource
    {
        return new UserResource(
            resource: User::query()->with(
                relations: ['roles.permissions'],
            )->where(
                column: 'id',
                operator: '=',
                value: $this->auth->id(),
            )->firstOrFail(),
        );
    }
}
