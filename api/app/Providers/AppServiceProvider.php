<?php

declare(strict_types=1);

namespace App\Providers;

use App\Models\Permission;
use App\Models\Role;
use App\Models\User;
use DirectoryTree\Authorization\Authorization;
use Illuminate\Auth\Notifications\ResetPassword;
use Illuminate\Contracts\Auth\CanResetPassword;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\ServiceProvider;

final class AppServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        Model::shouldBeStrict();
        JsonResource::withoutWrapping();

        ResetPassword::createUrlUsing(static fn (CanResetPassword $notifiable, string $token) => config('app.frontend_url') . "/password-reset/{$token}?email={$notifiable->getEmailForPasswordReset()}");

        Authorization::useUserModel(User::class);
        Authorization::useRoleModel(Role::class);
        Authorization::usePermissionModel(Permission::class);

        Authorization::cacheKey('auth:');
    }
}
