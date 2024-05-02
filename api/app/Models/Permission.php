<?php

declare(strict_types=1);

namespace App\Models;

use Carbon\CarbonInterface;
use DirectoryTree\Authorization\Permission as DirectoryPermission;
use DirectoryTree\Authorization\Traits\ClearsCachedPermissions;
use DirectoryTree\Authorization\Traits\HasRoles;
use DirectoryTree\Authorization\Traits\HasUsers;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

/**
 * @property string $id
 * @property string $name
 * @property null|string $label
 * @property null|CarbonInterface $created_at
 * @property null|CarbonInterface $updated_at
 * @property Collection<User> $users
 * @property Collection<Role> $roles
 */
final class Permission extends DirectoryPermission
{
    use ClearsCachedPermissions;
    use HasRoles;
    use HasUsers;
    use HasUuids;
}
