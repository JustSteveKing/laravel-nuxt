<?php

declare(strict_types=1);

namespace Tests;

use DirectoryTree\Authorization\PermissionRegistrar;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    protected function setUp(): void
    {
        parent::setUp();

        app(PermissionRegistrar::class)->register();
    }
}
