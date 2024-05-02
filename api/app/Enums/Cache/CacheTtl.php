<?php

declare(strict_types=1);

namespace App\Enums\Cache;

enum CacheTtl: int
{
    case OneMinute = 60;
    case TenMinutes = 600;
}
