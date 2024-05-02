<?php

declare(strict_types=1);

namespace App\Models;

use Carbon\CarbonInterface;
use DirectoryTree\Authorization\Traits\Authorizable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Laravel\Sanctum\PersonalAccessToken;

/**
 * @property string $id
 * @property string $name
 * @property string $email
 * @property string $password
 * @property null|string $remember_token
 * @property null|CarbonInterface $email_verified_at
 * @property null|CarbonInterface $created_at
 * @property null|CarbonInterface $updated_at
 * @property null|CarbonInterface $deleted_at
 * @property Collection<PersonalAccessToken> $tokens
 * @property Collection<Role> $roles
 * @property Collection<Permission> $permissions
 */
final class User extends Authenticatable implements MustVerifyEmail
{
    use Authorizable;
    use HasApiTokens;
    use HasFactory;
    use HasUuids;
    use Notifiable;
    use SoftDeletes;

    /** @var array<int,string> */
    protected $fillable = [
        'name',
        'email',
        'password',
        'remember_token',
        'email_verified_at',
    ];

    /** @var array<int,string> */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /** @return array<string,string> */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
}
