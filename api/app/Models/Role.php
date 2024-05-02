<?php

declare(strict_types=1);

namespace App\Models;

use Carbon\CarbonInterface;
use DirectoryTree\Authorization\Role as DirectoryRole;
use DirectoryTree\Authorization\Traits\ManagesPermissions;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

/**
 * @property string $id
 * @property string $name
 * @property null|string $label
 * @property null|CarbonInterface $created_at
 * @property null|CarbonInterface $updated_at
 * @property Collection<User> $users
 * @property Collection<Permission> $permissions
 */
final class Role extends DirectoryRole
{
    use HasUuids;
    use ManagesPermissions;
}
