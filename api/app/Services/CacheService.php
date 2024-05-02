<?php

declare(strict_types=1);

namespace App\Services;

use App\Enums\Cache\CacheKey;
use App\Enums\Cache\CacheTtl;
use Closure;
use Illuminate\Cache\CacheManager;

final readonly class CacheService
{
    public function __construct(
        private CacheManager $cache,
    ) {
    }

    public function remember(CacheKey $key, CacheTtl $ttl, Closure $callback): mixed
    {
        return $this->cache->remember(
            key: $key->value,
            ttl: $ttl->value,
            callback: $callback,
        );
    }
}
