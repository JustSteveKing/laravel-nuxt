<?php

declare(strict_types=1);

namespace App\Services;

use App\Enums\Cache\CacheKey;
use App\Enums\Cache\CacheTtl;
use App\Models\User;
use Illuminate\Database\DatabaseManager;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

final readonly class UserService
{
    public function __construct(
        private CacheService $cache,
        private DatabaseManager $database,
    ) {
    }

    public function all(): Collection
    {
        return $this->cache->remember(
            key: CacheKey::UsersAll,
            ttl: CacheTtl::TenMinutes,
            callback: static fn () => User::query()->get(),
        );
    }

    public function create(array $data): User|Model
    {
        return $this->database->transaction(
            callback: fn () => User::query()->create($data),
            attempts: 3,
        );
    }
}
