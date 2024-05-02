<?php

declare(strict_types=1);

namespace App\Console\Commands;

use App\Enums\Cache\CacheKey;
use Illuminate\Cache\CacheManager;
use Illuminate\Console\Command;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command as SymfonyCommand;

#[AsCommand(name: 'bust:cache', description: 'Bust the stored application cache.')]
final class BustCacheCommand extends Command
{
    public function handle(CacheManager $cache): int
    {
        foreach (CacheKey::cases() as $key) {
            $cache->forget($key->value);
        }

        return SymfonyCommand::SUCCESS;
    }
}
