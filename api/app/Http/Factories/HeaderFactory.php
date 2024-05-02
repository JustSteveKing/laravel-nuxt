<?php

declare(strict_types=1);

namespace App\Http\Factories;

final class HeaderFactory
{
    public static function default(): array
    {
        return [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
            'X-CUSTOM-HEADER' => 'boop',
        ];
    }
}
